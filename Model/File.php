<?php

namespace Model;

class File
{
    /** @var string */
    protected $fileName;
    protected $fileExtension;
    protected $escapedFileName;
    protected $fileSize;

    public function __construct(string $fileName)
    {
        $this->setFileName($fileName);
        $this->setFileExtension();
        $this->setEscapedFileName();
        $this->setFileSize();
    }

    public function setFileExtension(): string
    {
        $this->fileExtension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        return $this->fileExtension;
    }

    public function getFileExtension(): string
    {
        return $this->fileExtension;
    }

    public function getEscapedFileName(): string
    {
        return $this->escapedFileName;
    }

    public function setEscapedFileName(): string
    {
        $this->escapedFileName = pathinfo($this->fileName, PATHINFO_FILENAME);
        return $this->escapedFileName;
    }

    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    public function setFileSize(): File
    {
        $this->fileSize = filesize($this->fileName);
        return $this;
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
