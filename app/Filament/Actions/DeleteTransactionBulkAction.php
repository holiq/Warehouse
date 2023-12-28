<?php

namespace App\Filament\Actions;

use App\Actions\Transaction\DeleteTransactionAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DeleteTransactionBulkAction extends DeleteBulkAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->action(function (): void {
            $this->process(static fn (Collection $records) => $records->each(fn (Model $record) => DeleteTransactionAction::resolve()->execute($record)));

            $this->success();
        });
    }
}
