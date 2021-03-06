<?php
/* _ for anudAtta, ^ for udAtta, # for svarita inside the machine process. */
 /* This code is developed by Dr. Dhaval Patel (drdhaval2785@gmail.com) of www.sanskritworld.in and Dr. Sivakumari Katuri.
  * Layout assistance by Mr Marcis Gasuns.
  * Available under GNU licence.
  * Version 1.0.0 date 4 October 2015
  * The latest source code is available at https://github.com/drdhaval2785/SanskritAccent
  * The bugs are reported and dealt with at https://github.com/drdhaval2785/SanskritAccent/issues
  * Acknowledgements: I extend my heartfelt thanks to Ananda Loponen for the code to convert devanagari and various sanskrit transliterations. That can be accessed at http://www.ingmardeboer.nl/php/diCrunch.php?act=help.
  * I also extend my gratitude to gloomy.penguin of stackoverflow.com, who helped me create dvitva and lopa functions, without which I would be handicapped.
  * For setup, copy and paste accent.php, accent.html, script.js, ajax.php, function.php, mystyle.css, slp-dev.php and dev-slp.php to your localhost or server and run subanta.html from browser.
  * accent.html is the frontend for the code.
  * ajax.php and script.js are codes which asks for user feedback for particular words. 
  * function.php stores the frequently used functions in this code (The description on how to use the code is there in function.php).
  * accent.php is the code which actually gives the output of the word accent with relevant phiTsUtras.
  * slp-dev.php is for converting SLP1 data to Devanagari. 
  * dev-slp.php is for converting Devanagari data to SLP1.
  * Mystyle.css is stylesheet where you can change your preferences.
  * The code uses jquery.
  * The description part uses Howard Kyoto protocol.
  * The coding uses SLP1 transliteration.
  */
 
/* Including arrays and functions */
include "function.php"; // includes the file function.php which is collection of functions used in this code.
include "slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "dev-slp.php"; // includes code for devanagari to SLP.

