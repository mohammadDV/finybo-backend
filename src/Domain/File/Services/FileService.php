<?php

namespace Domain\File\Services;

use Illuminate\Support\Facades\Storage;

class FileService extends FileToolsService
{

    public function moveToPublic($file)
    {
        //set File
        $this->setFile($file);
        //execute provider
        $this->provider();
        //save File
        $result = $file->move(public_path($this->getFinalFileDirectory()), $this->getFinalFileName());
        return $result ? $this->getFileAddress() : false;
    }


  public function moveToStorage($file)
    {
        //set File
        $this->setFile($file);
        //execute provider
        $this->provider();
        //save File
        // $result = Storage::disk('liara')->put($this->getFinalFileDirectory(), $file);
        $result = Storage::disk('s3')->put($this->getFinalFileDirectory(), $file, 'public');
        return  str_replace('prod-data-sport.storage.iran.liara.space', config('image.url-upload-file'), Storage::disk('s3')->url($result));

        // $result = $file->move(storage_path($this->getFinalFileDirectory()), $this->getFinalFileName());
        // return $result ? $this->getFileAddress() : false;
    }


    public function deleteFile($filePath)
    {
        if(file_exists($filePath))
        {
            unlink($filePath);
        }
    }


    public function deleteDirectoryAndFiles($directory)
    {
        if(!is_dir($directory))
        {
            return false;
        }

        $files = glob($directory . DIRECTORY_SEPARATOR . '*', GLOB_MARK);
        foreach($files as $file)
        {
            if(is_dir($file))
            {
                $this->deleteDirectoryAndFiles($file);
            }
            else{
                unlink($file);
            }
        }
        $result = rmdir($directory);
        return $result;
    }


}