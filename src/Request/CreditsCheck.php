<?php

namespace Ping4SMS\Request; 

use Ping4SMS\Request\CurlRequest;

class CreditsCheck {

    protected $method = 'GET';

    protected $api = '/creditapi';

    /**
     * Delivery Report.
     */
    public function creditsCheck(string $accountKey, string $route)
    {
        $params = $this->api."?key=$accountKey&route=$route";
        return (new CurlRequest)->request($params, $this->method);
    }

}
