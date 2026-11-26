<?php
declare(strict_types=1);

function calculateLineTotal(int $unitPrice, int $quantity): int
{
    $lineTotal = $unitPrice * $quantity;
    return $lineTotal;
}

function addTax(int $subtotal, float $rate): float
{
    $taxAmount = $subtotal * $rate;
    $total = $subtotal + $taxAmount;
    return $total;
}

$unitPrice = 12;
$quantity = 3;
$subtotal = calculateLineTotal($unitPrice, $quantity);
$total = addTax($subtotal, 0.1);

echo sprintf("Subtotal: %d; total with tax: %.2f\n", $subtotal, $total);
