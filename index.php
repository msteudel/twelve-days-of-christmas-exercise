<?php

require_once 'src/Song.php';
require_once 'src/Template.php';
require_once 'src/TwelveDaysOfChristmasLyrics.php';
require_once 'src/TwelveDaysOfChristmas.php';

$song = new TwelveDaysOfChristmas(new TwelveDaysOfChristmasLyrics());

$song->getLyrics();