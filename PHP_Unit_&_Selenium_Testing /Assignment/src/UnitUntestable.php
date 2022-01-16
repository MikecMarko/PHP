<?php

/**
 * Do not change this class. This is only for simulating the enviromnent.
 */
class DataSource {

    public $data = [

        'Albert Einstein' => [
            '"Insanity: doing the same thing over and over again and expecting different results."',
            '"Imagination is more important than knowledge."',
            '"Two things are infinite: the universe and human stupidity; and I\'m not sure about the universe."'
        ],

        'Pope John Paul II' => [
            '"Do not abandon yourselves to despair. We are the Easter people and hallelujah is our song."',
            '"The future starts today, not tomorrow."',
            '"As the family goes, so goes the nation and so goes the whole world in which we live."'
        ],

        'Bill Gates' => [
            '"Success is a lousy teacher. It seduces smart people into thinking they can\'t lose."',
            '"Your most unhappy customers are your greatest source of learning."',
            '"It\'s fine to celebrate success but it is more important to heed the lessons of failure."'
        ]
    ];

    public function fetchQuote($person)
    {
        $random = mt_rand(0,2);
        return $this->data[$person][$random];
    }
}


/**
 * This is the class that you should refactor so that the entire internal logic is fully covered by unit test. You must not change the class functionality. It must work 100% the same.
 */
class UnitUntestable {

    public function getRandomQoute()
    {
        $body = 'Today the quote from ';

        $random = mt_rand(0,2);
        if($random == 0) $body .= 'one the famous physicist '.$person='Albert Einstein';
        elseif($random == 1) $body .= 'head of the Catholic Church and sovereign of the Vatican City '.$person='Pope John Paul II';
        elseif($random == 2) $body .= 'the co-founder of Microsoft Corporation '.$person='Bill Gates';

        $quotes = new DataSource;
        $quote = $quotes->fetchQuote($person);

        return $body.': '.$quote;

    }
}


// example usage:
$obj = new UnitUntestable();
echo $obj->getRandomQoute();