<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "Administrator"]);
        Role::create(["name" => "Bank"]);
        Role::create(["name" => "Kantin"]);
        Role::create(["name" => "Siswa"]);

            User::create([
                "name"=> "Admin",
                "email"=> "admin@admin.com",
                "password"=>Hash::make("admin"),
                "role_id"=> 1
            ]);

            User::create([
                "name"=> "Bank",
                "email"=> "bank@bank.com",
                "password"=>Hash::make("bank"),
                "role_id"=> 2
            ]);

            User::create([
                "name"=> "Kantin",
                "email"=> "kantin@kantin.com",
                "password"=>Hash::make("kantin"),
                "role_id"=> 3
            ]);

            User::create([
                "name"=> "Siswa",
                "email"=> "siswa@siswa.com",
                "password"=>Hash::make("siswa"),
                "role_id"=> 4
            ]);

            Barang::create([
                "name"  => "Burger",
                "price" =>  6000,
                "stock" =>  10,
                "desc"  => "Burger luar kadar",
            ]);

            Barang::create([
                "name"  => "Nasi Uduk",
                "price" =>  10000,
                "stock" =>  20,
                "desc"  => "Nasi uduk halal",
            ]);

            Barang::create([
                "name"  => "Agua",
                "price" =>  3000,
                "stock" =>  10,
                "desc"  => "Agua mineral",
            ]);

            Barang::create([
                "name"  => "Teh Serut",
                "price" =>  4000,
                "stock" =>  15,
                "desc"  => "Gmn cb tuh teh diserut",
            ]);

            Saldo::create([
                "user_id" => 4,
                "saldo" => 50000
            ]);

            Transaksi::create([
                "user_id" => 4,
                "barang_id"=> null,
                "jumlah" => 50000,
                "invoice_id" => "SAL_001",
                "type"=> 2,
                "status"=> 4
            ]);

            Transaksi::create([
                "user_id" => 4,
                "barang_id" => 4,
                "jumlah" => 1,
                "invoice_id"=> "INV_001",
                "type" => 2,
                "status"=> 4
            ]);
    }
}
