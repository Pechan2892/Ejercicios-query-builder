<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insertar usuarios
        DB::table('usuarios')->insert([
            ['nombre' => 'Carlos Pérez', 'correo' => 'carlos@gmail.com', 'telefono' => '123456789'],
            ['nombre' => 'Ana López', 'correo' => 'ana@gmail.com', 'telefono' => '987654321'],
            ['nombre' => 'Roberto Díaz', 'correo' => 'roberto@gmail.com', 'telefono' => '654321987'],
            ['nombre' => 'María Gómez', 'correo' => 'maria@gmail.com', 'telefono' => '321654987'],
            ['nombre' => 'Ricardo Torres', 'correo' => 'ricardo@gmail.com', 'telefono' => '147258369'],
        ]);

        // Insertar pedidos
        DB::table('pedidos')->insert([
            ['producto' => 'Laptop', 'cantidad' => 1, 'total' => 800.00, 'id_usuario' => 1],
            ['producto' => 'Celular', 'cantidad' => 2, 'total' => 500.00, 'id_usuario' => 2],
            ['producto' => 'Teclado', 'cantidad' => 1, 'total' => 150.00, 'id_usuario' => 3],
            ['producto' => 'Monitor', 'cantidad' => 1, 'total' => 200.00, 'id_usuario' => 4],
            ['producto' => 'Mouse', 'cantidad' => 3, 'total' => 100.00, 'id_usuario' => 5],
        ]);
    }
}
