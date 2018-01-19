<?php

namespace Model;

class Proposal
{
    /** @var Storage */
    protected $storage;

    /** @var string */
    protected $hash = NULL;
    protected $timestamp;

    /** @var User */
    protected $user;

    function __construct(User $user, array $file)
    {
        $this->user = $user;
        $this->setTimestamp();
    }

    static public function generateHash(User $user, $timestamp): string
    {
        return hash('md5', hash('md5',$user->getMail()));
    }

    public function getHash(): string
    {
        if ($this->hash === NULL) {
            $this->hash = self::generateHash($this->user, $this->timestamp);
        }
        return $this->hash;
    }

    protected function setTimestamp()
    {
      $this->timestamp = microtime();
      return $this;
    }

    public function getTimestamp(): string
    {
      return $this->timestamp;
    }

    public function setStorage(Storage $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    public function getStorage(): Storage
    {
        return $this->storage;
    }
}
