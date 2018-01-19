<?php

namespace Model;

class File
{
    /** @var string */
    protected $name;
    protected $extension;
    protected $escapedFileName;
    protected $size;

    public function __construct(string $fileName)
    {
        $this->setName($fileName);
        $this->setExtension();
        $this->setEscapedFileName();
        $this->setSize();
    }

    public function setExtension(): string
    {
        $this->extension = pathinfo($this->name, PATHINFO_EXTENSION);
        return $this->extension;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getEscapedFileName(): string
    {
        return $this->escapedFileName;
    }

    public function setEscapedFileName(): string
    {
        $this->escapedFileName = pathinfo($this->name, PATHINFO_FILENAME);
        return $this->escapedFileName;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(): File
    {
        $this->size = filesize($this->name);
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return File
     */
    public function setName(string $name): File
    {
        $this->name = $name;
        return $this;
    }
}
