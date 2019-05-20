<?php

namespace Api\Services;

use Api\Contracts\ServiceContract;
use Api\Contracts\FileReaderServiceContract;
use Api\Repositories\ShoeRepository;

class ShoeService extends Service implements ServiceContract
{
    
    /**
     *
     * @param \Api\Repositories\ShoeRepository $shoe
     * @param \Api\Contracts\FileReaderServiceContract $fileReader
     */
    public function __construct(ShoeRepository $shoe, FileReaderServiceContract $fileReader)
    {
        $this->repository = $shoe;
        $this->fileReader = $fileReader;
    }
}