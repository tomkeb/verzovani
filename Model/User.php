<?php

namespace Model;

class User
{
  protected $mail;
  protected $personName;
  protected $login;
  protected $ip;

  public function setLogin($login): User
  {
    $this->login = $login;
    return $this;
  }

  public function getLogin(): int
  {
    return $this->login;
  }

  public function setMail(string $mail): User
  {
    $this->mail = $mail;
    return $this;
  }

  public function getMail(): string
  {
    return $this->mail;
  }

  public function setPersonName(string $personName): User
  {
    $this->personName = $personName;
    return $this;
  }

  public function getPersonName(): string
  {
    return $this->personName;
  }

  public function setIp(string $ip): string
  {
    $this->ip = $ip;
    return $this->ip;
  }

  public function getIp(): string
  {
    return $this->ip;
  }
}
