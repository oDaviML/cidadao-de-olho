<?php

namespace App\Services;

use App\Models\Deputado;
use App\Models\RedeSocial;
use App\Models\VerbasIndenizatorias;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiService
{
    public function getDeputadoList()
    {
        $url = 'https://dadosabertos.almg.gov.br/api/v2/deputados/em_exercicio?formato=json';

        $response = Http::get($url);

        if ($response->failed()) {
            throw new \Exception("Erro ao acessar a API da ALMG: " . $response->status());
        }

        $dados = $response->json();

        // Verifica se a chave 'list' existe e não é nula
        foreach ($dados['list'] ?? [] as $deputadoData) {
            Deputado::updateOrCreate(
                ['id' => $deputadoData['id']],
                [
                    'nome' => $deputadoData['nome'],
                    'partido' => $deputadoData['partido'],
                    'tag_localizacao' => $deputadoData['tagLocalizacao'],
                ]
            );
        }
    }

    public function getRedesSociais()
    {
        $url = 'https://dadosabertos.almg.gov.br/api/v2/deputados/lista_telefonica?formato=json';

        $response = Http::get($url);
        if ($response->failed()) {
            throw new \Exception("Erro ao acessar a API da ALMG: " . $response->status());
        }
        $dados = $response->json();

        foreach ($dados['list'] ?? [] as $deputadoData) {

            $deputadoId = $deputadoData['id'];

            if (!isset($deputadoData['redesSociais'])) {
                continue; // Pula para o próximo deputado se não houver redes sociais
            }

            foreach ($deputadoData['redesSociais'] as $redeSocialData) {
                RedeSocial::updateOrCreate(
                    [
                        'deputado_id' => $deputadoId,
                        'nome' => $redeSocialData['redeSocial']['nome'],
                    ]
                );
            }
        }
    }

    public function getVerbas()
    {
        $client = new Client();
        $promises = [];
        $deputados = Deputado::all();
        $ano = 2019;

        foreach ($deputados as $deputado) {
            // Percorre os meses de janeiro a dezembro
            for ($i = 1; $i <= 12; $i++) {
                $url = 'https://dadosabertos.almg.gov.br/api/v2/prestacao_contas/verbas_indenizatorias/deputados/' . $deputado->id . '/' . $ano . '/' . $i . '?formato=json';

                $promises[] = $client->getAsync($url)->then(
                    function ($response) use ($deputado, $i, $ano) {

                        $dados = json_decode($response->getBody(), true);

                        foreach ($dados['list'] ?? [] as $verbaData) {
                            VerbasIndenizatorias::updateOrCreate(
                                [
                                    'deputado_id' => $deputado->id,
                                    'ano' => $ano,
                                    'mes' => $i,
                                    'valor' => $verbaData['valor'],
                                    'descricao' => $verbaData['descTipoDespesa'],
                                ]
                            );
                        }
                    },
                    function ($exception) {
                        Log::error("Erro ao acessar a API da ALMG: " . $exception->getMessage());
                    }
                );
            }
        }
        Utils::settle($promises)->wait();
    }
}
