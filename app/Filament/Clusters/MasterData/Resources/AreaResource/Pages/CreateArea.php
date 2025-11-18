<?php

namespace App\Filament\Clusters\MasterData\Resources\AreaResource\Pages;

use App\Filament\Clusters\MasterData\Resources\AreaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArea extends CreateRecord
{
    protected static string $resource = AreaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
