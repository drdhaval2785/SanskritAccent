<?php 
// including function.php for arrays and functions.
include "function.php";
// including slp-dev.php for SLP1->devanAgarI conversion for display on front end.
include "slp-dev.php";
// including dev-slp.php for devanAgarI->SLP1 conversion to process data entered in Devanagari.
include "dev-slp.php";
error_reporting(0);

//post element
$word = $_POST['first'];
$tran = $_POST['tran'];
$lakAra= $_POST['lakAra'];
$sanAdi = $_POST['sanAdi'];
$us = $_POST['upasarga'];

// IAST and devanagari handling
// Code for converting from IAST to SLP
$iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ",); // IAST letters
$slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z",); // SLP1 letters
  if (preg_match('/[āĀīĪūŪṛṚṝṜḷḶḹḸṃṂḥḤṭṬḍḌṅṄñÑṇṆśŚṣṢV]/',$word)) // If there is any IAST specific characters, we convert IAST->SLP1.
{
    $word = str_replace($iast,$slp,$word);
}
if ($tran === "IAST") // If user selects IAST transliteration, we convert IAST->SLP1.
{
     $word = str_replace($iast,$slp,$word);
}
// Devanagari handling. This is innocuous. Therefore even running without the selection in dropdown menu. 
$word = json_encode($word); 
$word = str_replace("\u200d","",$word); // removing whitespace.
$word = str_replace("\u200c","",$word); // removing whitespace.
$word = json_decode($word);
$word = convert1($word); // convert devangari to SLP1.

// usable variables
$arrWord[] = $word; // creating an array $arrWord with first member as $word.
$pancan=array("paYcan","saptan","zwan","navan","daSan"); // array of paJcan words.
$last = substr($word, -1);    // returns "last letter"
$last_4 = substr($word, -4);    // returns "last 4 letters"
$last_5 = substr($word, -5); // returns "last 5 letters"
$html = ''; // output is $html. If nothing applies, default it ''.

if ($word==="")
{
echo "<font color='red' size='2'>Enter the verb</font>\n";
exit;
}
/* A note on the cond variables. */
// The values of cond variables is mentioned in ajax requirements.doc. e.g. value="1" name="cond1_1_1" would correspond to 1.1.1.1 of ajax requirements. similarly, value="1" name="cond1_1_1_5"  would correspond to 1.1.1.5.1. 
// Please check ajax requirements.doc to know what this ajax output stands for. 
// ajax requirements.doc is created for user feedback, where according to SK, it is not possible for machine to decide what is the intention of the user.

/* main coding part */
if(ends($arrWord,array("akza"),2))
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="9.1" name="phit" > देवने ';
	$html .= '<input required type="radio" value="9.2" name="phit" > अदेवने ';
	$html .= '</div>';
}
if(arr($arrWord,'/^([^aAiIuUfFxXeEoO]*)[aiu]/') && arr($arrWord,'/[aiufx]([^aAiIuUfFxXeEoO]*)$/') )
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="8.1" name="phit" > ताच्छील्ये ';
	$html .= '<input required type="radio" value="8.2" name="phit" > अन्य ';
	$html .= '</div>';
}
if(ends($arrWord,array("dakziRa"),1))
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="1.1" name="phit" > साधुत्ववाचि ';
	$html .= '<input required type="radio" value="1.2" name="phit" > स्वाङ्गवाचि ';
	$html .= '<input required type="radio" value="1.3" name="phit" > अन्य ';
	$html .= '</div>';
}
if(ends($arrWord,array("kfzRa"),1))
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="2.1" name="phit" > मृगाख्या ';
	$html .= '<input required type="radio" value="2.2" name="phit" > नामवाचि ';
	$html .= '<input required type="radio" value="2.3" name="phit" > अन्य ';
	$html .= '</div>';
}
if(ends($arrWord,array("arjuna"),1))
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="3.1" name="phit" > तृणाख्या ';
	$html .= '<input required type="radio" value="3.2" name="phit" > अन्य ';
	$html .= '</div>';
}
if(ends($arrWord,array("Arya"),1))
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="4.1" name="phit" > स्वाम्याख्या ';
	$html .= '<input required type="radio" value="4.2" name="phit" > अन्य ';
	$html .= '</div>';
}
if(ends($arrWord,array("ASA"),1))
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="5.1" name="phit" > दिगाख्या ';
	$html .= '<input required type="radio" value="5.2" name="phit" > अदिगाख्या ';
	$html .= '</div>';
}
if(ends($arrWord,array("jyezWa","kanizWa"),1))
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="6.1" name="phit" > वयसि ';
	$html .= '<input required type="radio" value="6.2" name="phit" > अन्य ';
	$html .= '</div>';
}
if(arr($arrWord,'/[uU][KPCWTcwtkp]/') )
{		
	$html .= '<div id="step11">';
	$html .= '<input required type="radio" value="7.1" name="phit" > कृत्रिमाख्या ';
	$html .= '<input required type="radio" value="7.2" name="phit" > अन्य ';
	$html .= '</div>';
}
	


//display the output
$html = trim($html);
$html .= '<font color="red" size="2">You can submit your query after selecting proper option.</font>';            
echo $html;
exit;
?>