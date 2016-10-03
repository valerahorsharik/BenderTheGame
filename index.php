<?php

DEFINE("S", "SOUTH");
DEFINE("E", "EAST");
DEFINE("N", "NORTH");
DEFINE("W", "WEST");
define("DIRECTION_CHANGER", ["S", "N", "E", "W"]);

class Bender {

    public static $moveDirection = [S => E, E => N, N => W, W => S];
    public static $array = [
        0 => "#####",
        1 => "#@  #",
        2 => "#   #",
        3 => "#  $#",
        4 => "#####",
    ];
    public static $test = " ";
    public static $benderPositionX;
    public static $benderPositionY;
    public static $benderDirection = S;
    public static $breaker = false;

    // Find Bender Position, marked as @
    public static function findBender() {
        for ($i = 0; $i < count(self::$array); $i++) {
            for ($j = 0; $j < strlen(self::$array[$i]); $j++) {
                // echo self::$array[$i][$j];
                if (self::$array[$i][$j] == "@") {
                    self::$benderPositionX = $j;
                    self::$benderPositionY = $i;
                    echo " its Bender, and im on " . Bender::$benderPositionY . " and " . Bender::$benderPositionX . ". <br/>";
                }
            }
        }
    }

    //Check out Bender position for all conditions
    public static function checkPosition() {
        $position = self::$array[self::$benderPositionY][self::$benderPositionX];
        switch ($position) {
            case "#":
                self::$benderDirection=self::$moveDirection[self::$benderDirection];
                break;
            case "X":
                self::$benderDirection=self::$moveDirection[self::$benderDirection];
                break;
            case "B":
                self::$breaker = true;
                break;
            case "T":
                
                break;
            case "I":
                
                break;
            case "S":
                
                break;
            case "E":
                
                break;
            case "N":
                
                break;
            case "W":
                
                break;
            default:
                break;
        }
    }

    public static function moveBender() {
        switch (self::$benderDirection) {
            case S:
                self::$benderPositionY++;

                break;
            case N:
                self::$benderPositionY--;

                break;
            case W:
                self::$benderPositionX--;

                break;
            case E:
                self::$benderPositionX++;

                break;

            default:
                break;
        }
        if (self::$array[self::$benderPositionY][self::$benderPositionX] == " ") {
            self::$test = " empty cell";
        } else {
            self::$test = self::$array[self::$benderPositionY][self::$benderPositionX];
        }
        echo "Can i move on " . self::$test . " ?<br/>";
    }

    public static function find() {
        var_dump(self::$array[3][3]);
    }

}

$pos = "N";
var_dump(Bender::$array);
var_dump(Bender::$moveDirection);
Bender::$moveDirection = array_flip(Bender::$moveDirection);
var_dump(Bender::$benderDirection);
Bender::$benderDirection=Bender::$moveDirection[Bender::$benderDirection];
var_dump(Bender::$benderDirection);
Bender::$benderDirection=Bender::$moveDirection[Bender::$benderDirection];
var_dump(Bender::$benderDirection);
Bender::$benderDirection=Bender::$moveDirection[Bender::$benderDirection];
var_dump(Bender::$benderDirection);
Bender::$benderDirection=Bender::$moveDirection[Bender::$benderDirection];
var_dump(Bender::$benderDirection);
Bender::$benderDirection=Bender::$moveDirection[Bender::$benderDirection];
var_dump(Bender::$benderDirection);
print_r(DIRECTION_CHANGER);
if (in_array($pos, DIRECTION_CHANGER)) {
    echo "Yeee<br/>";
}
Bender::findBender();


Bender::moveBender();
Bender::moveBender();
Bender::moveBender();

$files = scandir(__DIR__);
var_dump($files);
?>