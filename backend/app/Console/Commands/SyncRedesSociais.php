<?php

namespace App\Console\Commands;

use App\Services\ApiService;
use Illuminate\Console\Command;

class SyncRedesSociais extends Command
{
    protected $signature = 'app:sync-redes-sociais';
    protected $description = 'Sincroniza as redes sociais dos deputados com a API da ALMG';

    public function __construct(private ApiService $apiService) {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Iniciando a sincronização das redes sociais dos deputados...');
        try {
            $this->apiService->getRedesSociais();
            $this->info('Sincronização das redes sociais concluída com sucesso!');
        } catch (\Exception $e) {
            $this->error('Erro durante a sincronização das redes sociais: ' . $e->getMessage());
        }
    }
}
