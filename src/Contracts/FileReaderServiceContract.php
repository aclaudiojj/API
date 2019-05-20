<?php

namespace Api\Contracts;

use Illuminate\Http\UploadedFile;

interface FileReaderServiceContract
{
    public function getData(UploadedFile $uploadedFile);
    public function getHeader(UploadedFile $uploadedFile);
}