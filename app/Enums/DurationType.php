<?php

namespace App\Enums;

enum DurationType: string
{
    case Yearly = 'yearly';
    case Monthly = 'monthly';

    public function label(): string
    {
        return match ($this) {
            self::Yearly => 'Yearly',
            self::Monthly => 'Monthly',
        };
    }

    public static function options(): array
    {
        return [
            self::Yearly => self::Yearly->label(),
            self::Monthly => self::Monthly->label(),
        ];
    }
}
