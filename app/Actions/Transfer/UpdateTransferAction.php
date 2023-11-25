<?php

namespace App\Actions\Transfer;

use App\Actions\UpdateStockAction;
use App\DataTransferObjects\TransferData;
use App\Foundation\Action;
use App\Models\Transfer;

class UpdateTransferAction extends Action
{
    public function execute(Transfer $transfer, TransferData $request): Transfer
    {
        try {
            if ($transfer->quantity != $request->quantity) {
                if ($transfer->quantity < $request->quantity) {
                    $qty = $request->quantity - $transfer->quantity;
                    $operatorFrom = 'remove';
                    $operatorTo = 'add';
                } else {
                    $qty = $transfer->quantity - $request->quantity;
                    $operatorFrom = 'add';
                    $operatorTo = 'remove';
                }

                UpdateStockAction::resolve()->execute(
                    productId: $request->productId,
                    warehouseId: $request->fromWarehouseId,
                    quantity: $qty,
                    operator: $operatorFrom,
                );

                UpdateStockAction::resolve()->execute(
                    productId: $request->productId,
                    warehouseId: $request->toWarehouseId,
                    quantity: $qty,
                    operator: $operatorTo,
                );
            }

            $transfer->update($request->toArray());

            return $transfer;
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
