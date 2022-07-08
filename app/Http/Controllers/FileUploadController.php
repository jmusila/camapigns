<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Http\Resources\FileResource;
use App\Models\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function __invoke(CreateFileRequest $request)
    {
        return new FileResource(FileUpload::create($request->validated()));
    }
}
