<?php

namespace App\Filament\Clusters\Purchasing\Resources\PurchaseOrderResource\Pages;

use App\Filament\Clusters\Purchasing\Resources\PurchaseOrderResource;
use Filament\Resources\Pages\EditRecord;

class EditPurchaseOrder extends EditRecord
{
    protected static string $resource = PurchaseOrderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
