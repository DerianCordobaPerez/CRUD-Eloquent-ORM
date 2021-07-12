<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\ClassRoom;
use App\Models\Imparts;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Teacher::factory(10)->create();
        ClassRoom::factory(10)->create();
        Classes::factory(10)->create();
        Role::factory(4)->create();
        User::factory(15)->create();
    }
}