/* hides error reports. */
error_reporting(1);

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
	$text = AdyudAtta(1);
	storedata('Pi-35','sa',0);
}
/* ardhasyAsamadyotane (36) */
if ($_GET['phit']==='10.1')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-36','sa',0);
}
/* Aryasya svAmyAkhyA cet (17) */
if ($_GET['phit']==='4.1')
{
	$text = antodAtta(1);
	storedata('Pi-17','sa',0);
}
/* AzAyA adigAkyA cet (18) */
if ($_GET['phit']==='5.2')
{
	$text = antodAtta(1);
	storedata('Pi-18','sa',0);
}
/* AzAyA adigAkyA cet (18-1) */
if ($_GET['phit']==='5.1')
{
	$text = AdyudAtta(1);
	storedata('Pi-18-1','sa',0);
}
/* hrasvAntasya hrasvamanRttAcCIlye (34) */
if ($_GET['phit']==='8.1')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-34','sa',0);
}
/* KayyuvarNaM kRtrimAkhyA cet (31) */
if ($_GET['phit']==='7.1')
{
	storedata('Pi-24','pa',0);
	$text = preg_accent('/([uU])([KPCWTcwtkp])/','$1^$2',0);
	storedata('Pi-31','sa',0);
}
/* arjunasya tRNAkhyA cet (16) */
if ($_GET['phit']==='3.1')
{
	$text = antodAtta(1);
	storedata('Pi-16','sa',0);
}
/* vA nAmadheyasya (12) */
if ($_GET['phit']==='2.2')
{
	$text = AdyantodAttavA(1);
	storedata('Pi-12','sa',0);
}
/* kRSNasyAmRgAkhyA cet (11) */
if ( $_GET['phit']==='2.3' && $veda==='1')
{
	$text = antodAtta(1);
	storedata('Pi-11','sa',0);
}
/* jyeSThakaniSThayorvayasi (22) */
if ($_GET['phit']==='6.1')
{
	$text = antodAtta(1);
	storedata('Pi-22','sa',0);
}
/* dakziRasya sADO (8) */
if ($_GET['phit']==='1.1')
{
	$text = antodAtta(1);
	storedata('Pi-8','sa',0);
}
/* svAGgAkhyAyAmAdirvA (9) */
if ($_GET['phit']==='1.2')
{
	$text = AdyantodAttavA(1);
	storedata('Pi-9','sa',0);
}
/* nabviSayasyAnisantasya (26) */
// See https://github.com/drdhaval2785/SanskritAccent/issues/31 for details.
if (in_array($first,array("mA!sa","mAMsa")) && $gender==='n')
{
	storedata('Pi-24','pa',0);
	$text = antodAtta(1);
	storedata('Pi-26-1','sa',0);
}
/* Chandasi ca (58) */
if ($veda==='1' && ends($text,array("nAsikA"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(1);
	storedata('Pi-58','sa',0);
}
/* aGguSThodakabakavazAnAM chandasyantaH (14) */
if (ends($text,array("aNguzWa","udaka","baka","vaSA","vaSa"),1) && $veda==="1")
{
	$text = antodAtta(1);
	storedata('Pi-14','sa',0);
}
/* aGguSThodakabakavazAnAM chandasyantaH (14) */
if (ends($text,array("vaSA"),1) && $veda==="0")
{
	$text = AdyudAtta(1);
	storedata('Pi-14-1','sa',0);
}
/* kardamAdInAM ca (59) */
if (ends($text,array("kardama","kulawA","udaka","gAnDAri"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(1);
	storedata('Pi-59','sa',0);
}
/* zakaTizakaTyorakSaramakSaramparyAyeNa (69) */
if (ends($text,array("Sakawi","SakawI"),2) )
{
	$text = one(array("Sakawi","SakawI"),array("Sa^kawi","Sa^kawI"),1);
	$text = one(array("Sakawi","SakawI"),array("Saka^wi","Saka^wI"),1);
	$text = one(array("Sakawi","SakawI"),array("Sakawi^","SakawI^"),0);
	storedata('Pi-69','sa',0);
}
/* goSThajasya brAhmaNanAmadheyasya (70) */
if (ends($text,array("gozWaja"),2) )
{
	$text = one(array("gozWaja"),array("go^zWaja"),1);
	$text = one(array("gozWaja"),array("gozWa^ja"),1);
	$text = one(array("gozWaja"),array("gozWaja^"),0);
	storedata('Pi-70','sa',0);
}
/* pArAvatasyopottamavarjam (71) */
if (ends($text,array("pArAvata"),2) )
{
	$text = one(array("pArAvata"),array("pA^rAvata"),1);
	$text = one(array("pArAvata"),array("pArA^vata"),1);
	$text = one(array("pArAvata"),array("pArAvata^"),0);
	storedata('Pi-71','sa',0);
}
/* dhUmrajAnumuJjakezakAlavAlasTAlIpAkAnAmadhUjalasthAnAm (72) */
if (ends($text,array("DUmrajAnu","muYjakeSa","kAlavAla"."sTAlIpAka"),2) )
{
	$text = one(array("DUmrajAnu","muYjakeSa","kAlavAla"."sTAlIpAka"),array("DUmra^jAnu","mu^YjakeSa","kA^lavAla"."sTAlI^pAka"),1);
	$text = one(array("DUmrajAnu","muYjakeSa","kAlavAla"."sTAlIpAka"),array("DUmrajA^nu","muYjake^Sa","kAlavA^la"."sTAlIpA^ka"),1);
	$text = one(array("DUmrajAnu","muYjakeSa","kAlavAla"."sTAlIpAka"),array("DUmrajAnu^","muYjakeSa^","kAlavAla^"."sTAlIpAka^"),0);
	storedata('Pi-72','sa',0);
}
/* kapikezaharikezayozChandasi (73) */
if (ends($text,array("kapikeSa","harikeSa"),2) && $veda==='1' )
{
	$text = one(array("kapikeSa","harikeSa"),array("ka^pikeSa","ha^rikeSa"),1);
	$text = one(array("kapikeSa","harikeSa"),array("kapi^keSa","hari^keSa"),1);
	$text = one(array("kapikeSa","harikeSa"),array("kapike^Sa","harike^Sa"),1);
	$text = one(array("kapikeSa","harikeSa"),array("kapikeSa^","harikeSa^"),0);
	storedata('Pi-73','sa',0);
}
/* nyaGsvarau svaritau (74) */
if (ends($text,array("nyaN","svar"),2) )
{
	$text = one(array("nyaN","svar"),array("nya#N","sva#r"),0);
	storedata('Pi-74','sa',0);
}
/* nyarbudavyalkazayorAdiH (75) */
if (ends($text,array("nyarbuda","vyalkaSa"),2) )
{
	$text = one(array("nyarbuda","vyalkaSa"),array("nya#rbuda","vya#lkaSa"),0);
	storedata('Pi-75','sa',0);
}
/* tilyazikyamatyakArSmaryadhAnyakanyArAjanyamanuSyANAmantaH (76) */
if (ends($text,array("tilya","Sikya","matya","kArzmya","DAnya","kanyA","rAjanya","manuzya"),2) )
{
	$text = one(array("tilya","Sikya","matya","kArzmya","DAnya","kanyA","rAjanya","manuzya"),array("tilya#","Sikya#","matya#","kArzmya#","DAnya#","kanyA#","rAjanya#","manuzya#"),0);
	storedata('Pi-76','sa',0);
}
/* bilvatizyayoH svarito vA (23) */
if (ends($text,array("bilva","tizya"),1))
{
	$text = antasvaritodAttavA(1);
	storedata('Pi-23','sa',0);
}
/* bilvabhakSyavIryANi Chandasi (77) */
if (ends($text,array("bilva","Bakzya","vIrya"),2) && $veda==="1" )
{
	$text = one(array("bilva","Bakzya","vIrya"),array("bilva#","Bakzya#","vIrya#"),0);
	storedata('Pi-77','sa',0);
}
/* tvattvasamasimetyanuccAni (78) */
if (ends($text,array("tvat","tva","sama","sima"),2) )
{
	$text = one(array("tvat","tva","sama","sima"),array("tva_t","tva_","sama_","sima_"),0);
	storedata('Pi-78','sa',0);
	/* simasyATarvaNe'nta udAttaH (79) */
	if (ends($text,array("sima"),2) )
	{
		$text = one(array("sima"),array("sima^"),0);
		storedata('Pi-79','sa',0);
	}
}
/* upasargAzcAbhivarjam (81) */
if (ends($text,$upasarga,2) && !ends($text,array("aBi"),2) )
{
	$text = AdyudAtta(1);
	storedata('Pi-81','sa',0);
}
/* nipAtA AdyudAttAH (80) */
if (ends($text,array("nUnam","nUnaM","SaSvat","SaSvad","yugapat","yugapad","BUyas","BUyaH","kUpat","kUpad","sUpat","sUpad","kaccit","kaccid","kiYcit","kiYcid","yatra","naha","hanta","mAkiH","mAkis","mAkim","mAkiM","nakiH","nakis","Akim","AkiM","nakim","nakiM","yAvat","yAvad","tAvat","tAvad","SrOzaw","vOzaw","svAhA","svaDA","vazaw","taTAhi","Kalu","aTo","aTa","suzWu","Adaha","avadattam","ahaMyus","ahaMyuH","astikzIrA","paSu","Sukam","yaTA","kaTA","taTA","aNga","Bos","BoH","aye","vizu","ekapade","Atas","AtaH"),2) )
{
	/* yatheti pAdAnte (85) */
	if (ends($text,array("yaTA"),2))
	{
		$text = antodAtta(1);
		storedata('Pi-85','sa',0);
	}
	$text = AdyudAtta(1);
	storedata('Pi-80','sa',0);
}
/* evAdInAmantaH (82) */
if (ends($text,array("eva","evam","evaM","kuvit","kuvid"),2) )
{
	$text = antodAtta(1);
	storedata('Pi-82','sa',0);
}
/* prakArAdidviruktau parasyAnta udAttaH (86) */
if (ends($text,array("pawupawu","yaTAyaTa","yaTAyaTAm"),2) )
{
	$text = antodAtta(1);
	storedata('Pi-86','sa',0);
}
/* zeSaM sarvamanudAttam (87) */
if (ends($text,array("praprAyam","praprAya","divedive"),2) )
{
	$text = AdyanudAtta(1);
	storedata('Pi-87','sa',0);
}
/* vAvAdInAmubhAvudAttau (83) */
// Meaning not clear
if ( ends($text,array("vAvat","vAvad",),2) )
{
	$text = AdyantodAttavA(1);
	storedata('Pi-83','sa',0);
}
/* cAdayo'nudAttAH (84) */
if (ends($text,array("ca","vA","ha","net","ned","cet","ced","caR","mAN","naY","mA","na","tvE","dvE","nvE","rE","om","oM","tum","tuM","sma","a","A","i","I","u","U","e","E","o","O","pAw","pyAw","hE","he","Bos","BoH","dya","yut","yud",),2) )
{
	$text = AdyanudAtta(1);
	storedata('Pi-84','sa',0);
}
/* sugandhitejanasya te vA (60) */
if (ends($text,array("suganDitejana","suganDitejanA"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(1);
	$text = one(array("su^ganDitejana","su^ganDitejanA"),array("suganDite^jana","suganDite^janA"),1);
	storedata('Pi-60','sa',0);
}
/* napaH phalAntAnAm (61) */
// napuMsakam pending.
if (ends($text,array("Pala"),1) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(1);
	storedata('Pi-61','sa',0);
}
/* sAMkAzyakAmpilyanAsikyadArvAghATAnAm (65) */
if (ends($text,array("sANkASya","kAmpilya","nAsikya","dArvAGAwa"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = antyAtpUrvodAtta(1);
	$text = one(array("sANkASya","kAmpilya","nAsikya","dArvAGAwa"),array("sA^NkASya","kA^mpilya","nA^sikya","dArvA^GAwa"),0);
	$text = one(array("dArvA^GAwa"),array("dArvAGAwa^"),1);
	storedata('Pi-65','sa',0);
}
/* ISAntasya hayAderAdirvA (66) */
if (arr($text,'/^['.pc('hy').'](['.pc('al').'MH]*)[I][z][aA]$/'))
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(1);
	storedata('Pi-66','sa',0);
}
/* uzIradAzerakapAlapalAlazaivAlazyAmAkazArIrazarAvahRdayahiraNyAraNyApatyadevarANAm (67) */
if (ends($text,array("uSIra","dASera","kapAla","palAla","SEvAla","SyAmAka","SarIra","SarAva","hfdaya","hiraRya","araRya","apatya","devara",),2) )
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-67','sa',0);
}
/* mahiSyaSADhayorjAyeSTakAkhyA cet (68) */
if (ends($text,array("mahizI","azAQA",),2) )
{
	storedata('Pi-24','pa',0);
	$text = AdyantodAttavA(1);
	storedata('Pi-68','sa',0);
}
/* na kupUrvasya kRttikAkhyA cet (20) */
if (ends($text,array("kfttikA","AryikA","bahulikA"),1))
{
	$text = AdyudAtta(1);
	storedata('Pi-20','sa',0);
}
/* thAntasya nAlaghunI (63) */
// Acc to SK.
if (ends($text,array("sanATA","sanATa"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = antyAtpUrvodAtta(1);
	storedata('Pi-63','sa',0);
}
/* thAntasya nAlaghunI (63) */
// Acc to other texts.
/*if (ends($text,array("A"),1) && arr($text,'/[aiufx]['.pc('hl').'MH][A]$/') )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = antyAtpUrvodAtta(1);
	storedata('Pi-63','sa',0);
}*/
/* ziMzumArodumbarabalIvardoSTrArapurUravasAM ca (64) */
// I am not sure whether the dvitIyaM word stands for second or thirdlast.
if (ends($text,array("SiMSumAra","udumbara","balIvarda","uzwrAra","uzwAra","purUravas","purUravA"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = antyAtpUrvodAtta(1);
	$text = one(array("SiMSumAra","udumbara","balIvarda","uzwrAra","uzwAra","purUravas","purUravA"),array("SiMSu^mAra","udu^mbara","balI^varda","uzwrA^ra","uzwA^ra","purU^ravas","purU^ravA"),0);
	storedata('Pi-64','sa',0);
}
/* makaravarUDhapArevatavitastekSvArjidrAkSAkalomaakaaSThApeShThAkASInAmAdirvA (57) */
// Some alternative readings are given in books, which need to be examined. Pending.
if (ends($text,array("makara","varUQa","pArevata","vitastA","ikzu","Arji","drAkzA","kalA","umA","kAzWA","pezWA","kASI"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = AdidvitIyodAtta(1);
	storedata('Pi-57','sa',0);
}
/* svAGgAnAmakurvAdInAm (52) */
if (in_array(3,countac()) && ends($text,array("lalAwa","rarAwa","jaGana","upasTa","jaWara","udara"),2) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(1);
	storedata('Pi-52','sa',0);
}
/* na vRkSaparvatavizeSavyAghrasiMhamahiSANAm (40) */
// Check whether the interpretation is correct or not. It seems that 39,40 are not word specific. They are context dependent.
if (ends($text,array("vfkza","tAla","meru","vyaGra","siMha","mahiza","plakza","nyagroDa","aSvatTa","himavAn","mandara","mahAgiri"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-40','sa',0);
}
/* lubantasyopameyopameyanAmadheyasya (39) */
// Check whether the interpretation is correct or not.
if (ends($text,array("caYcA","rOdra"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-39','sa',0);
}
/* strIviSayavarNAkSupUrvANAm (43) */
if ( ends($text,array("mallikA"),2) )
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-43','sa',0);
}
/* mAdInAM ca (53) */
if (in_array(3,countac()) && arr($text,'/^[m]/') )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(1);
	storedata('Pi-53','sa',0);
}
/* zAdInAM zAkAnAm (54) */
// Why violation of tryacAM is not mentioned anywhere.
if ( ends($text,array("SItanyA","SatapuzpA","suvarcalA","sarzapA","sasPuwA"),2))
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(1);
	storedata('Pi-54','sa',0);
}
/* pAntAnAM gurvAdInAm (55) */
if (in_array(3,countac()) && (arr($text,'/^([^aAiIuUfFxXeEoO]*)([AIUFXeEoO])([^aAiIuUfFxXeEoO]*)(['.pc('ac').'])/') || arr($text,'/([aiufx]*)(['.pc('hl').'MH])(['.pc('hl').'MH])(['.pc('hl').'MH]*)(['.pc('ac').'])/') ) && arr($text,'/[p][a]$/') )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(1);
	storedata('Pi-55','sa',0);
}
/* yutAnyaNtyantAnAm (56) */
if (in_array(3,countac()) && ends($text,array("yuta","ani","aRi"),1) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	storedata('Pi-51','pa',0);
	$text = dvitIyodAtta(1);
	storedata('Pi-56','sa',0);
}
/* ghRtAdInAM ca (21) */
// List from phiTvRtti.
if (ends($text,array("Gfta","rajata","Sveta","sapta","azwO","jAtarUpa","uBa","saptan","azwan"),1))
{
	$text = antodAtta(1);
	storedata('Pi-21','sa',0);
}
/* svAGgaziTAmadantAnAm (29) */
if (ends($text,array("jaNGA","ozWa","danta","pAda","hasta","keSa","ozWa","muKa","gudA","sarva","viSva","itara","tva","nema","sima","eka","etara","uBa","SiKA"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-29','sa',0);
}
/* pATalApAlaGkAmbAsAgarArthAnAm (2) */
if (ends($text,array("pAwalA","surUpA","pAkalA","apAlaNka","Arevata","AragvaDa","mAtA","sAraga","samudra","mAtf"),1))
{
	$text = antodAtta(1);
	storedata('Pi-2','sa',0);
}
/* nakSatrANAmabviSayANAm (19) */
if (ends($text,array("jyezWA","SravizWA","DanizWA","ASlezA","anurADA","ArdrA","citrA","maGA",),1))
{
	$text = AntodAtta(1);
	storedata('Pi-19','sa',0);
}
/* varNAnAM taNatinitAntAnAm (33) */
if (ends($text,array("hariRa","eta","rohita","lohita","harita","SoRa","pfSni","Siti","pfzat","harit","kfzRa","rohita"),1))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-33','sa',0);
}
/* zakunInAM ca laghu pUrvam (44) */
// The examples vary in phiTsUtra vRtti and laghusiddhAntakaumudI. Please have a look.
if ( ends($text,array("kukkuwa","tittiri"),2) )
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-44','sa',0);
}
/* zakunInAM ca laghu pUrvam (44) */
// This is according to phiTsUtra vRtti.
if ( ends($text,array("kfkavAku","kapota"),2) )
{
	storedata('Pi-24','pa',0);
	$text = laghAvante();
	storedata('Pi-44','sa',0);
}
/* nartuprANyAkyAyAm (45) */
if ( ends($text,array("vasanta","kfkalAsa"),2) )
{
	storedata('Pi-24','pa',0);
	$text = antodAtta(1);
	storedata('Pi-45','sa',0);
}
/* tRNadhAnyAnAM ca dvyaSAm (27) */
// For mAza, see https://github.com/drdhaval2785/SanskritAccent/issues/51
if (ends($text,array("kASa","kuSa","kunda","mAza","tila","mudga","kASA","kuSA","kundA","mAzA","tilA","mudgA",),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-27','sa',0);
}
/* dhAnyAnAM ca vRddhakSAntAnAm (46) */
if (ends($text,array("SyAmAka","mAza","SyAmAkA","mAzA"),1))
{
	storedata('Pi-24','pa',0);
	$text = laghAvante(); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-46','sa',0);
}
/* hayAdInAmasaMyuktalAntAnAmantaH pUrvaM vA (48) */
if (arr($text,'/['.pc('hy').']*['.pc('ac').'][l][a]$/'))
{
	storedata('Pi-24','pa',0);
	$text = AdyantyapUrvodAtta(); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-48','sa',0);
}
/* janapadazabdAnAmaSantAnAm (47) */
// aSantAnAm / aSAntAnAm seems to be an issue in grammar texts.
if (ends($text,$janapada,2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-47','sa',0);
}
/* gehArthAnAmastriyAm (3) */
// enumeration of other members pending.
if (ends($text,array("geha","gfha"),1) && $gender!=='f')
{
	$text = antodAtta(1);
	storedata('Pi-3','sa',0);
}
/* gehArthAnAmastriyAm (3) */
// astriyAm iti jJApakAt
if (ends($text,array("SAlA"),1))
{
	$text = AdyudAtta(1);
	storedata('Pi-3-1','sa',0);
}
/* zuklagaurayorAdiH (13) */
if (ends($text,array("Sukla","gOra"),1))
{
	$text = AdyantodAttavA(1);
	storedata('Pi-13','sa',0);
}
/* hrasvAntasya strIvizayasya (25) */
if (arr($text,'/[iu]$/') && $gender==='f' && $_GET['phit']==="14.1")
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-25','sa',0);
}
/* baMhizWavatsaratiSatTAntAnAm (7) */
if (ends($text,array("baMhizWa","vatsara","ti","Sat","Ta","TA"),1))
{
	$text = antodAtta(1);
	storedata('Pi-7','sa',0);
}
/* pItadrvarthAnAm (37) */
if (ends($text,array("pItadru","pItadAru","devadAru","BadradAru"),2)) // The list is taken from zAntanava's phiTsUtras 99999990290369 of DLI www.dli.gov.in. Also see 99999990293891 svarasiddhAntacandrikA of DLI.
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-37','sa',0);
}
/* grAmAdInAM ca (38) */
if (ends($text,array("grAma","soma","yAma","puruza","SUra","vfdDa",),2)) // AkRtigaNa.
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-38','sa',0);
}
/* rAjavizeSasya yamanvA cet (41) */
if (ends($text,array("ANga","sOhma"),2))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-41','sa',0);
}
/* nraH saGkhyAyAH (28) */
if (sub(array("paYcan","navan","daSan","catur","catuH","catuz","paYca","nava","daSa","catvAr"),blank(0),blank(0),0))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-28','sa',0);
}
/* prANinAM kupUrvam (30) */
if (arr($text,'/[aAiIuUfFxXeEoO][kKgGN][aA]$/') && ends($text,array("Suka","vfka","kAka","koka","baka","nakula","cawaka","cawakA"),1))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-30','sa',0);
}
/* unarvanantAnAm (32) */
if (ends($text,array("una","ruRa","f","van"),1))
{
	storedata('Pi-24','pa',0);
	$text = one(array("una","ruRa","f","van"),array("u^na","ru^Ra","f^","va^n"),0);
	storedata('Pi-32','sa',0);
}
/* igantAnAM ca dvyaSAm (49) */
if (arr($text,'/[iIuU]$/') && dvyac())
{
	storedata('Pi-24','pa',0);
	$text = antyapUrvodAtta();
	storedata('Pi-49','sa',0);
}
/* gudasya ca (4) */
if (ends($text,array("guda"),1))
{
	$text = antodAtta(1);
	storedata('Pi-4','sa',0);
}
/* dhyapUrvasya strIviSayasya (5) */
if ($_GET['phit']==='11.1' && arr($text,'/[Dy][A]/'))
{
	$text = antodAtta(1);
	storedata('Pi-5','sa',0);
}
/* chandasi ca (10) */
if ($veda==="1" && ends($text,array("dakziRa"),1) )
{
	$text = AdyantodAttavA(1);
	storedata('Pi-10','sa',0);
}
/* pRSThasya ca (15) */
if (ends($text,array("pfzWa"),1) && $veda==="1")
{
	$text = antodAtta(1);
	storedata('Pi-15','sa',0);
}
/* vA bhASAyAm (15-1) */
// Pending to verify the implication.
if (ends($text,array("pfzWa"),1) && $veda==="0")
{
	$text = AdyantodAttavA(1);
	storedata('Pi-15-1','sa',0);
}
/* yAntasyAntyAtpUrvam (62) */
if (ends($text,array("ya","yA"),1) )
{
	storedata('Pi-24','pa',0);
	storedata('Pi-50','pa',0);
	$text = antyAtpUrvodAtta(1);
	storedata('Pi-62','sa',0);
}
/* khAntasyAzmAdeH (6) */
if (arr($text,'/[K][aA]$/') && !arr($text,'/^[Sm]/'))
{
	$text = antodAtta(1);
	storedata('Pi-6','sa',0);
}
/* strIviSayavarNAkSupUrvANAm (43) */
if ( (arr($text,'/[AI]$/') && $_GET['phit']==="12.1" ) || ends($text,array("SyenI","hariRI","arArAkA","awAwAkA","kfkAwikA","pipIlikA","pippalikA"),2) || ends($text,array("akzu"),1))
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-43','sa',0);
}
/* laghAvante dvayozca bahvaSo guruH (42) */
if (arr($text,$pattern1)||arr($text,$pattern2)||twolaghuoneguru())
{
	storedata('Pi-24','pa',0);
	$text = laghAvante(); // svarasiddhAntacandrikA says that in case of more than one guru, all get optional udAttatva.
	storedata('Pi-42','sa',0);
}
/* nabviSayasyAnisantasya (26) */
if (!arr($text,'/is$/') && $gender==='n')
{
	storedata('Pi-24','pa',0);
	$text = AdyudAtta(1);
	storedata('Pi-26','sa',0);
}
/* phiSo'nta udAttaH (1) */
else
{
	$text = antodAtta(1);
	storedata('Pi-1','sa',0);	
}


/* Displaying the sUtras and sequential changes */
display_phiT();

/* End of Code */
?>