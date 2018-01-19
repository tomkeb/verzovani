<?php

namespace Model;

class Storage
{
    /** @var string */
    protected $toDir = "hokusypokusy";

    public function __construct(String $hash)
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

    public function getPath($filename): string
    {
        return $this->getBaseDir() . DIRECTORY_SEPARATOR . $filename;
    }

    public function getBaseDir(): string
    {
        return $this->toDir;
    }
}
