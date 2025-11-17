<?php

namespace App\Enums;

enum CustomerType: string
{
    case REGULAR = 'REGULAR';
    case WHOLESALE = 'WHOLESALE'; // Grosir
    case ONLINE = 'ONLINE'; // ecommerce
    case DISTRIBUTOR = 'DISTRIBUTOR';
    case INTERNAL = 'INTERNAL';

    public function label(): string
    {
        return match ($this) {
            self::REGULAR => 'REGULAR',
            self::WHOLESALE => 'WHOLESALE / GROSIR',
            self::ONLINE => 'ONLINE / MARKETPLACE',
            self::DISTRIBUTOR => 'DISTRIBUTOR',
            self::INTERNAL => 'INTERNAL DEPARTMENT',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
