<?php 


$data = file_get_contents('https://data.gov.in/node/328681/datastore/export/json');
$json_arr = json_decode($data, true);

echo $json_arr['data'][0][0]."hii";
$ymd = DateTime::createFromFormat('d-m-Y', $json_arr['data'][0][0])->format('Y');
echo "string".$ymd;


$data1 = file_get_contents('newdata.json');
$json_arr1 = json_decode($data1, true);
$json_arr1['data'][0][0]=$ymd;
$json_arr1['data'][0][1]='hii';
$json_arr1['data'][0][2]='hii2';

  foreach ($json_arr['data'] as $key => $value)

   {
   	echo date('z', strtotime('21 oct 2012'));
$y=DateTime::createFromFormat('d-m-Y', $json_arr['data'][$key][0])->format('y');
$m=DateTime::createFromFormat('d-m-Y', $json_arr['data'][$key][0])->format('m');
$y=DateTime::createFromFormat('d-m-Y', $json_arr['data'][$key][0])->format('d');
$json_arr1['data'][$key][0]=DateTime::createFromFormat('d-m-Y', $json_arr['data'][$key][0])->format('y');
$json_arr1['data'][$key][1]=DateTime::createFromFormat('d-m-Y', $json_arr['data'][$key][0])->format('m');
$json_arr1['data'][$key][2]=DateTime::createFromFormat('d-m-Y', $json_arr['data'][$key][0])->format('d');
$json_arr1['data'][$key][3]=$json_arr['data'][$key][3];

  }
  file_put_contents('newdata.json', json_encode($json_arr1));
  
?>
