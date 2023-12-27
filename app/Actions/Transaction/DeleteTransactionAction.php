<?php

namespace App\Actions\Transaction;

use App\Actions\UpdateStockAction;
use App\Foundation\Action;
use App\Models\Transaction;

class DeleteTransactionAction extends Action
{
    public function execute(Transaction $request): bool
    {
        try {
            if (! $request->is_out) {
                UpdateStockAction::resolve()->execute(
                    productId: $request->inventory->product_id,
                    warehouseId: $request->inventory->warehouse_id,
                    quantity: $request->quantity,
                    operator: 'remove'
                );
            }

            return $request->delete();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
