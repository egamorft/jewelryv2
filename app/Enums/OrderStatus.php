<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use Illuminate\Validation\Rules\Enum as RulesEnum;

final class OrderStatus extends RulesEnum
{
    const BEFORE_DEPOSIT = 0;
    const PREPARE_DELIVERY = 1;
    const SHIPPING = 2;
    const COMPLETED = 3;
    const CANCEL = 4;
    const EXCHANGE = 5;
    const RETURN = 6;
}