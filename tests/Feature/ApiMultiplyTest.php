<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ApiMultiplyTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('multiply_data_provider')]
    public function test_multiply(mixed $size, int $status): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $response = $this->json('GET', '/api/multiply', [
            'size' => $size,
        ]);

        $response->assertStatus($status);
    }

    public static function multiply_data_provider(): array
    {
        return [
            'test case - size 5' => [
                'size' => 5,
                'status' => Response::HTTP_OK
            ],
            'test case - size 10' => [
                'size' => 10,
                'status' => Response::HTTP_OK
            ],
            'test case - size -1' => [
                'size' => -1,
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ],
            'test case - size 0' => [
                'size' => 0,
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ],
            'test case - size 2.5' => [
                'size' => 2.5,
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ],
            'test case - size test' => [
                'size' => 'test',
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ],
            'test case - size null' => [
                'size' => null,
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ],
        ];
    }
}
