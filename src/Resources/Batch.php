<?php

namespace Reno\Katana\Resources;

use Carbon\Carbon;

class Batch extends BaseResource
{
    public function __construct()
    {
        parent::__construct($this->client);

        $this->baseResource = 'batches';
    }

    public function create(string $batchNumber, int $variantId)
    {
        $this->query['batch_number'] = $batchNumber;
        $this->query['variant_id'] = $variantId;

        return $this->client->request('POST', $this->baseResource, $this->query);
    }

    public function expires(mixed $dateTime)
    {
        $timestamp = Carbon::parse($dateTime)->toISOString();

        $this->query['expires_at'] = $timestamp;

        return $this;
    }

    public function created(mixed $dateTime)
    {
        $timestamp = Carbon::parse($dateTime)->toISOString();

        $this->query['batch_created_date'] = $timestamp;

        return $this;
    }

    public function barcode(string $upc)
    {
        $this->query['batch_barcode'] = $upc;

        return $this;
    }
}
