<?php

namespace App\Filament\Resources\TransferResource\Pages;

use App\Actions\Transfer\UpdateTransferAction;
use App\DataTransferObjects\TransferData;
use App\Filament\Resources\TransferResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditTransfer extends EditRecord
{
    protected static string $resource = TransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        return UpdateTransferAction::resolve()->execute($record, TransferData::resolve($data));
    }
}
