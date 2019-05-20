<?php

namespace Api\Contracts;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

interface ServiceContract
{
    public function init(Request $request);
    public function index();
    public function store();
    public function get($id);
    public function update($id);
    public function destroy($id);
    public function processImport(UploadedFile $uploadedFile);
}