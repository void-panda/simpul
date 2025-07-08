<?php

namespace App\Filament\Resources\CommunityResource\Pages;

use App\Filament\Resources\CommunityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommunity extends EditRecord
{
    protected static string $resource = CommunityResource::class;

    public function mount($record = null): void
    {
        parent::mount(1); // selalu pakai record ID 1
    }


    protected function hasBackButton(): bool
    {
        return false;
    }
}
