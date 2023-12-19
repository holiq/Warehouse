<?php

namespace App\DataTransferObjects;

use App\Foundation\DataTransferObject;

readonly class TransactionData extends DataTransferObject
{
    final public function __construct(
        public string $transactionNumber,
        public string $transactionType,
        public int|string $inventoryId,
        public int|string $quantity,
        public int $userId,
    ) {
    }
}
