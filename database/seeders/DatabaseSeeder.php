<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create(['role_name' => 'admin']);
        Role::create(['role_name' => 'user']);

        User::create([
            'fullname' => 'Cyprid Admin',
            'username' => 'CypridAdmin',
            'email' => 'cypridadmin@gmail.com',
            'gender' => 'Female',
            'contact_number' => '09322550100',
            'address' => 'Camagong, Oas, Albay',
            'password' => Hash::make('cypridadmin'),
            'role_id' => $admin->role_id,
        ]);
    }
}
