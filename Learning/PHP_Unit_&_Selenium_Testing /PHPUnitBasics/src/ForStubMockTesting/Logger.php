<?php

namespace forStubMockTesting;

class Logger
{
    public function log ($messaageType, $message) {
        echo 'real Logger executed';
    }


}