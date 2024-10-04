<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Bungalow.php';
require_once __DIR__ . '/BungalowMock.php';

class BungalowTest extends TestCase {

    // Méthode qui s'exécute avant chaque test
    protected function setUp(): void {
        // Configuration de la base de données en mémoire
        $this->pdo = new PDO('sqlite::memory:');  // Crée une base de données SQLite en mémoire
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Création de la table 'bungalow' dans cette base en mémoire
        $this->pdo->exec("CREATE TABLE bungalow (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            description TEXT,
            price INTEGER
        )");

        // Crée une instance de ton modèle Bungalow avec la connexion en mémoire
        $this->bungalow = new BungalowMock($this->pdo); // Utilise un mock ici (voir plus bas)
    }

    // Teste la création d'un bungalow
    public function testCreateBungalow() {
        // Appel à la méthode
        $this->bungalow->createBungalow("Bungalow A", "Description A", 100);

        // Vérifie que le bungalow a bien été créé
        $bungalows = $this->bungalow->getAllBungalow();
        $this->assertCount(1, $bungalows);
        $this->assertEquals("Bungalow A", $bungalows[0]['name']);
        $this->assertEquals("Description A", $bungalows[0]['description']);
        $this->assertEquals(100, $bungalows[0]['price']);
    }

    // Teste la lecture de tous les bungalows
    public function testGetAllBungalows() {
        $this->bungalow->createBungalow("Bungalow A", "Description A", 100);
        $this->bungalow->createBungalow("Bungalow B", "Description B", 200);

        // Vérifie qu'il y a bien deux bungalows
        $bungalows = $this->bungalow->getAllBungalow();
        $this->assertCount(2, $bungalows);
    }

    // Teste la mise à jour d'un bungalow
    public function testUpdateBungalow() {
        $this->bungalow->createBungalow("Bungalow A", "Description A", 100);

        // Mise à jour du bungalow
        $this->bungalow->updateBungalow(1, "Bungalow A Updated", "Description A Updated", 150);

        // Vérifie que les données ont été mises à jour
        $bungalows = $this->bungalow->getBungalowById(1);
        $this->assertEquals("Bungalow A Updated", $bungalows[0]['name']);
        $this->assertEquals("Description A Updated", $bungalows[0]['description']);
        $this->assertEquals(150, $bungalows[0]['price']);
    }

    // Teste la suppression d'un bungalow
    public function testDeleteBungalow() {
        $this->bungalow->createBungalow("Bungalow A", "Description A", 100);

        // Supprime le bungalow
        $this->bungalow->deleteBungalow(1);

        // Vérifie qu'il n'y a plus de bungalow
        $bungalows = $this->bungalow->getAllBungalow();
        $this->assertCount(0, $bungalows);
    }

    // Méthode qui s'exécute après chaque test
    protected function tearDown(): void {
        $this->pdo = null;
    }
}