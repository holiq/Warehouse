<?php

namespace App\Actions\Transaction;

use App\Actions\UpdateStockAction;
use App\DataTransferObjects\TransactionData;
use App\Foundation\Action;
use App\Models\Inventory;
use App\Models\Transaction;

class StoreTransactionAction extends Action
{
    public function execute(TransactionData $request): Transaction
    {
        try {
            $inventory = Inventory::query()->findOrFail($request->inventoryId);

            UpdateStockAction::resolve()->execute(
                productId: $inventory->product_id,
                warehouseId: $inventory->warehouse_id,
                quantity: $request->quantity,
                operator: 'add'
            );

            return Transaction::query()->create($request->toArray());
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
