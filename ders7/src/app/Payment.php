<?php

declare(strict_types=1);

namespace App\app;

class Payment
{
    const STATUS_PENDING = "Pending";

    public string $paymentDate;
    public static int $paymentCount = 0;

    public function __construct($paymentDate)
    {
        $this->paymentDate = $paymentDate;
        self::$paymentCount++;
    }

    public static function getStatus(): string{
        return self::STATUS_PENDING;
    }

    public function getPaymentDate(): string{
        return $this->paymentDate;
    }

    public function getPaymentCount(): int{
        return self::$paymentCount;
    }
}