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


/* pATalApAlaGkAmbAsAgarArthAnAm (1.2) */
if (sub(array("pAwalA","surUpA","pAkalA","apAlaNka","Arevata","AragvaDa","mAtA","sAraga","samudra"),blank(0),blank(0),0))
{
	$text = antodAtta();
	storedata('PiwsUtra-1.2','sa',0);
}
/* gehArthAnAmastriyAm (1.3) */
// enumeration of other members pending.
elseif (sub(array("geha","gfha"),blank(0),blank(0),0))
{
	$text = antodAtta();
	storedata('PiwsUtra-1.3','sa',0);
}
/* gehArthAnAmastriyAm (1.3) */
// astriyAm iti jJApakAt
elseif (sub(array("SAlA"),blank(0),blank(0),0))
{
	$text = AdyudAtta();
	storedata('PiwsUtra-1.3','sa',0);
}
/* gudasya ca (1.4) */
elseif (sub(array("guda"),blank(0),blank(0),0))
{
	$text = antodAtta();
	storedata('PiwsUtra-1.4','sa',0);
}
/* dhyapUrvasya strIviSayasya (1.5) */
elseif (arr($text,'/[Dy][A]/'))
{
	$text = antodAtta();
	storedata('PiwsUtra-1.5','sa',0);
}
/* phiSo'nta udAttaH (1.1) */
else
{
	$text = antodAtta();
	storedata('PiwsUtra-1.1','sa',0);	
}


/* Displaying the sUtras and sequential changes */
display_phiT();

/* End of Code */
?>