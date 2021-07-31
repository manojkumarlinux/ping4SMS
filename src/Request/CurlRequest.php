<?php

namespace Ping4SMS\Request;

use Ping4SMS\Response\SendResponse;

class CurlRequest {

    public $API_URL = 'http://site.ping4sms.com/api';

    /**
     * Curl Request.
     */
    public function request(string $params, string $method = 'GET')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API_URL.$params);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
