<?php
declare(strict_types=1);

namespace App\Utils\Multiply;

class MultiplyHelper
{
    public static function generateMultiplicationTable(int $size): array
    {
        if ($size < 1) {
            throw new \InvalidArgumentException('Size must be greater than 0');
        }

        $matrix = array_fill(1, 1, array_fill(1, $size,0));

        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $size; $j++) {
                $matrix[$i][$j] = $i * $j;
            }
        }

        return $matrix;
    }
}
