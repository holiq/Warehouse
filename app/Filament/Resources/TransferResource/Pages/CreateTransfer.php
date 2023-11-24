<?php

namespace App\Filament\Resources\TransferResource\Pages;

use App\Actions\Transfer\StoreTransferAction;
use App\DataTransferObjects\TransferData;
use App\Filament\Resources\TransferResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTransfer extends CreateRecord
{
    protected static string $resource = TransferResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return StoreTransferAction::resolve()->execute(TransferData::resolve($data));
    }
}
