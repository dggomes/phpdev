<?php 
$josemourinho = 'ladygaga';
$getData = 'followers_count'; 
$xml = file_get_contents('http://twitter.com/users/show.xml?screen_name=' . $josemourinho);
if(preg_match('/' . $getData . '>(.*)</', $xml, $mourinhomatch) !=0)

echo $$mourinhomatch."<br>";
echo  "Mourinho = ".$mourinhomatch[1]."<br>";

$bebe = '33_bebe';
$getData = 'followers_count';
$xml = file_get_contents('http://twitter.com/users/show.xml?screen_name=' . $bebe);
if(preg_match('/' . $getData . '>(.*)</', $xml, $bebematch) !=0)
echo  "Bebe = ".$bebematch[1]."<br>";


$jude = 'judehlaw';
$getData = 'followers_count';
$xml = file_get_contents('http://twitter.com/users/show.xml?screen_name=' . $jude);
if(preg_match('/' . $getData . '>(.*)</', $xml, $judematch) !=0)
echo  "Jude = ".$judematch[1]."<br>";


$mcmahon = 'julianrmcmahon';
$getData = 'followers_count';
$xml = file_get_contents('http://twitter.com/users/show.xml?screen_name=' . $mcmahon);
if(preg_match('/' . $getData . '>(.*)</', $xml, $julianmatch) !=0)
echo  "Julian = ".$julianmatch[1]."<br>";


$moss = 'katehmoss';
$getData = 'followers_count';
$xml = file_get_contents('http://twitter.com/users/show.xml?screen_name=' . $moss);
if(preg_match('/' . $getData . '>(.*)</', $xml, $katematch) !=0)
echo  "Kate = ".$katematch[1]."<br>";

$soma = $mourinhomatch[1] + $bebematch[1] + $judematch[1] + $julianmatch[1] + $katematch[1];

echo "Soma = ".$soma;
?>
