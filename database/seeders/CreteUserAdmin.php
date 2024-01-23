<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreteUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zintechAdmin = User::create([
            'name' => 'Adminsitrator Zintech',
            'email' => 'admin@zintech.mx',
            'password' => Hash::make('secret'),
        ]);
        $zintechAdmin->assignRole('admin');
    }
}
