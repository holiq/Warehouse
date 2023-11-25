<?php

namespace App\DataTransferObjects;

use App\Foundation\DataTransferObject;

readonly class TransferData extends DataTransferObject
{
    final public function __construct(
        public int|string $productId,
        public int|string $fromWarehouseId,
        public int|string $toWarehouseId,
        public string $quantity,
        public string $transferDate,
    ) {
    }
}
