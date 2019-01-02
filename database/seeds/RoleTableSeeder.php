<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = DB::table('roles')->insert([
            
            'nama_role' => "Admin",
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
        $result = DB::table('roles')->insert([
            
            'nama_role' => "Pembeli",
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
        $result = DB::table('roles')->insert([

            'nama_role' => "Penjual",
            'created_at' => new DateTime,
            'updated_at' => new DateTime,

        ]);
        $result = DB::table('roles')->insert([
            
            'nama_role' => "Dokter",
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
