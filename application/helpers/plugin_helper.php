<?php

function rupiah($number){
	$output = "Rp " . number_format($number,2,',','.');
	return $output;
}