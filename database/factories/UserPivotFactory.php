<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Models\UserPivot as Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPivot>
 */
class UserPivotFactory extends Factory
{
    protected $model = Model::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'uuid' => $this->faker->uuid(),
            'started_at' => null,
            'finished_at' => null,
            'order' => $this->faker->randomDigitNotNull(),
            'status' => $this->faker->boolean(),
        ];
    }

    public function enabled(): self
    {
        return $this->state(fn (): array => [
            'status' => true,
        ]);
    }

    public function start(): self
    {
        return $this->state(fn (): array => [
            'started_at' => $this->faker->dateTime(),
        ]);
    }

    public function finish(): self
    {
        return $this->state(fn (): array => [
            'finished_at' => $this->faker->dateTime(),
        ]);
    }
}
