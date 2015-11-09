<?php

namespace test\TestBundle\Services;

use Symfony\Component\Filesystem\Filesystem;

class Uploader
{
    /** @var Filesystem $fs */
    private $fs;

    public function __construct() {
        $this->fs = new Filesystem();
    }

    public function upload($file, $path)
    {
        if(!$this->fs->exists($path))
        {
            $this->fs->dumpFile($path,$file);
            return $path;
        }
        else
        {
            return null;
        }
    }
}