<?php

namespace Model;

class Storage
{
    /** @var string  */
    protected $toDir = "";

    function __construct(String $hash)
    {
        $this->setDir($hash);
    }

    protected function setDir(string $hash)
    {
        $this->toDir = $this->toDir . DIRECTORY_SEPARATOR . $hash;
        if (!file_exists($this->toDir)) {
            mkdir("$this->toDir", 0777, true);
        }
        return $this;
    }
}
