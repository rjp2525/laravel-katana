<?php

namespace Reno\Katana\Resources;

use Reno\Katana\Katana;

abstract class BaseResource
{
    protected $client;
    protected array $query;
    protected string $baseResource;

    public function __construct(Katana $client)
    {
        $this->client = $client;
    }
}
