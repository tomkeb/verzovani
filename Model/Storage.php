<?php

namespace Model;

class Storage
{
    public function __construct($hash)
    {
        $this->setDir($hash);
    }

    private function setDir($hash)
    {
        $hash = strval($hash);
        $this->toDir = "nahrane/" . $hash; //co je  $this->toDir ? - třídní proměnné musíš napřed deklarovat
        if (!file_exists($this->toDir)) {
            mkdir($this->toDir, 0777, true);
        }
        return $this->toDir;
    }
}