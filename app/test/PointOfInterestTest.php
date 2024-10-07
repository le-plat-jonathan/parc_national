<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/PointOfInterest.php';

class PointOfInterestTest extends TestCase {

    public $pointOfInterest;

    // Initialisation avant chaque test
    protected function setUp(): void
    {
        $this->pointOfInterest = new PointOfInterest();
    }

    // Test pour la récupération de tous les points d'intérêt
    public function testGetAllPointOfInterest()
    {
        $result = $this->pointOfInterest->getAllPointOfInterest();
        $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    // Test pour la récupération d'un point d'intérêt par son ID
    public function testGetPointOfInterestById()
    {
        $result = $this->pointOfInterest->getPointOfInterestById(2); // Assurez-vous qu'un point d'intérêt avec l'ID 1 existe
        $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
        $this->assertEquals(2, $result['id'], "L'ID du point d'intérêt ne correspond pas");
    }

    // Test pour la création d'un point d'intérêt
    public function testCreatePointOfInterest()
    {
        $name = 'Test Point';
        $description = 'Description for test point.';
        $longitude = '5.0';
        $latitude = '43.0';

        $result = $this->pointOfInterest->createPointOfInterest($name, $description, $longitude, $latitude);
        $this->assertTrue($result, "Retour false lors de la création du point d'intérêt");
    }

    // Test pour la mise à jour d'un point d'intérêt
    public function testUpdatePointOfInterest()
    {
        $id = 1; 
        $name = 'Updated Point';
        $description = 'Updated description.';
        $longitude = '5.1';
        $latitude = '43.1';

        $result = $this->pointOfInterest->updatePointOfInterest($id, $name, $description, $longitude, $latitude);
        $this->assertTrue($result, "Retour false lors de la mise à jour du point d'intérêt");
    }

    // Test pour la suppression d'un point d'intérêt
    public function testDeletePointOfInterest()
    {
        $result = $this->pointOfInterest->deletePointOfInterest(1); // Assurez-vous qu'un point d'intérêt avec l'ID 1 existe
        $this->assertTrue($result, "Retour false lors de la suppression du point d'intérêt");
    }
}