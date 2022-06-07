<?php

namespace App\Service;

use Gumlet\ImageResize;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
    private $targetDirectory;
    private $slugger;

    public function __construct($targetDirectory, SluggerInterface $slugger )
    {
        $this->targetDirectory = $targetDirectory;
        $this->slugger = $slugger;
    }

    public function upload(UploadedFile $file)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }
        $image = new ImageResize($this->getTargetDirectory() . '/' . $fileName);
        $image->crop(200, 200, true, ImageResize::CROPCENTER);
        $image->save($this->getTargetDirectory() . '/mini/' . $fileName);

        $image = new ImageResize($this->getTargetDirectory() . '/' . $fileName);
        $image->crop(400, 400, true, ImageResize::CROPCENTER);
        $image->save($this->getTargetDirectory() . '/moyen/' . $fileName);

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
    
}