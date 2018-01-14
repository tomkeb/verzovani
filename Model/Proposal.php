<?php

namespace Model;

class Proposal
{
    protected $storage;

    /** @var string */
    protected $hash = NULL;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    static public function generateHash(): string
    {
        return hash('md5', uniqid());
    }

    public function getHash(): string
    {
        if ($this->hash === NULL) {
            $this->hash = self::generateHash();
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
