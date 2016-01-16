<?php
function metaaciklama($par)
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
function googlesitedogrulama($par)
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
function metasayfaozet($par)
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
function metayapimci($par)
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
function metaextra($par,$par2)
{
echo '
<meta name="'.$par.'" content="'.$par2.'" />
';
}
function metaview()
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
function metafacebook($title="" , $image="" , $url="" , $tur="" , $description="" , $author="" , $publisher="",$userid="")
{
	echo '
		<meta property="og:title" content="'.$title.'"/>
		<meta property="og:image" content="'.$image.'"/>
		<meta property="og:site_name" content="'.$title.'"/>
		<meta property="og:url" content="'.$url.'" />
		<meta property="og:type" content="'.$tur.'" />
		<meta property="og:description" content="'.$description.'"/>
		<meta property="article:author" content="'.$author.'" />
		<meta property="article:publisher" content="'.$publisher.'" />	
		<meta property="fb:admins" content="'.$userid.'"/>
	';
	
}
function javahata()
{
	echo '	  <script type="text/javascript">
	  window.onerror = function(a,b,c)
	  {
		  alert(a + " " + b + " " +c);
	  }
	  </script>';
}
function favicon($par="favicon.ico")
{
echo '
<link rel="icon" href="'.$par.'" type="image/x-icon" />
<link rel="shortcut icon" href="'.$par.'" type="image/x-icon" />
';
}
function konu_etiketler($etiketler){
	$bol = explode(",", $etiketler);
	$etikets = array();
	foreach ($bol as $etiket){
		$etiket = '<a href="'.URL.'/etiket/'.ss(trim($etiket)).'">'.ss(trim($etiket)).'</a>';
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

function git($par, $time = 0){
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
	<div style="margin: 10px 0; border: 1px solid #ddd; padding: 10px; color: #333">'.nl2br($mesaj).'</div>
	<div style="border-top: 1px solid #ddd; padding: 10px 0; font-style: oblique; color: #aaa">Tüm Hakları Saklıdır. &copy; 2012 - The HasCoding Team HasFonksiyon E-Posta Modulü</div>';
	if(mail(EPOSTA, $konu, $mesaj, $header)){
		return true;
	}else {
		return true;
	}
}	
?>
