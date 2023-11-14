<?php

namespace Reno\Katana;

use Exception;

class KatanaMissingConfigValueException extends Exception
{
    public function __construct(string $path)
    {
        $this->message = "Katana configuration value missing: {$path}";
        $this->code = 0;
    }
}
