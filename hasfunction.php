<?php

/*
Bu dosya Hasan ERYILMAZ Tarafında Oluşturulmuştur...

*/


function metaaciklama($par)
{
echo '
<meta  name="description" content="'.$par.'"/>
';
}

function curlconnect($url)
{
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
	$cikti = curl_exec($curl);
	curl_close($curl);
	return str_replace(array("\n","\t","\r"),null,$cikti);
	
}

function curlbaglanti($url)
{
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
	$cikti = curl_exec($curl);
	curl_close($curl);
	return str_replace(array("\n","\t","\r"),null,$cikti);
	
}

function metadesc($par)
{
echo '
<meta  name="description" content="'.$par.'"/>
';
}
function metaanahtar($par)
{
echo '
<meta name="keywords" content="'.$par.'" />
';
}
function metakeyword($par)
{
echo '
<meta name="keywords" content="'.$par.'" />
';
}
function googlesitedogrulama($par)
{
echo '
<meta name="google-site-verification" content="'.$par.'" />
';
}
function googleverified($par)
{
echo '
<meta name="google-site-verification" content="'.$par.'" />
';
}
function metayazar($par)
{
echo '
<meta name="author" content="'.$par.'" />
';
}
function metaauthor($par)
{
echo '
<meta name="author" content="'.$par.'" />
';
}
function metasayfaozet($par)
{
echo '
<meta name="abstract" content="'.$par.'" />
';
}
function metapagesummary($par)
{
echo '
<meta name="abstract" content="'.$par.'" />
';
}
function metatelif($par)
{
echo '
<meta name="copyright" content="'.$par.'" />
';
}
function metacopyright($par)
{
echo '
<meta name="copyright" content="'.$par.'" />
';
}
function metayapimci($par)
{
echo '
<meta name="designer" content="'.$par.'" />
';
}
function metadesigner($par)
{
echo '
<meta name="designer" content="'.$par.'" />
';
}
function metayonlerdir($par2,$par=0)
{
echo '
<meta name="refresh" content="'.$par.';'.$par2.'" />
';
}
function metarefresh($par2,$par=0)
{
echo '
<meta name="refresh" content="'.$par.';'.$par2.'" />
';
}
function metaextra($par,$par2)
{
echo '
<meta name="'.$par.'" content="'.$par2.'" />
';
}
function metaviewport()
{
echo '
<meta name="viewport" content="width=device-width, initial-scale=1.0">
';
}
function metakarakterset($par="yeni",$par2="utf-8")
{
	if($par=="eski")
	{
	echo '
<meta http-equiv="Content-type" content="text/html; charset='.$par2.'" />
	';
	}elseif($par=="yeni")
	{
		
	echo '
<meta charset="'.$par2.'">
	';
	}
	
}
function metacharset($par="yeni",$par2="utf-8")
{
	if($par=="eski")
	{
	echo '
<meta http-equiv="Content-type" content="text/html; charset='.$par2.'" />
	';
	}elseif($par=="yeni")
	{
		
	echo '
<meta charset="'.$par2.'">
	';
	}
	
}
function favicon($par="favicon.ico")
{
echo '
<link rel="icon" href="'.$par.'" type="image/x-icon" />
<link rel="shortcut icon" href="'.$par.'" type="image/x-icon" />
';
}
function linkrel($par2,$par="stylesheet",$par3="text/css",$par4="all",$par5=null)
{
echo '
<link rel="'.$par.'" href="'.$par2.'" type="'.$par3.'" media="'.$par4.'" id="'.$par5.'" />
';	
}
function etiketler($etiketler){
	$bol = explode(",", $etiketler);
	$etikets = array();
	foreach ($bol as $etiket){
		$etiket = '<a href="'.URL.'/etiket/'.ss(trim($etiket)).'">'.ss(trim($etiket)).'</a>';
		array_push($etikets, $etiket);
	}
	echo implode(",", $etikets);
}
function tags($etiketler){
	$bol = explode(",", $etiketler);
	$etikets = array();
	foreach ($bol as $etiket){
		$etiket = '<a href="'.URL.'/tag/'.ss(trim($etiket)).'">'.ss(trim($etiket)).'</a>';
		array_push($etikets, $etiket);
	}
	echo implode(",", $etikets);
}
function klasor_listele($dizin){
	$dizinAc = opendir($dizin) or die ("Dizin Bulunamadı!");
	while ($dosya = readdir($dizinAc)){
		if (is_dir($dizin."/".$dosya) && $dosya != '.' && $dosya != '..'){
			echo "<option ";
			echo $dosya == TEMA_DIR ? 'selected' : null;
			echo " value='{$dosya}'>{$dosya}</option>";
		}
	}
}
function folder_lists($dizin){
	$dizinAc = opendir($dizin) or die ("Directory does not exist!");
	while ($dosya = readdir($dizinAc)){
		if (is_dir($dizin."/".$dosya) && $dosya != '.' && $dosya != '..'){
			echo "<option ";
			echo $dosya == TEMA_DIR ? 'selected' : null;
			echo " value='{$dosya}'>{$dosya}</option>";
		}
	}
}
function post($par, $st = false){
		if ($st){
			return htmlspecialchars(addslashes(trim($_POST[$par])));
		}else {
			return addslashes(trim($_POST[$par]));
		}
}

