<?php

use PHPUnit\Framework\TestCase;

class GumballMachineTest extends TestCase {

    private $gumballMachine;

    protected function setUp(): void {
        $this->gumballMachine = new GumballMachine();
    }

    public function testInitialGumballs() {
        $this->assertEquals(null, $this->gumballMachine->getGumballs(), "Initial gumballs should be null");
    }

    public function testSetAndGetGumballs() {
        $this->gumballMachine->setGumballs(10);
        $this->assertEquals(10, $this->gumballMachine->getGumballs(), "Gumballs should be 10 after setting to 10");

        $this->gumballMachine->setGumballs(5);
        $this->assertEquals(5, $this->gumballMachine->getGumballs(), "Gumballs should be 5 after setting to 5");
    }

    public function testTurnWheel() {
        $this->gumballMachine->setGumballs(10);
        $this->gumballMachine->turnWheel();
        $this->assertEquals(8, $this->gumballMachine->getGumballs(), "Gumballs should be 8 after turning wheel once");

        $this->gumballMachine->turnWheel();
        $this->assertEquals(6, $this->gumballMachine->getGumballs(), "Gumballs should be 6 after turning wheel twice");
    }

    public function testTurnWheelWithInsufficientGumballs() {
        $this->gumballMachine->setGumballs(1);
        $this->gumballMachine->turnWheel();
        $this->assertEquals(-1, $this->gumballMachine->getGumballs(), "Gumballs should be -1 after turning wheel with 1 gumball");

        $this->gumballMachine->setGumballs(0);
        $this->gumballMachine->turnWheel();
        $this->assertEquals(-2, $this->gumballMachine->getGumballs(), "Gumballs should be -2 after turning wheel with 0 gumballs");
    }
}