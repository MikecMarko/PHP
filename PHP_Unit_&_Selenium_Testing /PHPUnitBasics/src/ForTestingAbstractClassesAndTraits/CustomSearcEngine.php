<?php

class CustomSearcEngine
{
    public function __construct($googleSearch)
    {
        $this->googleSearch = $googleSearch;
    }

    public function doStuff()
    {
        $this->googleSearch->doGoogleSearch(

        );
    }
}