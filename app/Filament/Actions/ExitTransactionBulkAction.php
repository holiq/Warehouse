<?php

namespace App\Filament\Actions;

use App\Actions\Transaction\ExitTransactionAction;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ExitTransactionBulkAction extends BulkAction
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'mark-exit';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('Mark exit'));

        $this->modalHeading(fn (): string => __('Mark exit', ['label' => $this->getPluralModelLabel()]));

        $this->successNotificationTitle(__('Success mark exit'));

        $this->color('warning');

        $this->icon('heroicon-o-arrow-uturn-right');

        $this->requiresConfirmation();

        $this->modalIcon('heroicon-o-arrow-up-tray');

        $this->modalIconColor('warning');

        $this->failureNotificationTitle('Item has been out');

        $this->action(function (): void {
            $this->process(function (Collection $records) {
                $records->each(function (Model $record) {
                    if (ExitTransactionAction::resolve()->execute($record)) {
                        $this->success();
                    } else {
                        $this->failure();
                    }
                });
            });
        });

        $this->deselectRecordsAfterCompletion();
    }
}
