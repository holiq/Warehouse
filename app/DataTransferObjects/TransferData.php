<?php

namespace App\DataTransferObjects;

use App\Foundation\DataTransferObject;

readonly class TransferData extends DataTransferObject
{
    final public function __construct(
        public string $productId,
        public string $fromWarehouseId,
        public string $toWarehouseId,
        public string $quantity,
        public string $transferDate,
    ) {
    }
}
