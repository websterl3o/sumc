<?
include_once 'Pager.php';
$user = 'root';
$pass = '123456';
$host = '192.168.100.39';
$db_name = 'bibtec';
// Data Source Name: This is the universal connection string
$dsn = "mysql://$user:$pass@$host/$db_name"; 

if (DB::isError($con = DB::connect($dsn))){
	die (DB::errorMessage($con));
}
$sql = "select * from Livro";
if (DB::isError($res = $con->query($sql))){
	die (DB::errorMessage($res));
}
// $from is received for example as url param:
// http://www.host.com/list.php?from=50
// $limit is the number of rows you want to display per page
$limit = 50;
//$from=0;
$pager = new DB_Pager ($res, $from, $limit);
// $data now contains all the data needed to build
// for example, links and displaying info to the user
$data = $pager->build();
if (DB::isError($data)){
//	die (DB::errorMessage($data));
	echo $data->getDebugInfo();	
}
if (!$data){
	die ('There were no results');
}
// Display data (only few examples)
echo '<html><body>';
echo $data['numRows'].' Results found'."<br>";
echo 'Page '.$data['current'].' of '.$data['numpages']."<br>";
echo $data['limit'].' results per page'."<br>";

// Next button
echo '<a href="'."$PHP_SELF?from=".$data['next'].'"> '.$data['remain'].' next-></a>'."<br><br>";

// Automatically fetch only the rows for this page.
// fetchInto() is also avaible
while ($row = $pager->fetchRow(DB_FETCHMODE_ASSOC)){
	echo $row['titulo']."<br>";
}

// Direct link to pages
foreach ($data['pages'] as $page => $start_row) {
	echo "<a href='$PHP_SELF?from=$start_row'>$page</a> ";
}

echo '</body></html>';
?>