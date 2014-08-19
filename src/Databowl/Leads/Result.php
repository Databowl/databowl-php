<?php
namespace Databowl\Leads;

class Result
{
    /**
     * @var string
     */
    private $message;
    /**
     * @var string
     */
    private $errorMessage;

    public function __construct($message, $errorMessage)
    {
        $this->message = $message;
        $this->errorMessage = $errorMessage;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}