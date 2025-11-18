<?php

namespace App\Filament\Clusters\MasterData\Resources\WarehouseResource\Pages;

use App\Filament\Clusters\MasterData\Resources\WarehouseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWarehouse extends CreateRecord
{
    protected static string $resource = WarehouseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