function get($par){
	return strip_tags(trim(addslashes($_GET[$par])));
}

function kisalt($par, $uzunluk = 50){
	if (strlen($par) > $uzunluk){
		$par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";
	}
	return $par;
}
function shorten($par, $uzunluk = 50){
	if (strlen($par) > $uzunluk){
		$par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";
	}
	return $par;
}

function git($par, $time = 0){
	if ($time == 0){
		header("Location: {$par}");
	}else {
		header("Refresh: {$time}; url={$par}");
	}
}
function go($par, $time = 0){
	if ($time == 0){
		header("Location: {$par}");
	}else {
		header("Refresh: {$time}; url={$par}");
	}
}

function session($par){
	if ($_SESSION[$par]){
		return $_SESSION[$par];
	}else {
		return false;
	}
}

function cookie($par){
	if ($_COOKIE[$par]){
		return $_COOKIE[$par];
	}else {
		return false;
	}
}

function ss($par){
	return stripslashes($par);
}

function session_olustur($par){
	foreach ($par as $anahtar => $deger){
		$_SESSION[$anahtar] = $deger;
	}
}
function session_create($par){
	foreach ($par as $anahtar => $deger){
		$_SESSION[$anahtar] = $deger;
	}
}

function sef_link($baslik){
	$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
	$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
	$perma = strtolower(str_replace($bul, $yap, $baslik));
	$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
	$perma = trim(preg_replace('/\s+/',' ', $perma));
	$perma = str_replace(' ', '-', $perma);
	return $perma;
}
function eposta ($adsoyad, $eposta, $konu, $mesaj){
	$header = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: {$adsoyad} <{$eposta}>\r\n";
	$header .= "Reply-To: {$adsoyad} <{$eposta}>\r\n";
	$mesaj = '<div style="padding: 10px; font-size: 17px; font-weight: bold">'.$konu.'</div>
	<div style="margin: 10px 0; border: 1px solid #ddd; padding: 10px; color: #333">'.nl2br($mesaj).'</div>';
	if(mail(EPOSTA, $konu, $mesaj, $header)){
		return true;
	}else {
		return true;
	}
}

function email ($adsoyad, $eposta, $konu, $mesaj){
	$header = "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8\r\n";
	$header .= "From: {$adsoyad} <{$eposta}>\r\n";
	$header .= "Reply-To: {$adsoyad} <{$eposta}>\r\n";
	$mesaj = '<div style="padding: 10px; font-size: 17px; font-weight: bold">'.$konu.'</div>
	<div style="margin: 10px 0; border: 1px solid #ddd; padding: 10px; color: #333">'.nl2br($mesaj).'</div>';
	if(mail(EPOSTA, $konu, $mesaj, $header)){
		return true;
	}else {
		return true;
	}
}	
?>
