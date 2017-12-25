<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PortadaTest
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaBundle\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortadaTest extends WebTestCase {

    // La portada muestra al menos una carrera activa
    public function testLaPortadaMuestraAlMenosUnaCarreraActiva() {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/es/portada');
        $carrerasActivas = $crawler->filter(
                        'html:contains("Inscríbete")'
                )->count();
        $this->assertGreaterThan(0, $carrerasActivas, 'La portada muestra al menos una carrera para inscribirse'
        );
    }
}
