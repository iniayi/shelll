<?php
require __DIR__ . '/vendor/autoload.php';

use Curl\Curl;

## EDIT REFFERAL CODE DISINI BOS ##
$refferalCode = '';
## EDIT REFFERAL CODE DISINI BOS ##

class Shell
{
    public function generateToken()
    {
        $curl = new Curl();
        $curl->setHeader('Host', 'apac2-api-gateway.capillarytech.com');
        $curl->setHeader('Accept', 'application/json');
        $curl->setHeader('Cap_authorization', 'eyJpZHYiOlsiTU9CSUxFfDYyODMxMzEwMjA1MDciXSwiZGV2IjoiZkpQVEtnRC1Rd1NwZnBqTVdYa002VyIsIm9yZyI6IlNIRUxMSU5ET05FU0lBTElWRSIsImFsZyI6IkhTMjU2In0.eyJ1aWQiOiI0ODY2MDM2IiwiaXNzIjoiQ0FQSUxMQVJZIFRFQ0hOT0xPR0lFUyIsImlzYyI6ImZhbHNlIiwib2djIjpbIjE1MTE5NXxwcm9kLnNoZWxsLnNvbHV0aW9ucyJdLCJleHAiOjE2NDA0MzEwOTgsImlhdCI6MTY0MDQyNzQ5OCwicm9sIjoiVVNFUiJ9.OGr23TiixfZ2XwPoGxsZ_ZxCht1SO4ZNNLymYmY4_Hs');
        $curl->setHeader('Cap_brand', 'SHELLINDONESIALIVE');
        $curl->setHeader('Cap_device_id', 'fJPTKgD-QwSpfpjMWXkM6W');
        $curl->setHeader('Cap_mobile', '6283131020507');
        $curl->setHeader('Content-Type', 'application/json; charset=UTF-8');
        $curl->setHeader('Accept-Encoding', 'gzip, deflate');
        $curl->setHeader('User-Agent', 'okhttp/3.14.9');
        $curl->setHeader('Connection', 'close');
        $curl->setOpt(CURLOPT_ENCODING, "");
        $curl->post('https://apac2-auth-api.capillarytech.com/auth/v1/token/regenerate', '{"brand":"SHELLINDONESIALIVE","deviceId":"fJPTKgD-QwSpfpjMWXkM6W","key":"eyJpZHYiOlsiTU9CSUxFfDYyODMxMzEwMjA1MDciXSwiZGV2IjoiZkpQVEtnRC1Rd1NwZnBqTVdYa002VyIsIm9yZyI6IlNIRUxMSU5ET05FU0lBTElWRSIsImFsZyI6IkhTMjU2In0.eyJ1aWQiOiI0ODY2MDM2IiwiaXNzIjoiQ0FQSUxMQVJZIFRFQ0hOT0xPR0lFUyIsImlhdCI6MTY0MDQyMjU1MSwicm9sIjoiQVVUSCJ9.4u_oQOQU19KN3-afOI80olt5A9RJ2n7h4wuD7Ahv9Ns","mobile":"6283131020507"}');

        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
            return $curl->response->auth->token;
        }
    }
    public function campaign($refferalCode, $telpNumber, $firstName, $lastName, $email, $token)
    {
        $curl = new Curl();
        $curl->setHeader('Host', 'apac2-api-gateway.capillarytech.com');
        $curl->setHeader('Accept', 'application/json');
        $curl->setHeader('Cap_authorization', $token);
        $curl->setHeader('Cap_brand', 'SHELLINDONESIALIVE');
        $curl->setHeader('Cap_device_id', 'fJPTKgD-QwSpfpjMWXkM6W');
        $curl->setHeader('Cap_mobile', '6283131020507');
        $curl->setHeader('Content-Type', 'application/json; charset=UTF-8');
        $curl->setHeader('Accept-Encoding', 'gzip, deflate');
        $curl->setHeader('User-Agent', 'okhttp/3.14.9');
        $curl->setHeader('Connection', 'close');
        $curl->setOpt(CURLOPT_ENCODING, "");
        $curl->post('https://apac2-api-gateway.capillarytech.com/mobile/v2/api/v2/customers', '{"extendedFields":{"acquisition_channel":"mobileApp","dob":"1998/05/02","verification_status":"false"},"loyaltyInfo":{"loyaltyType":"loyalty"},"profiles":[{"fields":{"onboarding":"pending","app_privacy_policy":"1","goplus_tnc":"1"},"firstName":"' . $firstName .  '","identifiers":[{"type":"mobile","value":"' . $telpNumber .  '"},{"type":"email","value":"' . $email .  '"}],"lastName":"' . $lastName .  '"}],"referralCode":"' . $refferalCode .  '","statusLabel":"Active","statusLabelReason":"App Registration"}');

        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
            return $curl->response;
        }
    }

    public function getName()
    {
        $curl = new Curl();

        $curl->get('https://api.warifp.co/v1/name-generator');

        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
            return $curl->response->data->name;
        }
    }
}

$shell = new Shell;

while (-1) {
    // initial
    $firstName = $shell->getName();
    $lastName = $shell->getName();
    $email = strtolower($firstName . $lastName) . rand(111, 333) . '@gmail.com';

    $data = $shell->campaign($refferalCode, '6283' . rand(111111111, 999999999), $firstName, $lastName, $email, $shell->generateToken());

    echo '[+] ID: ' . $data->createdId . ' | First Name: ' . $firstName . ' | Last Name: ' . $lastName . ' | Email: ' . $email . "\n";
}
