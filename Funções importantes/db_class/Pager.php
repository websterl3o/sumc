<?php
//
//  Pear DB Pager - Retrieve and return information of databases
//                  result sets
//
//  Copyright (C) 2001  Tomas Von Veschler Cox <cox@idecnet.com>
//
//  This library is free software; you can redistribute it and/or
//  modify it under the terms of the GNU Lesser General Public
//  License as published by the Free Software Foundation; either
//  version 2.1 of the License, or (at your option) any later version.
//
//  This library is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
//  Lesser General Public License for more details.
//
//  You should have received a copy of the GNU Lesser General Public
//  License along with this library; if not, write to the Free Software
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
//
//
// $Id: Pager.php,v 1.1.1.3 2007-11-05 16:43:56 glauber Exp $

require_once 'PEAR.php';
require_once 'DB.php';

/**
* This class handles all the stuff needed for displaying paginated results
* from a database query of Pear DB, in a very easy way.
* Documentation and examples of use, can be found in:
* http://vulcanonet.com/soft/pager/ (could be outdated)
*
* IMPORTANT!
* Since PEAR DB already support native row limit (more fast and avaible in
* all the drivers), there is no more need to use $pager->build() or
* the $pager->fetch*() methods.
*
*
* @version 0.8
* @author's Tomas V.V.Cox <cox@idecnet.com> & Renato Afonso Cota Silva <rac@spep.com.br>
*/

class DB_Pager extends PEAR
{

    /**
    * Constructor
    *
    * @param object $res  A DB_result object from Pear_DB
    * @param int    $from  The row to start fetching
    * @param int    $limit  How many results per page
    * @param int    $numRows Pager will automatically
    *    find this param if is not given. If your Pear_DB backend extension
    *    doesn't support numRows(), you can manually calculate it
    *    and supply later to the constructor
    * @deprecated
    */
    function DB_Pager ($res, $from, $limit, $numRows = null)
    {
        $this->res = $res;
        $this->from = $from;
        $this->limit = $limit;
        $this->numRows = $numRows;
    }

    /**
    * Calculates all the data needed by Pager to work
    *
    * @return mixed An assoc array with all the data (see getData)
    *    or DB_Error on error
    * @see DB_Pager::getData
    * @deprecated
    */
    function build()
    {
        // if there is no numRows given, calculate it
        if ($this->numRows === null) {
            //$this->numRows = $this->res->numRows();
			$this->numRows = sizeof($this->res);
            if (DB::isError($this->numRows)) {
                return $this->numRows;
            }
        }
        $data = $this->getData($this->from, $this->limit, $this->numRows,10);
		if (DB::isError($data)) {
            return $data;
        }
        $this->current = $this->from - 1;
        $this->top = $data['to'];
        return $data;
    }

    /*
    * Gets all the data needed to paginate results
    * This is an associative array with the following
    * values filled in:
    *
    * array(
    *    'current' => X,    // current page you are
    *    'numRows' => X,    // total number of results
    *    'next'    => X,    // row number where next page starts
    *    'prev'    => X,    // row number where prev page starts
    *    'remain'  => X,    // number of results remaning *in next page*
    *    'numpages'=> X,    // total number of pages
    *    'from'    => X,    // the row to start fetching
    *    'to'      => X,    // the row to stop fetching
    *    'limit'   => X,    // how many results per page
    *    'maxpages'   => X, // how many pages to show (google style)
    *    'firstpage'  => X, // the row number of the first page
    *    'lastpage'   => X, // the row number where the last page starts
    *    'pages'   => array(    // assoc with page "number => start row"
    *                1 => X,
    *                2 => X,
    *                3 => X
    *                )
    *    );
    * @param int $from    The row to start fetching
    * @param int $limit   How many results per page
    * @param int $numRows Number of results from query
    *
    * @return array associative array with data or DB_error on error
    *
    */
    function &getData($from, $limit, $numRows, $maxpages = false)
    {
        if (empty($numRows) || ($numRows < 0)) {
            return null;
        }
        $from = (empty($from)) ? 0 : $from;

        if ($limit <= 0) {
            return PEAR::raiseError (null, 'wrong "limit" param', null,
                                     null, null, 'DB_Error', true);
        }

        // Total number of pages
        $pages = ceil($numRows/$limit);
        $data['numpages'] = $pages;

        // first & last page
        $data['firstpage'] = 1;
        $data['lastpage']  = $pages;

        // Build pages array
        $data['pages'] = array();
        for ($i=1; $i <= $pages; $i++) {
            $offset = $limit * ($i-1);
            $data['pages'][$i] = $offset;
            // $from must point to one page
            if ($from == $offset) {
                // The current page we are
                $data['current'] = $i;
            }
        }
        if (!isset($data['current'])) {
            return PEAR::raiseError (null, 'wrong "from" param', null,
                                     null, null, 'DB_Error', true);
        }

        // Limit number of pages (goole algoritm)
        if ($maxpages) {
            $radio = floor($maxpages/2);
            $minpage = $data['current'] - $radio;
            if ($minpage < 1) {
                $minpage = 1;
            }
            $maxpage = $data['current'] + $radio - 1;
            if ($maxpage > $data['numpages']) {
                $maxpage = $data['numpages'];
            }
            foreach (range($minpage, $maxpage) as $page) {
                $tmp[$page] = $data['pages'][$page];
            }
            $data['pages'] = $tmp;
            $data['maxpages'] = $maxpages;
        } else {
            $data['maxpages'] = null;
        }

        // Prev link
        $prev = $from - $limit;
        $data['prev'] = ($prev >= 0) ? $prev : -1;

        // Next link
        $next = $from + $limit;
        $data['next'] = ($next < $numRows) ? $next : null;

        // Results remaining in next page & Last row to fetch
        if ($data['current'] == $pages) {
            $data['remain'] = 0;
            $data['to'] = $numRows;
        } else {
            if ($data['current'] == ($pages - 1)) {
                $data['remain'] = $numRows - ($limit*($pages-1));
            } else {
                $data['remain'] = $limit;
            }
            $data['to'] = $data['current'] * $limit;
        }
        $data['numRows'] = $numRows;
        $data['from']    = $from + 1;
        $data['limit']   = $limit;

        return $data;
    }
}
?>
