<?php
    $inputVorname = isset($_POST['inputVorname']) ? $_POST['inputVorname'] : null;
    $inputName = isset($_POST['inputName']) ? $_POST['inputName'] : null;
    $inputEmail = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : null;
    $inputDevices = isset($_POST['inputDevices']) ? $_POST['inputDevices'] : null;
    $inputDate = isset($_POST['inputDate']) ? $_POST['inputDate'] : null;
    $sigType = isset($_POST['sigType']) ? $_POST['sigType'] : null;
    $sigData = isset($_POST['sigData']) ? $_POST['sigData'] : null;
    $from = 'From: APS digital'; 
    $to = 'florian.bruehlmann@fhnw.ch'; 
    $subject = 'iPad ausgeliehen';
    $body = "From: $inputName\n E-Mail: $inputEmail\n Message:\n $inputDevices";

    //$line = implode(",", $inputVorname, $inputName, $inputEmail, $inputDevices, $inputDate, $sigType, $sigData);
    $line = "test,test2";
    $handle = fopen("test.csv", "a");
    fputcsv($handle, $line); # $line is an array of string values here
    fclose($handle);


  // Create a constant to store your Slack URL
  define('SLACK_WEBHOOK', 'https://prod-20.westeurope.logic.azure.com:443/workflows/f8a68b50c7224c378d31e00a38176534/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=02G5cXy1BAYHQezUr7RZO07qEQyAepHk5XBFApIYmO4');
  // Make your message
  $message = array('payload' => json_encode(array('text' => 'My Message')));
//   $message = array('payload' => '{
//   "type": "section",
//   "text": {
//     "type": "mrkdwn",
//     "text": "A message *with some bold text* and _some italicized text_."
//   }
// }');
  // Use curl to send your message
  $c = curl_init(SLACK_WEBHOOK);
  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($c, CURLOPT_POST, true);
  curl_setopt($c, CURLOPT_POSTFIELDS, $message);
  curl_exec($c);
  curl_close($c);


echo $message;
?>