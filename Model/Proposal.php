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

    /** @var File[] */
    protected $attachments = [];

    function __construct(User $user, array $file)
    {
        $this->user = $user;
        $this->setTimestamp();
    }

    public function addAttachment(File $file): Proposal
    {
        $this->attachments[] = $file;
        return $this;
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }

    public function hasAttachments(): bool {
        return (FALSE===empty($this->getAttachments()));
        //nebo !empty($this->getAttachments()); ale takto je to prý blbuvzdornější - vyber si co chceš
    }

    public function getHash(): string
    {
        if ($this->hash === NULL) {
            $this->hash = self::generateHash($this->user, $this->timestamp);
        }
        return $this->hash;
    }

    static public function generateHash(User $user, $timestamp): string
    {
        return hash('md5', hash('md5', $user->getMail()));
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    protected function setTimestamp()
    {
        $this->timestamp = microtime();
        return $this;
    }

    public function getStorage(): Storage
    {
        return $this->storage;
    }

    public function setStorage(Storage $storage)
    {
        $this->storage = $storage;
        return $this;
    }
}
