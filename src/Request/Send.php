<?php

namespace Ping4SMS\Request; 

use Ping4SMS\Request\CurlRequest;

class Send {

    protected $method = 'GET';

    protected $api = '/smsapi';

    /**
     * Send Message.
     */
    public function send(string $accountKey, string $senderId, int $number, int $route, string $message, string $templateId)
    {
        $params = $this->api."?key=$accountKey&route=$route&sender=$senderId&number=$number&sms=".urlencode($message)."&templateid=$templateId";
        return (new CurlRequest)->request($params, $this->method);
    }

}
