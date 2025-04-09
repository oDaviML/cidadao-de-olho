<?php

namespace App\Console\Commands;

use App\Services\ApiService;
use Illuminate\Console\Command;

class SyncVerbasIndenizatorias extends Command
{
    protected $signature = 'app:sync-verbas-indenizatorias';

    protected $description = 'Sincroniza as verbas indenizatórias dos deputados';

    public function __construct(private ApiService $apiService)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Iniciando a sincronização das verbas indenizatórias...');
        try {
            $this->apiService->getVerbas();
            $this->info('Sincronização concluída com sucesso.');
        } catch (\Exception $e) {
            $this->error('Erro durante a sincronização: ' . $e->getMessage());
        }
    }
}
