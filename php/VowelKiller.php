<?php

class VowelKiller
{

    private $input = '';
    private $output = '';

    public function __construct($string)
    {
        $this->input = trim($string);
    }

    public function filterAndReverse()
    {
        if (!$this->input) {
            return;
        }

        for ($i = strlen($this->input) - 1; $i >= 0; $i--) {
            $this->output .= !$this->isVowel($this->input[$i]) ? $this->input[$i] : '';
        }
    }

    private function isVowel($letter)
    {
        $vowels = ['a', 'e', 'i', 'o', 'u', 'y'];

        return in_array(strtolower($letter), $vowels);
    }

    public function getOutput()
    {
        return $this->output;
    }

}
