<?php

namespace App\Http\Controllers;

use App\Models\Deputado;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DeputadoController extends Controller
{
    public function index()
    {
        $deputados = Deputado::all();
        return response()->json($deputados);
    }
}
