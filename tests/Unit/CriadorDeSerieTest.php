<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\CriadorDeSerie;
use App\{Serie,Temporada,Episodio};


class CriadorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    public function testCriarSerie()
{
    $criadorDeSerie = new CriadorDeSerie();
    $nomeSerie = 'Nome de teste';
    $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

    $this->assertInstanceOf(Serie::class, $serieCriada);
    $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
    $this->assertDatabaseHas('temporadas', ['serie_id' => $serieCriada->id, 'numero'=> 1]);
    $this->assertDatabaseHas('episodios', ['numero'=> 1]);
}
}
