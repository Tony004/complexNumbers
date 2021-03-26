<?php
    class ComplexNumOp{
        private $a1;
        private $b1;
        private $a2;
        private $b2;

        //Конструктор
        public function __construct($a1, $b1, $a2, $b2){
            $this->a1 = $a1;
            $this->b1 = $b1;
            $this->a2 = $a2;
            $this->b2 = $b2;
        }

        //Сложение
        public function sum(){
            if($this->checkInputs()){
                $realPart = $this->a1 + $this->a2;
                $imagPart = $this->b1 + $this->b2;

                $result = $this->assembleResult($realPart, $imagPart);

                return "Результат: $result";
            }
            else{
                return "Ошибка в введенных данных.";
            }
        }

        //Вычитание
        public function subtract(){
            if($this->checkInputs()){
                $realPart = $this->a1 - $this->a2;
                $imagPart = $this->b1 - $this->b2;

                if($realPart == 0 && $imagPart != 0){
                    $result = $imagPart."i";
                }
                elseif($imagPart == 0 && $realPart != 0){
                    $result = $realPart;
                }
                elseif($realPart == 0 && $imagPart == 0){
                    $result = 0;
                }
                else{
                    $result = $this->assembleResult($realPart, $imagPart);
                }

                return "Результат: $result";
            }
            else{
                return "Ошибка в введенных данных.";
            }
        }

        //Умножение
        public function multiplicate(){
            if($this->checkInputs()){
                $a1 = $this->a1;
                $a2 = $this->a2;
                $b1 = $this->b1;
                $b2 = $this->b2;

                $realPart = ($a1*$a2 - $b1*$b2);
                $imagPart = ($a1*$b2 + $a2*$b1);

                if($realPart == 0){
                    $result = $imagPart."i";
                }
                else{
                    $result = $this->assembleResult($realPart, $imagPart);
                }

                return "Результат: $result";
            }
            else{
                return "Ошибка в введенных данных.";
            }
        }

        //Деление
        public function divide(){
            if($this->checkInputs()){
                $a1 = $this->a1;
                $a2 = $this->a2;
                $b1 = $this->b1;
                $b2 = $this->b2;

                $realPart = ($a1*$a2 + $b1*$b2);
                $imagPart = ($a2*$b1 - $a1*$b2);
                $divPart = pow($a2, 2) + pow($b2, 2);

                $divCheck1 = $realPart % $divPart;
                $divCheck2 = $imagPart % $divPart;

                if($divCheck1 == 0 && $divCheck2 == 0){
                    $realPart = $realPart / $divPart;
                    $imagPart = $imagPart / $divPart;
                }

                $topPart = $this->assembleResult($realPart, $imagPart);

                if($realPart == 0 && $imagPart == 0){
                    $result = 0;
                }
                else{
                    $result = "Результат: ($topPart) / $divPart";
                }

                return $result;
            }
            else{
                return "Ошибка в введенных данных.";
            }
        }

        //Составление ответа в 1 строку
        private function assembleResult($realPart, $imagPart){
            if($imagPart > 0)
             $result = $realPart." + ".$imagPart."i";
            elseif($imagPart == 1)
             $result = $realPart." + i";
            elseif($imagPart == -1)
             $result = $realPart." - i";
            elseif($imagPart < 0)
             $result = $realPart." - ".$imagPart * (-1)."i";

             return $result;
        }

        //Проверка введенных данных
        private function checkInputs(){
            $check1 = is_numeric($this->a1);
            $check2 = is_numeric($this->b1);
            $check3 = is_numeric($this->a2);
            $check4 = is_numeric($this->b2);

            if($check1 && $check2 && $check3 && $check4){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>
