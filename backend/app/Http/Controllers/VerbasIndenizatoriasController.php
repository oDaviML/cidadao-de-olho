<?php

namespace App\Http\Controllers;

use App\Models\VerbasIndenizatorias;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class VerbasIndenizatoriasController extends Controller
{
    public function topDeputadosVerbasMes($mes)
    {
        if (!is_numeric($mes) || $mes < 1 || $mes > 12) {
            return response()->json([
                'error' => 'Mês inválido. O valor deve estar entre 1 e 12.'
            ], 400);
        }

        $top5 = VerbasIndenizatorias::select(
            'deputados.nome',
            'verbas_indenizatorias.mes',
            DB::raw('SUM(verbas_indenizatorias.valor) as total')
        )
            ->join('deputados', 'verbas_indenizatorias.deputado_id', '=', 'deputados.id')
            ->where('verbas_indenizatorias.ano', 2023)
            ->where('verbas_indenizatorias.mes', $mes)
            ->groupBy('deputados.nome', 'verbas_indenizatorias.mes')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return response()->json($top5);
    }
}
