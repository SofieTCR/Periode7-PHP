<?php
    namespace Opdracht8\classes;

    use Opdracht8\classes\Dice;

    class Game {
        private array $dice;
        private int $numberDice;

        public function __construct(int $pNumberDice, int $pNumberSides = 6) {
            $numberDice = $pNumberDice;
            Dice::setNumberSides($pNumberSides);
            $dice[] = new Dice();

            $dice[0]->rollDice();
            echo($dice[0]->getFaceSVG());
        }
    }
?>