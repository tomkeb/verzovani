<?php

namespace Model;

class Proposal
{
    /** @var Storage */
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

    protected function setStorage(Storage $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    protected function getStorage(): Storage
    {
        return $this->storage;
    }
}
