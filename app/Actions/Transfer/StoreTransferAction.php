<?php

namespace App\Actions\Transfer;

use App\Actions\UpdateStockAction;
use App\DataTransferObjects\TransferData;
use App\Foundation\Action;
use App\Models\Transfer;

class StoreTransferAction extends Action
{
    public function execute(TransferData $request): Transfer
    {
        try {
            UpdateStockAction::resolve()->execute(
                productId: $request->productId,
                warehouseId: $request->fromWarehouseId,
                quantity: $request->quantity,
                operator: 'remove'
            );

            UpdateStockAction::resolve()->execute(
                productId: $request->productId,
                warehouseId: $request->toWarehouseId,
                quantity: $request->quantity,
                operator: 'add'
            );

            return Transfer::query()->create($request->toArray());
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
