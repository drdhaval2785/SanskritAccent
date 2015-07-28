<?php
/* Trying fo accents */
/* _ for anudAtta, ^ for udAtta, # for svarita inside the machine process. */
 
/* Including arrays and functions */
include "function.php"; // includes the file function.php which is collection of functions used in this code.
include "slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "dev-slp.php"; // includes code for devanagari to SLP.

/* hides error reports. */
error_reporting(0);

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
$veda = $_GET["veda"];
$gender = $_GET["gender"];
global $storedata;

echo $header;
echo '<p class="red">Input word is - '.convert($first).'</p>';
/* Displaying the udAtta, anudAtta, svarita mArks. */
echo '<p class="hn">Please note - We have used ॑ to denote udAtta,  ॒ to denote anudAtta and  ᳠ to denote svarita</p>';
echo '<hr>';
$text = array($first);
$storedata=array();

// Numbers refer to that of SK with Sri Balamanorama 1911 edition.
/* athAdiH prAk zakaTeH (24) */
// This is adhikArasUtra. It is implicitly coded in each code fragment from 25 to 68.
/* atha dvitIyaM prAgISAt (50) */
// This is adhikArasUtra. It is implicitly coded in each code fragment from 51 to 65.
/* tryacAM prAGmakarAt (51) */
// This is adhikArasUtra. It is implicitly coded in each code fragment from 52 to 56.
/* akSasyAdevanasya (35) */
if ($_GET['phit']==='9.2')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-35','sa',0);
}
/* ardhasyAsamadyotane (36) */
elseif ($_GET['phit']==='10.1')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-36','sa',0);
}
/* Chandasi ca (58) */
elseif ($veda==='1' && ends($text,array("nAsikA"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(0);
	storedata('Pi-58','sa',0);
}
/* kardamAdInAM ca (59) */
elseif (ends($text,array("kardama","kulawA","udaka","gAnDAri"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(0);
	storedata('Pi-59','sa',0);
}
/* sugandhitejanasya te vA (60) */
elseif (ends($text,array("suganDitejana","suganDitejanA"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(0);
	$text = one(array("su^ganDitejana","su^ganDitejanA"),array("suganDite^jana","suganDite^janA"),1);
	storedata('Pi-60','sa',0);
}
/* napaH phalAntAnAm (61) */
// napuMsakam pending.
elseif (ends($text,array("Pala"),1) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(0);
	storedata('Pi-61','sa',0);
}
/* yAntasyAntyAtpUrvam (62) */
elseif (ends($text,array("ya","yA"),1) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(0);
	storedata('Pi-62','sa',0);
}
/* makaravarUDhapArevatavitastekSvArjidrAkSAkalomaakaaSThApeShThAkASInAmAdirvA (57) */
// Some alternative readings are given in books, which need to be examined. Pending.
elseif (ends($text,array("makara","varUQa","pArevata","vitastA","ikzu","Arji","drAkzA","kalA","umA","kAzWA","pezWA","kASI"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(0);
	storedata('Pi-57','sa',0);
}
/* svAGgAnAmakurvAdInAm (52) */
elseif (in_array(3,countac()) && ends($text,array("lalAwa","rarAwa","jaGana","upasTa","jaWara","udara"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(0);
	storedata('Pi-52','sa',0);
}
/* mAdInAM ca (53) */
elseif (in_array(3,countac()) && arr($text,'/^[m]/') )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(0);
	storedata('Pi-53','sa',0);
}
/* zAdInAM zAkAnAm (54) */
// Why violation of tryacAM is not mentioned anywhere.
elseif ( ends($text,array("SItanyA","SatapuzpA","suvarcalA","sarzapA","sasPuwA"),2))
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(0);
	storedata('Pi-54','sa',0);
}
/* pAntAnAM gurvAdInAm (55) */
elseif (in_array(3,countac()) && (arr($text,'/^([^aAiIuUfFxXeEoO]*)([AIUFXeEoO])([^aAiIuUfFxXeEoO]*)(['.pc('ac').'])/') || arr($text,'/([aiufx]*)(['.pc('hl').'MH])(['.pc('hl').'MH])(['.pc('hl').'MH]*)(['.pc('ac').'])/') ) && arr($text,'/[p][a]$/') )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(0);
	storedata('Pi-55','sa',0);
}
/* yutAnyaNtyantAnAm (56) */
elseif (in_array(3,countac()) && ends($text,array("yuta","ani","aRi"),1) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(0);
	storedata('Pi-56','sa',0);
}
/* strIviSayavarNAkSupUrvANAm (43) */
elseif (arr($text,'/[AI]$/') || ends($text,array("SyenI","hariRI"),2) || ends($text,array("akzu"),1))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-43','sa',0);
}
/* igantAnAM ca dvyaSAm (49) */
elseif (arr($text,'/[iIuUfFx]$/') && dvyac())
{
	storedata('Pi-24','pa',0);
	$text = antyapUrvodAtta();
	storedata('Pi-49','sa',0);
}
/* zakunInAM ca laghu pUrvam (44) */
// The examples vary in phiTsUtra vRtti and laghusiddhAntakaumudI. Please have a look.
elseif ( ends($text,array("kukkuwa","tittiri"),2) )
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-44','sa',0);
}
/* zakunInAM ca laghu pUrvam (44) */
// This is according to phiTsUtra vRtti.
elseif ( ends($text,array("kfkavAku","kapota"),2) )
{
	storedata('Pi-24','pa',0);
	$text = laghAvante();
	storedata('Pi-44','sa',0);
}
/* nartuprANyAkyAyAm (45) */
elseif ( ends($text,array("vasanta","kfkalAsa"),2) )
{
	storedata('Pi-24','pa',0);
	$text = antodAtta(0);
	storedata('Pi-45','sa',0);
}
/* dhAnyAnAM ca vRddhakSAntAnAm (46) */
elseif (ends($text,array("SyAmAka","mAza","SyAmAkA","mAzA"),1))
{
	storedata('Pi-24','pa',0);
	$text = laghAvante(); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-46','sa',0);
}
/* hayAdInAmasaMyuktalAntAnAmantaH pUrvaM vA (48) */
elseif (arr($text,'/['.pc('hy').']*['.pc('ac').'][l][a]$/'))
{
	storedata('Pi-24','pa',0);
	$text = antyapUrvodAtta(); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-48','sa',0);
}
/* janapadazabdAnAmaSantAnAm (47) */
// aSantAnAm / aSAntAnAm seems to be an issue in grammar texts.
elseif (ends($text,$janapada,2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-47','sa',0);
}
/* laghAvante dvayozca bahvaSo guruH (42) */
elseif (arr($text,$pattern1)||twolaghuoneguru())
{
	storedata('Pi-24','pa',0);
	$text = laghAvante(); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-42','sa',0);
}
/* pItadrvarthAnAm (37) */
elseif (ends($text,array("pItadru","pItadAru","devadAru","BadradAru"),2)) // The list is taken from zAntanava's phiTsUtras 99999990290369 of DLI www.dli.gov.in. Also see 99999990293891 svarasiddhAntacandrikA of DLI.
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-37','sa',0);
}
/* grAmAdInAM ca (38) */
elseif (ends($text,array("grAma","soma","yAma","purUza","SUra","vfdDa",),2)) // AkRtigaNa.
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-38','sa',0);
}
/* rAjavizeSasya yamanvA cet (41) */
elseif (ends($text,array("ANga","sOhma"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-41','sa',0);
}
/* na vRkSaparvatavizeSavyAghrasiMhamahiSANAm (40) */
// Check whether the interpretation is correct or not. It seems that 39,40 are not word specific. They are context dependent.
elseif (ends($text,array("vfkza","tAla","meru","vyaGra","siMha","mahiza","plakza","nyagroDa","aSvatTa","himavAn","mandara","mahAgiri"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-40','sa',0);
}
/* lubantasyopameyopameyanAmadheyasya (39) */
// Check whether the interpretation is correct or not.
elseif (ends($text,array("caYcA","rOdra"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-39','sa',0);
}
/* hrasvAntasya hrasvamanRttAcCIlye (34) */
elseif ($_GET['phit']==='8.1')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-34','sa',0);
}
/* hrasvAntasya strIvizayasya (25) */
elseif (arr($text,'/[iu]$/') && $gender==='f')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-25','sa',0);
}
/* tRNadhAnyAnAM ca dvyaSAm (27) */
elseif (ends($text,array("kASa","kuSa","kunda","mAza","tila","mudga","kASA","kuSA","kundA","mAzA","tilA","mudgA",),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-27','sa',0);
}
/* nraH saGkhyAyAH (28) */
elseif (sub(array("paYcan","navan","daSan","catur","catuH","catuz","paYca","nava","daSa","catvAr"),blank(0),blank(0),0))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-28','sa',0);
}
/* svAGgaziTAmadantAnAm (29) */
elseif (ends($text,array("danta","pAda","hasta","keSa","ozWa","muKa","sarva","viSva","itara","tva","nema","sima","eka","etara"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-29','sa',0);
}
/* prANinAM kupUrvam (30) */
elseif (arr($text,'/[aAiIuUfFxXeEoO][kKgGN][a]$/') && ends($text,array("Suka","vfka","kAka","koka","baka",),1))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-30','sa',0);
}
/* KayyuvarNaM kRtrimAkhyA cet (31) */
elseif ($_GET['phit']==='7.1')
{
	storedata('Pi-24','pa',0);
	$text = preg_accent('/([uU])([KPCWTcwtkp])/','$1^$2',0);
	storedata('Pi-31','sa',0);
}
/* arjunasya tRNAkhyA cet (16) */
elseif ($_GET['phit']==='3.1')
{
	$text = antodAtta(0);
	storedata('Pi-16','sa',0);
}
/* unarvanantAnAm (32) */
elseif (ends($text,array("una","ruRa","f","van"),1))
{
	storedata('Pi-24','pa',0);
	$text = one(array("una","ruRa","f","van"),array("u^na","ru^Ra","f^","va^n"),0);
	storedata('Pi-32','sa',0);
}
/* varNAnAM taNatinitAntAnAm (33) */
elseif (ends($text,array("eta","Sveta","rohita","lohita","harita","SoRa","pfSni","Siti","pfzat","harit"),1))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-33','sa',0);
}
/* nabviSayasyAnisantasya (26) */
elseif (!arr($text,'/is$/') && $gender==='n')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(0);
	storedata('Pi-26','sa',0);
}
/* pATalApAlaGkAmbAsAgarArthAnAm (2) */
elseif (ends($text,array("pAwalA","surUpA","pAkalA","apAlaNka","Arevata","AragvaDa","mAtA","sAraga","samudra"),1))
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
elseif ($veda==="1" && ends($text,array("dakziRa"),1) )
{
	$text = AdyantodAttavA(0);
	storedata('Pi-10','sa',0);
}
/* kRSNasyAjmRgAkhyA cet (11) */
elseif ($_GET['phit']==='2.3')
{
	$text = antodAtta(0);
	storedata('Pi-11','sa',0);
}
/* vA nAmadheyasya (12) */
elseif ($_GET['phit']==='2.2')
{
	$text = AdyantodAttavA(0);
	storedata('Pi-12','sa',0);
}
/* zuklagaurayorAdiH (13) */
elseif (ends($text,array("Sukla","gOra"),1))
{
	$text = AdyantodAttavA(0);
	storedata('Pi-13','sa',0);
}
/* aGguSThodakabakavazAnAM chandasyantaH (14) */
elseif (ends($text,array("aNguzWa","udaka","baka","vaSA"),1) && $veda==="1")
{
	$text = antodAtta(0);
	storedata('Pi-14','sa',0);
}
/* aGguSThodakabakavazAnAM chandasyantaH (14) */
elseif (ends($text,array("vaSA"),1) && $veda==="0")
{
	$text = AdyudAtta(0);
	storedata('Pi-14','sa',0);
}
/* pRSThasya ca (15) */
elseif (ends($text,array("pfzWa"),1) && $veda==="1")
{
	$text = antodAtta(0);
	storedata('Pi-15','sa',0);
}
/* pRSThasya ca (15) */
// Pending to verify the implication.
elseif (ends($text,array("pfzWa"),1) && $veda==="0")
{
	$text = AdyantodAttavA(0);
	storedata('Pi-15','sa',0);
}
/* Aryasya svAmyAkhyA cet (17) */
elseif ($_GET['phit']==='4.1')
{
	$text = antodAtta(0);
	storedata('Pi-17','sa',0);
}
/* AzAyA adigAkyA cet (18) */
elseif ($_GET['phit']==='5.2')
{
	$text = antodAtta(0);
	storedata('Pi-18','sa',0);
}
/* AzAyA adigAkyA cet (18) */
elseif ($_GET['phit']==='5.1')
{
	$text = AdyudAtta(0);
	storedata('Pi-18','sa',0);
}
/* nakSatrANAmabviSayANAm (19) */
elseif (ends($text,array("jyezWA","SravizWA","DanizWA","ASleSA","anurADA"),1))
{
	$text = AntodAtta(0);
	storedata('Pi-19','sa',0);
}
/* na kupUrvasya kRttikAkhyA cet (20) */
elseif (ends($text,array("kfttikA","AryikA","bahulikA"),1))
{
	$text = AdyudAtta(0);
	storedata('Pi-20','sa',0);
}
/* ghRtAdInAM ca (21) */
// List from phiTvRtti.
elseif (ends($text,array("Gfta","rajata","Sveta","sapta","azwO","jAtarUpa"),1))
{
	$text = antodAtta(0);
	storedata('Pi-21','sa',0);
}
/* jyeSThakaniSThayorvayasi (22) */
elseif ($_GET['phit']==='6.1')
{
	$text = antodAtta(0);
	storedata('Pi-22','sa',0);
}
/* bilvatizyayoH svarito vA (23) */
elseif (ends($text,array("bilva","tizya"),1))
{
	$text = antasvaritodAttavA(0);
	storedata('Pi-22','sa',0);
}
/* phiSo'nta udAttaH (1) */
else
{
	$text = antodAtta(0);
	storedata('Pi-1','sa',0);	
}


/* Displaying the sUtras and sequential changes */
display_phiT();

/* End of Code */
?>