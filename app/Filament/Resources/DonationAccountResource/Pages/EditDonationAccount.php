<?php

namespace App\Filament\Resources\DonationAccountResource\Pages;

use App\Filament\Resources\DonationAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonationAccount extends EditRecord
{
    protected static string $resource = DonationAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
