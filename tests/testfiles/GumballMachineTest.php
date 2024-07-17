<?php
use PHPUnit\Framework\TestCase;
require 'GumballMachine.php';

class GumballMachineTest extends TestCase {

    public $gumballMachineInstance2;

    public function setUp(): void {
        $this->gumballMachineInstance2 = new GumballMachine();
    }

    public function testInitialGumballs() {
        $this->assertEquals(null, $this->gumballMachineInstance2->getGumballs(), "Initial gumballs should be null");
    }

    public function testSetAndGetGumballs() {
        $this->gumballMachineInstance2->setGumballs(10);
        $this->assertEquals(10, $this->gumballMachineInstance2->getGumballs(), "Gumballs should be 10 after setting to 10");

        $this->gumballMachineInstance2->setGumballs(5);
        $this->assertEquals(5, $this->gumballMachineInstance2->getGumballs(), "Gumballs should be 5 after setting to 5");
    }

    public function testTurnWheel() {
        $this->gumballMachineInstance2->setGumballs(10);
        $this->gumballMachineInstance2->turnWheel();
        $this->assertEquals(8, $this->gumballMachineInstance2->getGumballs(), "Gumballs should be 8 after turning wheel once");

        $this->gumballMachineInstance2->turnWheel();
        $this->assertEquals(6, $this->gumballMachineInstance2->getGumballs(), "Gumballs should be 6 after turning wheel twice");
    }

    public function testTurnWheelWithInsufficientGumballs() {
        $this->gumballMachineInstance2->setGumballs(1);
        $this->gumballMachineInstance2->turnWheel();
        $this->assertEquals(-1, $this->gumballMachineInstance2->getGumballs(), "Gumballs should be -1 after turning wheel with 1 gumball");

        $this->gumballMachineInstance2->setGumballs(0);
        $this->gumballMachineInstance2->turnWheel();
        $this->assertEquals(-2, $this->gumballMachineInstance2->getGumballs(), "Gumballs should be -2 after turning wheel with 0 gumballs");
    }
}