<?php

namespace Ping4SMS\Response;

class SendResponse 
{
    protected $response;

    public const ERROR_CODE_101 = 101 ; 
    public const ERROR_CODE_102 = 102 ;
    public const ERROR_CODE_103 = 103 ;
    public const ERROR_CODE_104 = 104 ;
    public const ERROR_CODE_105 = 105 ;
    public const ERROR_CODE_106 = 106 ;
    public const ERROR_CODE_107 = 107 ;
    public const ERROR_CODE_108 = 108 ;
    public const ERROR_CODE_109 = 109 ;
    public const ERROR_CODE_110 = 110 ;
    public const ERROR_CODE_200 = 200 ;

    public const ERROR_MESSAGE = [
        self::ERROR_CODE_101 => 'Invalid user.',
        self::ERROR_CODE_102 => 'Invalid sender ID.',
        self::ERROR_CODE_103 => 'Invalid contact(s).',
        self::ERROR_CODE_104 => 'Invalid route.',
        self::ERROR_CODE_105 => 'Invalid message.',
        self::ERROR_CODE_106 => 'Spam blocked.',
        self::ERROR_CODE_107 => 'Promotional block.',
        self::ERROR_CODE_108 => 'Low credits in the specified route.',
        self::ERROR_CODE_109 => 'Invalid DLT Template ID.',
        self::ERROR_CODE_110 => 'Promotional route will be working from 9am to 8:45pm only.',
        self::ERROR_CODE_200 => 'Successfully Send a SMS.',
    ];

    /**
     * Base Response constructor.
     */
    public function __construct($response)
    {
        $response = json_decode($response,true);
        if(is_int($response) && $response < 199)
            $this->response = ['error' => self::ERROR_MESSAGE[$response], 'code' => $code];
        else if (is_int($response))
            $this->response = ['success' => self::ERROR_MESSAGE[200], 'id' => $response];
        else 
            $this->response = $response;
    }

    public function response() {
        return $this->response;
    }
}
