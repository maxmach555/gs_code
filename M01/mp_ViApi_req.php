<?php
// 卒開：松井さんPJ
// mp_ViApi_req.php
//  ・Video Indexerの動画アップリクエスト
//  ・

$upfilemovfilename = $_GET["ViUpFilename"];
// var_dump($jsonfile); 

//JSONファイル指定解析
// $jsonfilename = './json/nega_04.json';
echo 'ViUpFilename:',$upfilemovfilename,' ';



// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://api.videoindexer.ai/{location}/Accounts/{accountId}/Videos?accessToken={accessToken}&name={name}');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Content-Type' => 'multipart/form-data',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'description' => '{string}',
    'partition' => '{string}',
    'externalId' => '{string}',
    'callbackUrl' => '{string}',
    'metadata' => '{string}',
    'language' => '{string}',
    'videoUrl' => '{string}',
    'fileName' => '{string}',
    'indexingPreset' => '{string}',
    'streamingPreset' => 'Default',
    'linguisticModelId' => '{string}',
    'privacy' => '{string}',
    'externalUrl' => '{string}',
    'assetId' => '{string}',
    'priority' => '{string}',
    'personModelId' => '{string}',
    'brandsCategories' => '{string}',
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>
