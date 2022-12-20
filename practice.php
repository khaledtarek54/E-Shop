<?php
    interface animal{
        public function makesound();
    }


    class dog implements animal{
        public function makesound()
        {
            echo "haw haw";
        }
    }

    class cat implements animal{
        public function makesound()
        {
            echo "naw naw";
        }
    }


    $animal  = new dog();
    $animal->makesound();
    $animal = new cat();
    $animal->makesound();
?>