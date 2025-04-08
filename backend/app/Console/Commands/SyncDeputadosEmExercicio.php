<?php

namespace App\Console\Commands;

use App\Services\ApiService;
use Illuminate\Console\Command;

class SyncDeputadosEmExercicio extends Command
{

    protected $signature = 'app:sync-deputados-em-exercicio';
    protected $description = 'Sincroniza deputados em exercício da API da ALMG';


    public function __construct(private ApiService $apiService)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Iniciando a sincronização dos deputados em exercício...');
        try {
            $this->apiService->getDeputadoList();
            $this->info('Sincronização concluída com sucesso!');
        } catch (\Exception $e) {
            $this->error('Erro durante a sincronização: ' . $e->getMessage());
        }
    }
}
