<?php

namespace Model;

class Proposal
{
    protected $storage;
    public $hash; // "Druhá třída bude pojmenovaná ProposalStorage, v konstruktoru přijímající jako parametr hash" – – – jak by mohla class Storage (či File) v konstruktoru přijímat jako parametr hash, kdyby zde byl protected?
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
          return $this->hash;
          $this->hashGenerated = 1;
        }
        //kde je deklarovaná $this->hash ?? … nově v v úvodu třídy
        //co když tuto fci zavolám na stejném proposal dvakrát? … podruhé se nic nestane
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
