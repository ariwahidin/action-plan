<?php


$tokenwa =  '0oRsneuFyIth7u7JLNTpNnXiPeTO4xrE-jauhari';
$device = "jo2";


function apiKirimWaRequest(array $params) {
  global $tokenwa,$device;
  
    $httpStreamOptions = [
      'method' => $params['method'] ?? 'GET',
      'header' => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $tokenwa
      ],
      'timeout' => 15,
      'ignore_errors' => true
    ];

    if ($httpStreamOptions['method'] === 'POST') {
      $httpStreamOptions['header'][] = sprintf('Content-Length: %d', strlen($params['payload'] ?? ''));
      $httpStreamOptions['content'] = $params['payload'];
    }
  
    // Join the headers using CRLF
    $httpStreamOptions['header'] = implode("\r\n", $httpStreamOptions['header']) . "\r\n";
  
    $stream = stream_context_create(['http' => $httpStreamOptions]);
    $response = file_get_contents($params['url'], false, $stream);
    $httpStatus = $http_response_header[0];
  
    preg_match('#HTTP/[\d\.]+\s(\d{3})#i', $httpStatus, $matches);
  
    if (! isset($matches[1])) {
      throw new Exception('Can not fetch HTTP response header.');
    }
  
    $statusCode = (int)$matches[1];
    if ($statusCode >= 200 && $statusCode < 300) {
      return ['body' => $response, 'statusCode' => $statusCode, 'headers' => $http_response_header];
    }
  
    throw new Exception($response, $statusCode);
}


function devicewa(){
    global $tokenwa,$device;
    try {
      $reqParams = [
        'token' => $tokenwa,
        'url' => 'https://api.kirimwa.id/v1/devices'
      ];
    
      $response = apiKirimWaRequest($reqParams);
      echo $response['body'];
    } catch (Exception $e) {
      print_r($e);
    }
}

function deletedevicewa(){
  try {
    global $tokenwa,$device;
    $reqParams = [
      'token' => $tokenwa,
      'url' => sprintf('https://api.kirimwa.id/v1/devices/%s', $device),
      'method' => 'DELETE'
    ];
  
    $response = apiKirimWaRequest($reqParams);
    echo $response['body'];
  } catch (Exception $e) {
    print_r($e);
  }
}
 
function qrwa(){
  try {
    global $tokenwa,$device;
    $query = http_build_query(['device_id' => $device]);
    $reqParams = [
      'token' => $tokenwa,
      'url' => sprintf('https://api.kirimwa.id/v1/qr?%s', $query)
    ];
  
    $response = apiKirimWaRequest($reqParams);
    return  json_decode($response['body'])->image_url;
  } catch (Exception $e) {
    print_r($e);
  }
}

function redaftarwa(){
  
  global $tokenwa,$device;
  deletedevicewa();
  try {
    $reqParams = [
      'token' => $tokenwa,
      'url' => 'https://api.kirimwa.id/v1/devices',
      'method' => 'POST',
      'payload' => json_encode([
        'device_id' => $device
      ])
    ];
  
    $response = apiKirimWaRequest($reqParams);
    echo $response['body'];
  } catch (Exception $e) {
    print_r($e);
  }
}

function reconekwa(){
  try {
    
    global $tokenwa,$device;
    $reqParams = [
      'token' => $tokenwa,
      'url' => 'https://api.kirimwa.id/v1/reconnect',
      'method' => 'POST',
      'payload' => json_encode([
        'device_id' => $device
      ])
    ];
  
    $response = apiKirimWaRequest($reqParams);
    echo $response['body'];
  } catch (Exception $e) {
    print_r($e);
  }
}

function kirimpesanwa($no=null, $pesan=null){
  try {
    $pesan = ($pesan) ?? ($_POST['pesan'] ?? "Hallo Jo Ganteng"); 
    $no = ($no) ?? ($_POST['no'] ?? "628118881895");
    global $tokenwa,$device;
    $reqParams = [
      'token' => $tokenwa,
      'url' => 'https://api.kirimwa.id/v1/messages',
      'method' => 'POST',
      'payload' => json_encode([
        'message' => $pesan,
        'phone_number' => $no,
        'message_type' => 'text',
        'device_id' => $device
      ])
    ];
  
    $response = apiKirimWaRequest($reqParams);
    echo $response['body'];
  } catch (Exception $e) {
    print_r($e);
  }
}

function cekpesanwa(){
  try {
    $id = $_REQUEST['id'] ?? "kwid-29dea8d52d3547f682f6c355622";
    global $tokenwa,$device;
    $reqParams = [
      'token' => $tokenwa,
      'url' => sprintf('https://api.kirimwa.id/v1/messages/%s', $id)
    ];
  
    $response = apiKirimWaRequest($reqParams);
    echo json_encode($response['body']);
  } catch (Exception $e) {
    print_r($e);
  }
}

function testinboxwa(){
  try {
    global $tokenwa,$device;
    $query = http_build_query([
      'device_id' => $device
    ]);
    $reqParams = [
      'token' => $tokenwa,
      'url' => sprintf('https://api.kirimwa.id/v1/incoming-messages?%s', $query)
    ];
  
    $response = apiKirimWaRequest($reqParams);
    echo $response['body'];
  } catch (Exception $e) {
    print_r($e);
  }
}

function req($tujuan = null){
  if (function_exists($tujuan)) {
    return  call_user_func($tujuan);
  }
}


$p = $_GET['p'] ?? "device";
echo req($p);
exit;
