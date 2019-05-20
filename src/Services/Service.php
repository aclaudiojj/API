<?php

namespace Api\Services;

use Illuminate\Http\Request;
use Api\Contracts\ResourceContract;
use Api\Contracts\ServiceContract;
use Api\Repositories\Repository;
use Api\Http\Requests\CsvImportRequest;
use Illuminate\Http\UploadedFile;

abstract class Service implements ServiceContract
{

    /**
     *
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     *
     * @var Api\Repositories\Repository
     */
    protected $repository;

    /**
     *
     * @var Api\Contracts\FileReaderServiceContract
     */
    protected $fileReader;

    /**
     *
     * @return Api\Services\Service
     */
    public function init(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository
            ->init($this->request->all())
            ->index();
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return $this->repository
            ->init($this->request->all())
            ->store();
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->repository->get($id);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $this->repository->update($this->request->all(), $id);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
    
    /**
     *
     * @param \Illuminate\Http\UploadedFile  $uploadedFile
     * @return void
     */
    public function processImport(UploadedFile $uploadedFile)
    {
        $header = $this->fileReader->getHeader($uploadedFile);
        $data = $this->fileReader->getData($uploadedFile);
        
        foreach ($data as $row) {
            foreach ($header as $index => $headerField) {
                $importData[$headerField] = $row[$index];
            }

            $this->repository->init($importData)->store();
        }
    }
}