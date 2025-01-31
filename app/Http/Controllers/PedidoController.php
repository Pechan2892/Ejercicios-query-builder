<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    // Recuperar todos los pedidos asociados al usuario con ID 2
    public function pedidosUsuario2()
    {
        $pedidos = DB::table('pedidos')->where('id_usuario', 2)->get();
        return response()->json($pedidos);
    }

    // Obtener información detallada de los pedidos con nombre y correo del usuario
    public function pedidosConUsuarios()
    {
        $pedidos = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
            ->get();
        return response()->json($pedidos);
    }

    // Recuperar pedidos cuyo total esté entre $100 y $250
    public function pedidosEnRango()
    {
        $pedidos = DB::table('pedidos')
            ->whereBetween('total', [100, 250])
            ->get();
        return response()->json($pedidos);
    }

    // Encontrar usuarios cuyos nombres comiencen con "R"
    public function usuariosConR()
    {
        $usuarios = DB::table('usuarios')
            ->where('nombre', 'like', 'R%')
            ->get();
        return response()->json($usuarios);
    }

    // Calcular el total de pedidos del usuario con ID 5
    public function totalPedidosUsuario5()
    {
        $total = DB::table('pedidos')
            ->where('id_usuario', 5)
            ->count();
        return response()->json(['total_pedidos' => $total]);
    }

    // Recuperar pedidos con usuarios ordenados por total (descendente)
    public function pedidosOrdenados()
    {
        $pedidos = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
            ->orderBy('pedidos.total', 'desc')
            ->get();
        return response()->json($pedidos);
    }

    // Obtener la suma total de los pedidos
    public function sumaTotalPedidos()
    {
        $suma = DB::table('pedidos')->sum('total');
        return response()->json(['suma_total' => $suma]);
    }

    // Encontrar el pedido más barato con el nombre del usuario asociado
    public function pedidoMasBarato()
    {
        $pedido = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre')
            ->orderBy('pedidos.total', 'asc')
            ->first();
        return response()->json($pedido);
    }

    // Agrupar pedidos por usuario y mostrar producto, cantidad y total
    public function pedidosAgrupadosPorUsuario()
    {
        $pedidos = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('usuarios.nombre', 'pedidos.producto', 'pedidos.cantidad', 'pedidos.total')
            ->orderBy('usuarios.id')
            ->get();
        return response()->json($pedidos);
    }
}
