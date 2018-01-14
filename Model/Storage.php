<?php

namespace Model;

class Storage
{
    /** @var string  */
    public $toDir = "";

    function __construct(String $hash)
    {
        $this->setDir($hash);
    }

    private function setDir(string $hash)
    {
        $this->toDir = $this->toDir . "/" . $hash;
        if (!file_exists($this->toDir)) {
            mkdir("$this->toDir", 0777, true);
        }
        return $this->toDir;
    }
}
