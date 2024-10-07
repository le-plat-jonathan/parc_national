<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/NaturalRessources.php';

class NaturalRessourcesTest extends TestCase {

    public $ressources;

    protected function setUp(): void
    {
        $this->ressources = new NaturalRessources();
    }

    public function testGetAllNaturalRessources()
    {
        $result = $this->ressources->getAllNaturalRessources();
        $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    public function testGetNaturalRessourcesById()
    {
        $result = $this->ressources->getNaturalRessourcesById(1);
        $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    public function testGetNaturalRessourcesByEnvironmentId()
    {
        $result = $this->ressources->getNaturalRessourcesByEnvironmentId(1);  // corrected variable name
        $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    public function testCreateNaturalRessources()
    {
        $name = 'test';
        $description = 'description';
        $population = 'population';
        $environment_id = 1;
        $img = 1;

        $result = $this->ressources->createNaturalRessources($name, $description, $population, $environment_id, $img);
        $this->assertTrue($result, "Retour false");
    }

    public function testUpdateNaturalRessources()
    {
        $id = 1;
        $name = 'test';
        $description = 'description';
        $population = 'population';
        $environment_id = 1;
        $img = 1;

        $result = $this->ressources->updateNaturalRessources($id, $name, $description, $population, $environment_id, $img);
        $this->assertTrue($result, "Retour false");
    }

    public function testdeleteNaturalRessource()
    {
        $result = $this->ressources->deleteNaturalRessource(1);
        $this->assertTrue($result, "Ce n'est pas un array comme attendu");
    }
}