<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $vendorRole = Role::firstOrCreate(['name' => 'vendor']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']); // Assuming 'admin' already exists

        // Create a user and assign the 'user' role
        $user = User::create([
            'name' => 'User Name',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // Use a secure password
            'phone' => '1234567890',
            'address' => 'Morocco Fes, Dhar Mehraz N 12',
            'username' => 'Simo-El'

        ]);
        $user->assignRole($userRole);

        // Create a vendor and assign the 'vendor' role
        $vendor = User::create([
            'name' => 'Vendor Name',
            'email' => 'vendor@example.com',
            'password' => Hash::make('password'), 
            'phone' => '1234567890',
            'address' => 'Rabat - CasaBlanca Dwirat Cheikh, 12 ',
            'username' => 'LFan-OX'

        ]);
        $vendor->assignRole($vendorRole);

        // Create an admin and assign the 'admin' role
        $admin = User::create([
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'phone' => '1234567890',
            'address' => 'Checfchaouen, Trik El-Nour 465°',
            'username' => 'Hello-ME'

        ]);
        $admin->assignRole($adminRole);
    }
}
