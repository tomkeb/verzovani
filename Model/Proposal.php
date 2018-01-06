<?php

namespace Model;

class Proposal
{
    protected $storage;

    function __construct()
    {

    }

    private function getHash()
    {
        $this->hash = uniqid('proposal');
        return $this->hash; //kde je deklarovaná $this->hash ??
        //co když tuto fci zavolám na stejném proposal dvakrát?
    }

    protected function setStorage()
    {
        ;//já ho chci nastavit..
    }

    protected function getStorage()
    {
        ; //já ho přeci chci dostat
    }


}