<?php 

namespace Ping4SMS;

use Ping4SMS\Request\Send;
use Ping4SMS\Request\DeliveryReport;
use Ping4SMS\Request\CreditsCheck;
use Ping4SMS\Response\SendResponse;

class Ping4SMS
{
    /**
     * response 
     */
    protected $response = NULL;

    /**
     * @var string
     * Your account API key.
     */
    protected $accountKey;

    /**
     * @var string 
     * Sender id.
     */
    protected $senderId;


    /**
     * @var integer 
     * Destination number.
     */
    protected $number;

    /**
     * @var string
     * Route you want to send SMS.
     * Promotional - 1, 
     * Transactional - 2, 
     * Optin - 3, 
     * Trans OTP - 4, 
     * Promo DND - 5, 
     * Whatsapp - 6.
     */
    protected $route = 1;

    /**
     * @var string 
     * SMS content (Url encoded).
     */
    protected $message;

    /**
     * @var string 
     * DLT Template ID.
     */
    protected $templateId;

    /**
     * @var string 
     * Message delivery id.
     */
    protected $deliveryId;

    /**
     * Ping4SMS constructor.
     */
    public function __construct(string $accountKey, string $senderId)
    {
        $this->accountKey = $accountKey;
        $this->senderId = $senderId;
    }

    public function destination(int $number) {
        $this->number = $number;
        return $this;
    }

    public function message(string $message) {
        $this->message = $message;
        return $this;
    }

    public function route(int $route) {
        $this->route = $route;
        return $this;
    }

    public function templateId(int $templateId) {
        $this->templateId = $templateId;
        return $this;
    }

    public function deliveryId(int $deliveryId) {
        $this->deliveryId = $deliveryId;
        return $this;
    }

    /**
     * send Message
     * @return json
     */
    public function send() {
        return (new SendResponse((new Send)->send($this->accountKey, $this->senderId, $this->number, $this->route, $this->message, $this->templateId)))->response();
    }

    /**
     * SMS Delivery Report Api allows you to get delivery report of a slot sent via Api as JSON format.
     * @return json
     */
    public function deliveryReport() {
        return (new SendResponse((new DeliveryReport)->deliveryReport($this->accountKey,$this->deliveryId)))->response();
    }

    /**
     * Available credits Api allows you to get currently available credits of a given route.
     * @return json
     */
    public function creditsCheck() {
        return (new SendResponse((new CreditsCheck)->creditsCheck($this->accountKey,$this->route)))->response();
    }

}
