<?php


function debug($arr,$break = 1){
	echo '<pre>';
	print_r($arr);
	echo "</pre>";
	if($break){
		exit();
	}

}