<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use App\Models\Review;
use App\Models\Reward;
use App\Models\Address;
use App\Models\Category;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Notification;
use Illuminate\Database\Seeder;
use App\Models\LostItemDescription;
use App\Models\FoundItemDescription;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'admin'
        ]);
        Role::factory()->create([
            'name' => 'client'
        ]);
        Image::factory(20)->create();
        Category::factory(50)->create();
        Reward::factory(50)->create();
        User::factory(100)->create();
        Address::factory(100)->create();
        Notification::factory(100)->create();
        Review::factory(50)->create();

        for ($i = 0; $i < 50; $i++) {
            $lost_item = LostItem::factory()->create();
            LostItemDescription::factory()->create([
                'lost_item_id' => $lost_item->id
            ]);
        }

        for ($i = 0; $i < 50; $i++) {
            $found_item = FoundItem::factory()->create();
            FoundItemDescription::factory()->create([
                'found_item_id' => $found_item->id
            ]);
        }
    }
}
