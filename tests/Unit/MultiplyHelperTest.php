<?php
declare(strict_types=1);

use App\Utils\Multiply\MultiplyHelper;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class MultiplyHelperTest extends TestCase
{
    #[DataProvider('generate_multiplication_table_data_provider')]
    public function test_generate_multiplication_table(int $size, array $expected): void
    {
        $result = MultiplyHelper::generateMultiplicationTable($size);

        $this->assertSame($expected, $result);
    }

    public static function generate_multiplication_table_data_provider(): array
    {
        return [
            'test case - size 1' => [
                'size' => 1,
                'expected' => [
                    1 => [
                        1 => 1,
                    ]
                ],
            ],
            'test case - size 2' => [
                'size' => 2,
                'expected' => [
                    1 => [
                        1 => 1,
                        2 => 2,
                    ],
                    2 => [
                        1 => 2,
                        2 => 4,
                    ]
                ],
            ],
            'test case - size 3' => [
                'size' => 3,
                'expected' => [
                    1 => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                    ],
                    2 => [
                        1 => 2,
                        2 => 4,
                        3 => 6,
                    ],
                    3 => [
                        1 => 3,
                        2 => 6,
                        3 => 9,
                    ],
                ],
            ],
        ];
    }

    #[DataProvider('generate_multiplication_table_data_provider_failed')]
    public function test_generate_multiplication_table_failed(int $size, string $expected): void
    {
        self::expectException($expected);

        MultiplyHelper::generateMultiplicationTable($size);
    }

    public static function generate_multiplication_table_data_provider_failed(): array
    {
        return [
            'test case - size -1' => [
                'size' => -1,
                'expected' => InvalidArgumentException::class
            ],
        ];
    }
}
