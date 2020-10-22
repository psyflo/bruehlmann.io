<?php
ini_set('display_errors', 1);
error_reporting(~0);
header('Content-Type: application/json');
$url="http://www.hydrodaten.admin.ch/de/2091.html"; 

include('simple_html_dom.php');

$ch = curl_init();
$timeout = 5; // set to zero for no timeout
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
$file_contents = curl_exec($ch);

curl_close($ch);



$html = str_get_html($file_contents);
$elem = $html->find('table tr', 1)->find('td', 2)->plaintext; //:first tbody tr:first td:last
$elem2 = (string)$html->find('table th', 3)->plaintext;
$elem3 = str_replace("Temperatur", "", $elem2); 
$elem4 = trim(str_replace("°C", "", $elem3));

//echo $elem;

$json = '{"response_type":"in_channel", "text": ":thumbsup: De Rhyy esch *'.$elem.'°C* warm! :swimmer: gmässe am '.$elem4.'"}';
$json2 = '{"response_type":"in_channel", "text": ":thumbsdown: De Rhyy esch *'.$elem.'°C* kalt! :snowflake: gmässe am '.$elem4.'"}';

if((float)$elem > 15) {
        echo $json;  
} else {
        echo $json2;
}



//echo ":thumbsup: De Rhyy esch *".$elem."°C* warm! :swimmer: (gmässe am ".$elem4.")";

?>
