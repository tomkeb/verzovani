<?php

namespace Model;

class Proposal
{
    protected $storage;
    protected $hash = NULL;

    function __construct($fileToUpload, $user)
    {
        $this->file = $fileToUpload;
        $this->user = $user;
        $this->getHash();
    }

    public function getHash()
    {
        if ($this->hashGenerated === NULL) {
            $this->hash = hash('md5', $this->file);
        }
        return $this->hash;
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
