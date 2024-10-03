<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/Bungalow.php';

class BungalowTest extends TestCase {

    public function testGetAllBungalow()
    {
     $bungalow = new Bungalow();

     $result = $bungalow->getAllBungalow();

     $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    public function testGetBungalowById()
    {
     $bungalow = new Bungalow();

     $result = $bungalow->getBungalowById(1);

     $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    public function testCreateBungalow()
    {
     $bungalow = new Bungalow();

     $result = $bungalow->createBungalow('Nom', 'description', 100);

     $this->assertTrue($result, "Retour false");
    }

    public function testUpdateBungalow()
    {
     $bungalow = new Bungalow();

     $result = $bungalow->updateBungalow(1,'Nom', 'description', 100);

     $this->assertTrue($result, "Retour false");
    }

    public function testDeleteBungalow()
    {
     $bungalow = new Bungalow();

     $result = $bungalow->deleteBungalow(1);

     $this->assertTrue($result, "Retour false");
    }
}