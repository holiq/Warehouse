<?php

namespace App\Actions\Transfer;

use App\Actions\UpdateStockAction;
use App\Foundation\Action;
use App\Models\Transfer;
use Illuminate\Support\Collection;

class DeleteTransferAction extends Action
{
    public function execute(Collection $collection)
    {
        try {
            $collection->each(function (Transfer $transfer) {
                UpdateStockAction::resolve()->execute(
                    productId: $transfer->product_id,
                    warehouseId: $transfer->from_warehouse_id,
                    quantity: $transfer->quantity,
                    operator: 'add',
                );
                UpdateStockAction::resolve()->execute(
                    productId: $transfer->product_id,
                    warehouseId: $transfer->to_warehouse_id,
                    quantity: $transfer->quantity,
                    operator: 'remove'
                );
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
