<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Actions\Transaction\StoreTransactionAction;
use App\DataTransferObjects\TransactionData;
use App\Filament\Resources\TransactionResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return StoreTransactionAction::resolve()->execute(TransactionData::resolve([
            'user_id' => Auth::id(),
            ...$data,
        ]));
    }
}
