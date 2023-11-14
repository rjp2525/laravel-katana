<?php

namespace Reno\Katana;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class KatanaApiException extends Exception
{
    public function __construct(GuzzleException $e)
    {
        // TODO - set message, code etc
    }
}
