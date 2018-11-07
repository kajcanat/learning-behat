<?php
class Calculus
{
    private $number1;
    private $number2;
    private $number3;
    public $sum;

    public function setNumbers($num1, $num2) {
        $this->number1 = $num1;
        $this->number2 = $num2;
    }

    public function setThirdNumber($num)
    {
        $this->number1 = $this->number1 + $num;
    }

    public function add () {
        $this->sum = $this->number1 - $this->number2;
    }

    public function display() {
        return $this->sum;
    }
}