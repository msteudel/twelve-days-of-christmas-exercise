<?php

class TwelveDaysOfChristmasLyrics implements Template
{
    private $template = 'On the %s day of Christmas my true love gave to me: %s';

    private $lyrics = [
        'A partridge in a pear tree',
        'Two turtle doves',
        'Three French hens',
        'Four calling birds',
        'Five gold rings',
        'Six geese a laying',
        'Seven swans a swimming',
        'Eight maids a milking',
        'Nine ladies dancing',
        'Ten lords a leaping',
        'Eleven pipers piping',
        'Twelve drummers drumming'
    ];

    /**
     * @param integer $day
     *
     * @return string
     */
    public function getLyric($day)
    {
        try {
            $numberSpelledOut = $this->convertNumberToWord($day);
            $giftText = $this->getLyricText($day);

            return sprintf($this->template, $numberSpelledOut, $giftText);
        } catch (Exception $e) {
            // maybe some sort of logging here

            return false;
        }
    }

    private function convertNumberToWord($number)
    {
        // @todo - this would be cleaner, but wasn't installed locally
        // $numberFormatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        // return $numberFormatter->format($number);
        $numberMapping = [
            'first',
            'second',
            'third',
            'fourth',
            'fifth',
            'sixth',
            'seventh',
            'eighth',
            'ninth',
            'tenth',
            'eleventh',
            'twelfth'
        ];

        $adjustValue = $number - 1;

        if (isset($numberMapping[$adjustValue])) {
            return $numberMapping[$number - 1];
        }

        throw new Exception('number mapping not found');
    }

    private function getLyricText($day)
    {
        if ($day > 12 || $day < 1) {
            throw new Exception('invalid day must be between 1 and 12');
        }

        $adjustedValue = $day - 1;
        $lyric = $this->lyrics[$adjustedValue];
        if ($day > 1) {
            $adjustedValue--;
            for ($i = $adjustedValue; $i >= 0; $i--) {
                if ($i >= 1) {
                    $lyric .= ', ' . $this->lyrics[$i];
                } else {
                    $lyric .= ' and ' . $this->lyrics[$i];
                }

            }
        }
        return $lyric;
    }
}