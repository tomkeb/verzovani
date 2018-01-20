<?php

namespace Model;

class File
{
    /** @var string */
    protected $name;
    protected $extension;
    protected $size;

    public function __construct(string $fileName)
    {
        $this->setName($fileName)
            ->setExtension()
            ->setSize();
    }

    public function setExtension(): File
    {
        $this->extension = pathinfo($this->name, PATHINFO_EXTENSION);
        return $this;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getEscapedFileName(): string
    {
        return pathinfo($this->name, PATHINFO_FILENAME);
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
