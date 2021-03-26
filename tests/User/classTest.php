<?php
    require_once ('vendor\phpunit\phpunit\src\Framework\TestCase.php');
    require_once ("complexNumOp.php");

    use \PHPUnit\Framework\TestCase;

    class testComplexNum extends TestCase{
        private $A;

        protected function setUp() : void {
            $this->A = new ComplexNumOp(3, 1, 5, -2);
        }

        protected function tearDown() : void {

        }

        public function testSum(){
            $this->assertSame("Результат: 8 - i", $this->A->sum());
        }


        public function testSub(){
            $this->assertSame("Результат: -2 + 3i", $this->A->subtract());
        }


        public function testMulti(){
            $this->assertSame("Результат: 17 - i", $this->A->multiplicate());
        }


        public function testDiv(){
            $this->assertSame("Результат: (13 + 11i) / 29", $this->A->divide());
        }
    }
?>
