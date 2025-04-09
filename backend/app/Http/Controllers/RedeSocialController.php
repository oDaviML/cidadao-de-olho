<?php

namespace App\Http\Controllers;

use App\Models\RedeSocial;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RedeSocialController extends Controller
{
    public function getTopRedes()
    {
        $top5 = RedeSocial::select('nome', DB::raw('COUNT(deputado_id) as total'))
            ->groupBy('nome')
            ->orderBy('total', 'desc')
            ->get();

        return response()->json($top5);
    }
}
