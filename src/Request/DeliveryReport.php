<?php

namespace Ping4SMS\Request; 

use Ping4SMS\Request\CurlRequest;

class DeliveryReport {

    protected $method = 'GET';

    protected $api = '/dlrapi';

    /**
     * Delivery Report.
     */
    public function deliveryReport(string $accountKey, string $deliveryId)
    {
        $params = $this->api . "?key=$accountKey&messageid=$deliveryId";
        return (new CurlRequest)->request($params, $this->method);
    }

}
