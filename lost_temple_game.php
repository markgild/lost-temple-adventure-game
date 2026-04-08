<?php
/********************************************
Author: Mark Borysenko
Date:2026.26.03
Description: Opdracht Adventure Game
Version: 1.0
ASCII: From internet and AI
********************************************/














// SPOILERS 
// SPOILERS 
// SPOILERS 
// SPOILERS 
// SPOILERS 








//ASCII files

// \n is to make another string

// \\ is to make only one \, so \\\n is just \ and make another string

//for jungle
$Jungle_Path =  "       ^   ^   ^\n" .
                "      ^   ^ ^   ^\n" .
                "       ||     ||\n" .
                "    ___||_____||___\n" .
                "   /               \\\n" .
                "  /   JUNGLE PATH   \\\n" .
                " /___________________\\\n";

// <<<ART ....... ART; is to make ASCII art without . and \n
// for chest when you win
$chest = <<<ART
                 _.--.
            _.-'_:-'||
        _.-'_.-::::'||
   _.-:'_.-::::::'  ||
 .'`-.-:::::::'     ||
/.'`;|:::::::'      ||_
||   ||::::::'     _.;._'-._
||   ||:::::'  _.-!oo @.!-._'-.
\'.  ||:::::.-!()oo @!()@.-'_.|
 '.-;|:.-'.&$@.& ()$%-'o.'\U||
   `>'-.!@%()@'@_%-'_.-o _.|'||
    ||-._'-.@.-'_.-' _.-o  |'||
    ||=[ '-._.-\U/.-'    o |'||
    || '-.]=|| |'|      o  |'||
    ||      || |'|        _| ';
    ||      || |'|    _.-'_.-'
    |'-._   || |'|_.-'_.-'
    '-._'-.|| |' `_.-'
         '-.||_/.-'
ART;

// ascii when GAME OVER
$death = <<<ART
 ____  ____   ___   _____  _____   ______   _____  ________  ______    
|_  _||_  _|.'   `.|_   _||_   _| |_   _ `.|_   _||_   __  ||_   _ `.  
  \ \  / / /  .-.  \ | |    | |     | | `. \ | |    | |_ \_|  | | `. \ 
   \ \/ /  | |   | | | '    ' |     | |  | | | |    |  _| _   | |  | | 
   _|  |_  \  `-'  /  \ \__/ /     _| |_.' /_| |_  _| |__/ | _| |_.' / 
  |______|  `.___.'    `.__.'     |______.'|_____||________||______.'  
                                                                       
ART;

// ascii when you have GOOD END, it's when not WIN and not GAME over at the same time
$safe = <<<ART
        /\ 
       /  \ 
      /____\ 
     |      |
     |TEMPLE|
     |      |
    /|______|\
   /  /____\  \

You walk away from the temple...

        ~  ~   ~
     ~           ~
  ~      EXIT      ~
     ~           ~
        ~  ~   ~

You made it out safely.
ART;

// special ascii for ending with crocodiles
$crocodile = <<<ART
            .-._   _ _ _ _ _ _ _ _
 .-''-.__.-'00  '-' ' ' ' ' ' ' ' '-.
