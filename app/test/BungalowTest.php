<?php
use PHPUnit\Framework\TestCase;

class BungalowTest extends TestCase {
    private $bungalow;
    private $pdoMock;

    protected function setUp():void {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->bungalow = new Bungalow($this->pdoMock);
    }

    public function testGetBungalowById(){
        
    }
}