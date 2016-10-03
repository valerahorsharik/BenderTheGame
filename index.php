<?php

define("S", "SOUTH");
define("E", "EAST");
define("N", "NORTH");
define("W", "WEST");
define("DIRECTION_CHANGER", ["S", "N", "E", "W"]);

class Bender {

    public $moveDirection = [S => E, E => N, N => W, W => S];
    public $map = [
        0 => "########",
        1 => "#@    T#",
        2 => "#      #",
        3 => "#   T$ #",
        4 => "########",
    ];
    public $test = " ";
    public $benderPositionX;
    public $benderPositionY;
    public $benderDirection = S;
    public $breaker = false;
    public $teleport = [];

    // Find Bender Position, marked as @
    public function findBender() {
        for ($i = 0; $i < count($this->map); $i++) {
            for ($j = 0; $j < strlen($this->map[$i]); $j++) {
                if ($this->map[$i][$j] == "@") {
                    $this->benderPositionX = $j;
                    $this->benderPositionY = $i;
                    echo " its Bender, and im on X " . $this->benderPositionX . " and Y " . $this->benderPositionY . ". <br/>";
                }
            }
        }
    }

    //Check out Bender position for all conditions
    public function checkPosition() {
        $position = $this->map[$this->benderPositionY][$this->benderPositionX];
        switch ($position) {
            case "#":
                $this->benderDirection = $this->moveDirection[$this->benderDirection];
                break;
            case "X":
                if ($this->breaker) {
                    $this->breaker = false;
                } else {
                    $this->benderDirection = $this->moveDirection[$this->benderDirection];
                }
                break;
            case "B":
                if ($this->breaker) {
                    $this->breaker = false;
                } else {
                    $this->breaker = true;
                }

                break;
            case "T":
                //find second Tp and Change currentPosition;
                $this->teleport();
                break;
            case "I":
                $this->moveDirection = array_flip($this->moveDirection);
                break;
            case "S":
                $this->benderDirection = S;
                break;
            case "E":
                $this->benderDirection = E;
                break;
            case "N":
                $this->benderDirection = N;
                break;
            case "W":
                $this->benderDirection = W;
                break;
            default:
                break;
        }
    }

    public function moveBender() {
        switch ($this->benderDirection) {
            case S:
                $this->benderPositionY++;

                break;
            case N:
                $this->benderPositionY--;

                break;
            case W:
                $this->benderPositionX--;

                break;
            case E:
                $this->benderPositionX++;

                break;

            default:
                break;
        }
        if ($this->map[$this->benderPositionY][$this->benderPositionX] == " ") {
            $this->test = " empty cell";
        } else {
            $this->test = $this->map[$this->benderPositionY][$this->benderPositionX];
        }
        echo "Can i move on " . $this->test . " ?<br/>";
    }

    public function find() {
        var_dump($this->map[3][3]);
    }

    //find teleports , marked as "T" and telepot Bender.
    public function teleport() {
        for ($i = 0; $i < count($this->map); $i++) {
            for ($j = 0; $j < strlen($this->map[$i]); $j++) {
                if ($this->map[$i][$j] == "T") {
                    if (($j !== $this->benderPositionX) && ($i !== $this->benderPositionY)) {
                        //   echo "I $testvar will port on  X = " . $j . " and Y = " . $i . "<br/>";
                        //     $this->benderPositionX = $j;
                        //      $this->benderPositionY = $i;
                    }
                    ////else {
                    //echo "I $testvar will port on  X = " . $j . " and Y = " . $i . "<br/>";
                    //}
//                    $this->teleport[] = ["X"=>$j,"Y"=>$i];
//              
//                  echo " its " . $testvar . ", and im on " . $i . " and " . $j . ". <br/>";
                    //    $testvar++;
                }
            }
        }
    }

}

$pos = "N";
$Bender = New Bender();
var_dump($Bender->map);
print_r(DIRECTION_CHANGER);
if (in_array($pos, DIRECTION_CHANGER)) {
    echo "Yeee<br/>";
}
$Bender->findBender();

$Bender->benderPositionX = 6;
$Bender->benderPositionY = 1;
$Bender->teleport();
//foreach($Bender->teleport as $position){
//    if (($position["X"] == $Bender->benderPositionX) && ($position["Y"] == $Bender->benderPositionY)){
//        echo "This teleport on my position with coords X = " . $position["X"] . " and Y = " . $position["Y"] . "<br/>";
//    } else {
//        echo "I will port on  X = " . $position["X"] . " and Y = " . $position["Y"] . "<br/>";
//    }
//}
var_dump($Bender->teleport);
$Bender->moveBender();
$Bender->moveBender();
$Bender->moveBender();

?>