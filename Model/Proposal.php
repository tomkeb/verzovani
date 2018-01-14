<?php

namespace Model;

class Proposal
{
    protected $storage;
    public $hash;
    protected $hashGenerated = 0;

    function __construct($fileToUpload, $user)
    {
      $this->file = $fileToUpload;
      $this->user = $user;
      $this->getHash();
    }

    private function getHash()
    {
        if ($this->hashGenerated == 0)
        {
          $this->hash = hash('md5', $this->file);
          $this->hashGenerated = 1;
          return $this->hash;
        }
    }

    protected function setStorage()
    {
        $this->storage = [$_SERVER["REQUEST_TIME_FLOAT"], $_SERVER["REMOTE_ADDR"], $this->user];
    }

    protected function getStorage()
    {
        return $this->storage;
    }
}
