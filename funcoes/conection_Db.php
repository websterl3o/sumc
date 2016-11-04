<?php

	$link = mysqli_connect('localhost', 'admin', 'admin123','sumc');
	if (!$link) {
	    die('Não foi possível conectar: ' . mysql_error());
	}
