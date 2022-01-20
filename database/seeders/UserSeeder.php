<?php
namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        $categories = Category::factory(10)->create();

        User::factory(20)->create()->each(function ($user) use ($categories) {
            $user->assignRole(['name' => 'user']);
            Book::factory(rand(1, 4))->create([
                'author_id' => $user->id
            ])->each(function ($book) use ($categories) {
                $book->categories()->attach($categories->random(2));
            });
        });
        User::factory(1)->create()->each(function ($user) {
            $user->assignRole(['name' => 'admin']);
        });
    }
}
