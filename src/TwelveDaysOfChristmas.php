<?php

class TwelveDaysOfChristmas implements Song
{
    private $template;

    function __construct(Template $template)
    {
        $this->template = $template;
    }

    public function getLyrics()
    {
        for ($i = 1; $i <= 12; $i++) {
            echo $this->template->getLyric($i) . PHP_EOL;
        }
    }

    public function getLyric($day)
    {
        if ($day < 1 || $day > 12) {
            throw new Exception('invalid day');
        }

        return $this->template->getLyric($day);
    }
}