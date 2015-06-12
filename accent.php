<?php
/* Trying fo accents */
/* _ for anudAtta, ^ for udAtta, # for svarita inside the machine process. */
 
/* Including arrays and functions */
include "function.php"; // includes the file function.php which is collection of functions used in this code.
include "slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "dev-slp.php"; // includes code for devanagari to SLP.

/* hides error reports. */
//error_reporting(0);

/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 100000 MB */
ini_set("memory_limit","100000M");

/* Defining header for all HTMLs */
$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!--... Defining UTF-8 as our default character set, so that devanagari is displayed properly. -->
<meta charset="UTF-8">
<!--... Defining CSS -->
<link rel="stylesheet" type="text/css" href="mystyle.css">
<!--... including Ajax jquery. -->
</head> 
<body>';
$upasarga_joined = 1;
$us = "";

/* Reading from the HTML input. */
$first = toslp($_GET["first"]); // to change the word input in devanagari / IAST to slp.
$frontend = $_GET["frontend"];
global $storedata;

echo $header;
echo "Input word is - ".$first;
$text = array($first);
$storedata=array();

/* phiSo'nta udAttaH (F.1.1) */
foreach ($text as $value)
{
	$val[] = preg_replace('/([aAiIuUeEoO])([^aAiIuUeEoO]*)$/','$1^$2',$value);
}
$text = $val; $val=array();
storedata('f.1.1','sa',0);
/* Displaying the sUtras and sequential changes */
display_from_storedata();

/* End of Code */
?>