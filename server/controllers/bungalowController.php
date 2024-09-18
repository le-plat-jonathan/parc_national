<?php

require_once __DIR__ . '/../models/Bungalow.php';
// include_once __DIR__ . '/../views/getBungalow.php';

class BungalowController {
    private $bungalowModel;

    public function __construct() {
        $this->bungalowModel = new Bungalow();
    }

    public function getBungalowById($id) {
        $data = $this->bungalowModel->getBungalowById($id);
        require __DIR__ . '/../views/getBungalow.php';
    }

    public function getAllBungalow() {
        $data = $this->bungalowModel->getAllBungalow();
        require __DIR__ . '/../views/getBungalow.php';
    }

}