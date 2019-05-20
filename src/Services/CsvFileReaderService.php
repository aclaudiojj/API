<?php

namespace Api\Services;

use Api\Contracts\FileReaderServiceContract;
use Api\Repositories\ShoeRepository;
use Illuminate\Http\UploadedFile;

class CsvFileReaderService implements FileReaderServiceContract
{

    /**
     *
     * @param \Illuminate\Http\UploadedFile $uploadedFile
     * @return array
     */
    public function getData(UploadedFile $uploadedFile)
    {   
        $data = array_map('str_getcsv', file($uploadedFile->getRealPath()));

        array_shift($data);
        
        return $data;
    }

    /**
     *
     * @param \Illuminate\Http\UploadedFile $uploadedFile
     * @return array
     */
    public function getHeader(UploadedFile $uploadedFile)
    {
        $data = array_map('str_getcsv', file($uploadedFile->getRealPath()));
        
        return array_shift($data);
    }
}