'.___ '    .   .--_'-' '-' '-' _'-' '._
 V: V 'vv-'   '_   '.       .'  _..' '.'.
   '=.____.=_.--'   :_.__.__:_   '.   : :
           (((____.-'        '-.  /   : :
                             (((-'\ .' /
                           _____..'  .'
                          '-._____.-'
ART;


// this function is do every line with sleep
// sleep is time to wait, so it makes game more real
// to switch everything line printT in VS Code: press Ctrl + F, then type printT in first line
// on second line type on what you to switch
function printT($tekst) {
    // "%s" is a string type, if in tekst going to be %s it wil makes errors
    // s is a string then teskt is what need to print
    printf("%s", $tekst);
    sleep(1); // to make works without waiting switch 1 to 0
}

// to make choices without errors
function askChoice2($tekst) { // tekst is tekst from readline
    $choice = readline($tekst); // player needs to type smth
    // while loop. IF $choice is 1 or 2 it not going to work
    // if thms else exept 1 or 2 it going to print ask to print it again
    // it's going to ask untill you type exactly 1 or 2 
    while ($choice != 1 && $choice != 2) {
        printT("Invalid input! Please enter 1 or 2.\n");
        $choice = readline($tekst);
    }

    return $choice; // the result
}

// the main code of the game
function main() {

    // makes all ascii's work in main function
    global $Jungle_Path, $chest, $death, $safe, $crocodile;
    
    // begin of the game
    printT("\n\n=== THE LOST TEMPLE ===\n\n");

    // first ascii
    printT("\n$Jungle_Path\n");
    printT("You stand at the edge of a dense jungle. The air is warm and heavy, and you can hear strange sounds coming from deep within.\n");
    printT("Legends say a hidden temple lies somewhere inside...\n");
    printT("\n");

    // choose smth from it
    printT("1 - Enter the Jungle\n");
    printT("2 - Follow the River\n");
    printT("3 - Climb the Hill\n");

    printT("\n");
    $choice_main = readline("What do you choose?(1, 2 or 3): ");

    // the same as askChoise2 but with 3 values
    // it makes without function bxecause it make choice with 3 values 
    // it appears only one time in the game
    while ($choice_main != 1 && $choice_main != 2 && $choice_main != 3) {
        printT("Invalid choice! Please enter 1, 2 or 3.\n");
        $choice_main = readline("Choose 1, 2 or 3: ");
    }

    // to make visual understand that it's end of a part of the game
    printT("\n========================================================================================\n\n");
    

    // if to make happens more than 1 possible results
    if ($choice_main == 1) {
        printT("You step into the jungle. Thick vines and tall trees surround you. After a while, you discover a dark cave hidden behind bushes.\n\n");
        printT("1 - Enter the cave\n");
        printT("2 - Walk past the cave\n");
        printT("\n");
        $choice_cave = askChoice2("What do you choose?(1 or 2): "); // use only function so it no need to make every time 5 lines
        printT("\n========================================================================================\n\n");
        if ($choice_cave == 1) {
            printT("The cave is silent and cold. A strange smell fills the air.\n");
            printT("\n");

            printT("1 - Light a torch\n");
            printT("2 - Go in blindly\n");
            printT("\n");
            $choice_torch = askChoice2("Do you dare to enter?(1 or 2): ");
            printT("\n========================================================================================\n\n");
            if ($choice_torch == 1) {
                printT("You light a torch. The cave slowly reveals its secrets.\n");
                printT("On the wall, you see ancient markings leading you deeper inside.\n");
                printT("After a long walk, you find a hidden treasure chest filled with gold!\n");
                printT("You survived and became rich!\n");

                printT("\n=== YOU WIN ===\n");
                printf("%s\n", $chest); // print win ascii 
            } elseif ($choice_torch == 2) { // elseif is not to use power than it's needed
                printT("You walk into the darkness without light...\n");
                printT("Suddenly, the ground disappears beneath your feet.\n");
                printT("You fall into a deep pit.\n");
                printT("No one will ever find you here...\n");

                printT("\n=== GAME OVER ===\n"); // print game over ascii 
                printf("%s\n", $death);
            }

        } elseif ($choice_cave == 2) {
            printT("You decide to ignore the cave and continue walking.\n");
            printT("Hours pass... then days...\n");
            printT("You get lost in the jungle and run out of food.\n");
            printT("The jungle claims another victim.\n");

            printT("\n=== GAME OVER ===\n");
            printf("%s\n", $death);
        }
    } elseif ($choice_main == 2) {
        printT("You follow the sound of flowing water and reach a wide river.\n");
        printT("The current is strong, and you notice an old wooden boat tied to a tree.\n\n");
        printT("1 - Use the boat\n");
        printT("2 - Swim across\n");
        printT("\n");
        $choice_boat = askChoice2("What do you choose?(1 or 2): ");
        printT("\n========================================================================================\n\n");
        if ($choice_boat == 1) {
            printT("You carefully step into the boat and drift across the river.\n");
            printT("On the other side, you see the entrance of an ancient temple.\n");
            printT("\n");
            printT("1 - Enter temple\n");
            printT("2 - Stay outside\n");
            printT("\n");
            $choice_enter_temple_boat = askChoice2("Do you dare to enter?(1 or 2): ");
            printT("\n========================================================================================\n\n");
            if ($choice_enter_temple_boat == 1) {
                printT("The temple is quiet... too quiet.\n");
                printT("Inside, you see a glowing artifact on a stone pedestal.\n");
                printT("\n");
                printT("1 - Take artifact\n");
                printT("2 - Leave it\n");
                printT("\n");
                $choice_artifact = askChoice2("What do you choose?(1 or 2): ");
                printT("\n========================================================================================\n\n");
                if ($choice_artifact == 1) {
                    printT("You grab the artifact.\n");
                    printT("The ground starts shaking violently.\n");
                    printT("The temple begins to collapse!\n");
                    printT("You try to escape, but it's too late...\n");

                    printT("\n=== GAME OVER ===\n");
                    printf("%s\n", $death);
                } elseif ($choice_artifact == 2) {
                    printT("You decide not to risk it.\n");
                    printT("Some treasures are better left untouched.\n");
                    printT("You leave the temple safely, with your life.\n");

                    printT("\n=== GOOD END ===\n"); // print good end ascii
                    printf("%s\n", $safe);
                }
            } elseif ($choice_enter_temple_boat == 2) {
                printT("You hesitate and decide to stay outside.\n");
                printT("Suddenly, the ground beneath you cracks open.\n");
                printT("You fall into the darkness below.\n");

                printT("\n=== GAME OVER ===\n");
                printf("%s\n", $death);
            }
        } elseif ($choice_boat == 2) {
            printT("You jump into the river.\n");
            printT("The water is freezing...\n");
            printT("Suddenly, something grabs your leg.\n");
            printT("Crocodiles pull you under.\n");

            printT("\n=== GAME OVER ===\n");
            printf("%s\n", $crocodile);
        }
    } elseif ($choice_main == 3) {
        printT("You climb a steep hill. From the top, you can see the entire jungle.\n");
        printT("In the distance, you spot the hidden temple.\n");
        printT("\n");
        printT("1 - Go directly\n");
        printT("2 - Go back\n");
        printT("\n");
        $choice_hill_directly = askChoice2("What do you choose?(1 or 2): ");
        printT("\n========================================================================================\n\n");
        if ($choice_hill_directly == 1) {
            printT("Using your view from above, you navigate safely toward the temple.\n");
            printT("You avoid all dangers and traps.\n");
            printT("\n");
            printT("1 - Enter carefully\n");
            printT("2 - Rush inside\n");
            printT("\n");
            $choice_hill_enter_carefully = askChoice2("Do you dare to enter?(1 or 2): ");
            printT("\n========================================================================================\n\n");
            if ($choice_hill_enter_carefully == 1) {
                printT("You move slowly and carefully inside the temple.\n");
                printT("You avoid traps and reach the artifact safely.\n");
                printT("You take it without triggering anything.\n");
                printT("You are now a legendary explorer!\n");

                printT("\n=== YOU WIN ===\n");
                printf("%s\n", $chest);
            } elseif ($choice_hill_enter_carefully == 2) {
                printT("You rush inside without thinking.\n");
                printT("You hear a click...\n");
                printT("Arrows shoot from the walls.\n");
                printT("Everything goes dark.\n");

                printT("\n=== GAME OVER ===\n");
                printf("%s\n", $death);
            }
        } elseif ($choice_hill_directly == 2) {
            printT("You decide it's too dangerous.\n");
            printT("You leave the jungle safely.\n");
            printT("Maybe some mysteries are better left unsolved.\n");

            printT("\n=== GOOD END ===\n");
            printf("%s\n", $safe);
        }
    }
}

// main game function so it wil not ends but wil give you oportunity to play game on more time
$game_main = true; // variable for while loop
while ($game_main) {
    main(); // game
    // if you press enter or anathynig exept q it's going to play again
    $again = readline("\nPress ENTER to play again or type 'q' to quit: "); 

    // if press q it's going to stop the game
    if ($again == "q") {
        $game_main = false;
    }
}

?>