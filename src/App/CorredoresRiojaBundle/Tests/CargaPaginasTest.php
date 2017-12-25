<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CargaPaginasTest
 *
 * @author Ramón Mª Carnero
 */

namespace App\CorredoresRiojaBundle\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CargaPaginasTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/es/portada'),
            array('/es/corredores/carreras'),
            array('/es/corredores/carrera/Primera Carrera'),
            array('/es/corredores/carrera/Segunda Carrera'),
            array('/es/corredores/login'),
            array('/es/corredores/registro'),
            array('/en/portada'),
            array('/en/corredores/carreras'),
            array('/en/corredores/carrera/Primera Carrera'),
            array('/en/corredores/carrera/Segunda Carrera'),
            array('/en/corredores/login'),
            array('/en/corredores/registro'),
        );
    }
}