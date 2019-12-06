<?php

namespace App\Services;

use App\{Serie,Temporada,Episodio};
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas,int $epPorTemporada):Serie
    {

        
        DB::beginTransaction();
            
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaTemporadas($serie,$nomeSerie,$qtdTemporadas ,$epPorTemporada);

        DB::commit();

        
        return $serie;
    }

    private function criaTemporadas(Serie $serie,string $nomeSerie, int $qtdTemporadas,int $epPorTemporada ):void{
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($temporada, $qtdTemporadas);
            
        }

    }

    private function criaEpisodios(Temporada $temporada,int $epPorTemporada):void{
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}