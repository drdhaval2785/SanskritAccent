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


/* pATalApAlaGkAmbAsAgarArthAnAm (2) */
if (ends($text,array("pAwalA","surUpA","pAkalA","apAlaNka","Arevata","AragvaDa","mAtA","sAraga","samudra"),1))
{
	$text = antodAtta(0);
	storedata('Pi-2','sa',0);
}
/* gehArthAnAmastriyAm (3) */
// enumeration of other members pending.
elseif (ends($text,array("geha","gfha"),1))
{
	$text = antodAtta(0);
	storedata('Pi-3','sa',0);
}
/* gehArthAnAmastriyAm (3) */
// astriyAm iti jJApakAt
elseif (ends($text,array("SAlA"),1))
{
	$text = AdyudAtta(0);
	storedata('Pi-3','sa',0);
}
/* gudasya ca (4) */
elseif (ends($text,array("guda"),1))
{
	$text = antodAtta(0);
	storedata('Pi-4','sa',0);
}
/* dhyapUrvasya strIviSayasya (5) */
elseif (arr($text,'/[Dy][A]/'))
{
	$text = antodAtta(0);
	storedata('Pi-5','sa',0);
}
/* khAntasyAzmAdeH (6) */
elseif (arr($text,'/[K][aA]$/') && !arr($text,'/^[Sm]/'))
{
	$text = antodAtta(0);
	storedata('Pi-6','sa',0);
}
/* baMhizWavatsaratiSatTAntAnAm (7) */
elseif (ends($text,array("baMhizWa","vatsara","ti","Sat","Ta","TA"),1))
{
	$text = antodAtta(0);
	storedata('Pi-7','sa',0);
}
/* dakziRasya sADO (8) */
elseif ($_GET['phit']==='1.1')
{
	$text = antodAtta(0);
	storedata('Pi-8','sa',0);
}
/* svAGgAkhyAyAmAdirvA (9) */
elseif ($_GET['phit']==='1.2')
{
	$text = AdyantodAttavA(0);
	storedata('Pi-9','sa',0);
}
/* chandasi ca (10) */
elseif ($_GET['phit']==='1.3')
{
	$text = AdyantodAttavA(0);
	storedata('Pi-10','sa',0);
}
/* phiSo'nta udAttaH (1) */
else
{
	$text = antodAtta();
	storedata('Pi-1','sa',0);	
}


/* Displaying the sUtras and sequential changes */
display_phiT();

/* End of Code */
?>