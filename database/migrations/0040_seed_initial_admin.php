<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Створюємо початкового користувача
        DB::table('users')->insert([
            'id'         => 1,
            'name'       => 'admin',
            'email'      => 'admin@admin.com',
            'password'   => bcrypt('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2) Створюємо роль Super Admin
        DB::table('roles')->insert([
            'id'          => 1,
            'name'        => 'Super Admin',
            'slug'        => 'super-admin',
            'permissions' => json_encode(['*']),
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        // 3) Прив’язуємо роль до користувача
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }

    public function down(): void
    {
        DB::table('role_user')->where('role_id', 1)->where('user_id', 1)->delete();
        DB::table('roles')->where('id', 1)->delete();
        DB::table('users')->where('id', 1)->delete();
    }
};
