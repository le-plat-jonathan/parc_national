<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/Trail.php';

class TrailTest extends TestCase {

    public $trail;

    // Initialisation avant chaque test
    protected function setUp(): void
    {
        $this->trail = new Trail();
    }

    // Test pour la récupération de tous les sentiers
    public function testGetAllTrail()
    {
        $result = $this->trail->getAllTrail();
        $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    // Test pour la récupération d'un sentier par son ID
    public function testGetTrailById()
    {
        $result = $this->trail->getTrailById(2); // Assurez-vous qu'un sentier avec l'ID 1 existe
        $this->assertIsArray($result, "Ce n'est pas un array comme attendu");
    }

    // Test pour la création d'un sentier
    public function testCreateTrail()
    {

        $name = 'Test Trail';
        $length = '10';
        $difficulty = 'Medium';
        $longitude_A = '12.345';
        $latitude_A = '54.321';
        $longitude_B = '13.456';
        $latitude_B = '55.432';
        $img = 'test_image.jpg';

        $result = $this->trail->createTrail($name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B, $img);
        $this->assertTrue($result, "Retour false lors de la création du sentier");
    }

    // Test pour la mise à jour d'un sentier
    public function testUpdateTrail()
    {
        $id = 2; 
        $name = 'Updated Trail';
        $length = '12';
        $difficulty = 'Hard';
        $longitude_A = '12.345';
        $latitude_A = '54.321';
        $longitude_B = '13.456';
        $latitude_B = '55.432';
        $img = 'updated_image.jpg';

        $result = $this->trail->updateTrail($id, $name, $length, $difficulty, $longitude_A, $latitude_A, $longitude_B, $latitude_B, $img);
        $this->assertTrue($result, "Retour false lors de la mise à jour du sentier");
    }

    // Test pour la suppression d'un sentier
    public function testDeleteTrail()
    {
        $result = $this->trail->deleteTrail(1); // Assurez-vous qu'un sentier avec l'ID 1 existe
        $this->assertTrue($result, "Retour false lors de la suppression du sentier");
    }
}