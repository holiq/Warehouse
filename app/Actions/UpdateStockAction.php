<?php

namespace App\Actions;

use App\Foundation\Action;
use App\Models\Inventory;

class UpdateStockAction extends Action
{
    public function execute(int $productId, int $warehouseId, int $quantity, string $operator): void
    {
        try {
            $inventory = Inventory::query()->where([
                'product_id' => $productId,
                'warehouse_id' => $warehouseId,
            ])->first();

            if ($operator == 'add') {
                $inventory->update([
                    'stock' => $inventory->stock + $quantity,
                ]);
            } elseif ($operator == 'remove') {
                $inventory->update([
                    'stock' => $inventory->stock - $quantity,
                ]);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
