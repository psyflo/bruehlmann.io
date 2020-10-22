<?php
ini_set('display_errors', 1);
error_reporting(~0);
//header('Content-Type: application/json');
$url="https://www.srf.ch/meteo/lokalprognose/ort/basel?id=417187321"; 
define('SLACK_WEBHOOK', 'https://hooks.slack.com/services/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');
include('simple_html_dom.php');

$ch = curl_init();
$timeout = 5; // set to zero for no timeout
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
$file_contents = curl_exec($ch);

curl_close($ch);



$html = str_get_html($file_contents);
$elem = $html->find('div[class=day-forecast-max]', 0)->plaintext; //:first tbody tr:first td:last
//$elem = $html->find('table tr', 1)->find('td', 2)->plaintext; //:first tbody tr:first td:last
//$elem2 = (string)$html->find('table th', 3)->plaintext;
//$elem3 = str_replace("Temperatur", "", $elem2); 
//$elem4 = trim(str_replace("°C", "", $elem3));
$elem_rain = trim($html->find('li[class=day-forecast]', 6)->find('div[class=info-box]', 1)->plaintext);
//$len = strlen($elem_rain)-5;
//$elem_rain2 = trim(substr((string)$elem_rain, 19, $len)); 
$elem_rain2 = (int) filter_var($elem_rain, FILTER_SANITIZE_NUMBER_INT);

$elem2 =  trim(substr((string)$elem, 0, 11));
//$elem_rain2 = 50;

//$json = '{"response_type":"in_channel", "text": ":thumbsup: De Rhyy esch *'.$elem.'°C* warm! :swimmer: gmässe am '.$elem4.'"}';
//$json2 = '{"response_type":"in_channel", "text": ":thumbsdown: De Rhyy esch *'.$elem.'°C* kalt! :snowflake: gmässe am '.$elem4.'"}';


if ((int)$elem_rain2 > 40) {
	$text =  "<!channel> Schirm ipagge! :umbrella_with_rain_drops: ".$elem_rain2." % Wahrschinlechkeit";
        $message = array('payload' => json_encode(array('text' => $text)));
  // Use curl to send your message
  $c = curl_init(SLACK_WEBHOOK);
  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($c, CURLOPT_POST, true);
  curl_setopt($c, CURLOPT_POSTFIELDS, $message);
  curl_exec($c);
  curl_close($c);
} else {

}


if ((float)$elem2 > 27) {
	$text =  "<!channel> Legg hyt korzi Hose a, s'wirt waarm! :sunny: ".$elem2."°C";
	$message = array('payload' => json_encode(array('text' => $text)));
  // Use curl to send your message
  $c = curl_init(SLACK_WEBHOOK);
  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($c, CURLOPT_POST, true);
  curl_setopt($c, CURLOPT_POSTFIELDS, $message);
  curl_exec($c);
  curl_close($c);
} else {

}

//if((float)$elem > 15) {
//        echo $json;  
//} else {
//        echo $json2;
//}



//echo ":thumbsup: De Rhyy esch *".$elem."°C* warm! :swimmer: (gmässe am ".$elem4.")";


//ini_set('display_errors', 1);
//$url="http://www.hydrodaten.admin.ch/de/2091.html"; 

//include('simple_html_dom.php');

//$ch = curl_init();
//$timeout = 5; // set to zero for no timeout
//curl_setopt ($ch, CURLOPT_URL, $url);
//curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
//$file_contents = curl_exec($ch);

//curl_close($ch);



//$html = str_get_html($file_contents);
//$elem = $html->find('div.day-forecast-max', 1)->plaintext; //:first tbody tr:first td:last
//$elem = $html->find('table tr', 1)->find('td', 2)->plaintext; //:first tbody tr:first td:last
//$elem2 = (string)$html->find('table th', 3)->plaintext;
//$elem3 = str_re

//$json = '{"response_type":"in_channel", "text": ":thumbsup: De Rhyy esch *'.$elem.'°C* warm! :swimmer: gmässe am '.$elem4.'"}';
//$json2 = '{"response_type":"in_channel", "text": ":thumbsdown: De Rhyy esch *'.$elem.'°C* kalt! :snowflake: gmässe am '.$elem4.'"}';

//if((float)$elem > 15) {
//        echo $json;  
//} else {
//        echo $json2;
//}



//echo ":thumbsup: De Rhyy esch *".$elem."°C* warm! :swimmer: (gmässe am ".$elem4.")";
 // Create a constant to store your Slack URL
  //define('SLACK_WEBHOOK', 'https://hooks.slack.com/services/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');
  // Make your message
  //$message = array('payload' => json_encode(array('text' => 'My Message')));
  // Use curl to send your message
  //$c = curl_init(SLACK_WEBHOOK);
  //curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
  //curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($c, CURLOPT_POST, true);
  //curl_setopt($c, CURLOPT_POSTFIELDS, $message);
  //curl_exec($c);
  //curl_close($c);
?>
