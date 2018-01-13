<?php

namespace Model;

class Storage
{
    public $toDir;

    function __construct($hash, $toDir)
    {
        $this->toDir = $toDir;
        $this->setDir($hash);
    }

    private function setDir($hash)
    {
        $hash = strval($hash);
        $this->toDir = $this->toDir . "/" . $hash;
        if (!file_exists($this->toDir)) {
            mkdir("$this->toDir", 0777, true);
        }
        return $this->toDir;
    }
}
