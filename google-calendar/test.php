<?php

$arrEncode = json_encode(array('attendees' => array(
    array('email' => 'ngthaoanh2011@gmail.com'),
    array('email' => 'nghoquochuy0902@gmail.com'),
)));

// $arrDecode = json_decode($arrEncode['attendees'][0], true);

$text = "d,abc";

$attendees = explode(',', $text);
$curlPost['attendees'] = array();
foreach ($attendees as $key => $value) {
    $curlPost['attendees'][$key] = array('email' => $value);
}
echo $arrEncode;
echo "     ";
echo json_encode($curlPost);
