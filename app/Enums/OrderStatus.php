<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    const PENDING = 0;
    const ACCEPTED = 1;
    const DELIVERING = 2;
    const COMPLETED = 3;
}
