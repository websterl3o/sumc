<?php

function pr($str, $align = '') {
    echo"<pre" . ( (!empty($align) ) ? " align='$align'" : "" ) . ">";
    print_r($str);
    echo"</pre>";
}

function consulta($sql) {
    $result = mysql_query($sql);
    return $result;
}
