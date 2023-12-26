<?php

namespace App\Actions\Transaction;

use App\Actions\UpdateStockAction;
use App\Foundation\Action;
use App\Models\Transaction;

class ExitTransactionAction extends Action
{
    public function execute(Transaction $request): bool
    {
        try {
            if ($request->is_out) {
                return false;
                exit;
            }

            UpdateStockAction::resolve()->execute(
                productId: $request->inventory->product_id,
                warehouseId: $request->inventory->warehouse_id,
                quantity: $request->quantity,
                operator: 'remove'
            );

            return $request->update([
                'is_out' => true,
                'exit_date' => now(),
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
