<?php

trait CustomAssertionTrait {
    public function assertArrayData(array $array) {

        foreach (['nicke', 'email', 'age'] as $key) {
            $this->assertArrayHasKey($key, $array, "Array doesnt contain the $key key");
        }

        $this->assertIsString($array['nicke'], 'Nicke field must be a string');

        //$this->assertRegExp('asdsad');

        $this->assertIsInt($array['age'], 'Age field must be an integer');
    }
}