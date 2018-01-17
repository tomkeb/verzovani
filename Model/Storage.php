<?php

namespace Model;

class Storage
{
    /** @var string  */
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

    public function upload(array $filesPaths)
    {
      foreach ($filesPaths as $key => $value) {
        file_put_contents($this->toDir . DIRECTORY_SEPARATOR . $filesPaths[$key], file_get_contents($filesPaths[$key]));
      }
    }
}
