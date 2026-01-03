<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\UserPivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@filamentphp.com',
        ]);

        $items = Item::factory()->count(5)->create();

        UserPivot::factory(5)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'item_id' => $items->slice($sequence->index, 1)->first()?->getKey() ?? 0
                ],
            ))
            ->for($user)
            ->enabled()
            ->start()
            ->finish()
            ->create();
    }
}
