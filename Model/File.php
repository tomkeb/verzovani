<?php

namespace Model;

class File
{
    /** @var string */
    protected $fileName;

    function __construct(string $fileName)
    {
        $this->setFileName($fileName);
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return File
     */
    public function setFileName(string $fileName): File
    {
        $this->fileName = $fileName;
        return $this;
    }
}