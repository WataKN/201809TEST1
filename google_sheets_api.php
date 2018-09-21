<?php


require __DIR__ . '/vendor/autoload.php';
require_once(dirname(__FILE__) . '/config.php');

putenv('GOOGLE_APPLICATION_CREDENTIALS='.dirname(__FILE__).'/');
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_Sheets::SPREADSHEETS);
$client->setApplicationName('test');

$service = new Google_Service_Sheets($client);





// A1:D5 の範囲を取得
$response = $service->spreadsheets_values->get(SPREADSHEET_ID, 'シート1!A1:E6');
foreach ($response->getValues() as $index => $cols) {
    echo sprintf('#%d >> "%s"', $index+1, implode('", "', $cols)).PHP_EOL;
}





?>
