<?php

class BungalowMock extends Bungalow {
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Mock de la méthode getAllBungalow
    public function getAllBungalow() {
        return [
            ['id' => 1, 'name' => 'Bungalow A', 'description' => 'Description A', 'price' => 100],
            ['id' => 2, 'name' => 'Bungalow B', 'description' => 'Description B', 'price' => 200]
        ];
    }

    // Mock de la méthode getBungalowById
    public function getBungalowById($id) {
        return [
            ['id' => $id, 'name' => "Bungalow $id", 'description' => "Description $id", 'price' => 100]
        ];
    }

    // Mock de la méthode createBungalow
    public function createBungalow($name, $description, $price) {
        // Pas besoin de faire quoi que ce soit ici, c'est un mock
    }

    // Mock de la méthode updateBungalow
    public function updateBungalow($id, $name, $description, $price) {
        // Pas besoin de faire quoi que ce soit ici, c'est un mock
    }

    // Mock de la méthode deleteBungalow
    public function deleteBungalow($id) {
        // Pas besoin de faire quoi que ce soit ici, c'est un mock
    }
}