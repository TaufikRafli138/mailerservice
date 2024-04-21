<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponsesTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class FileController extends Controller
{
    use ApiResponsesTrait;

    public function getFile(Request $request)
    {
        try {
            $request->validate([
                'file_path' => 'required',
            ]);
            $file_path = $request['file_path'];
            if (!Storage::disk('public')->exists($file_path)) {
                return $this->errorResponse('File not found!', Response::HTTP_NOT_FOUND);
            }
            return response()->file(Storage::disk('public')->path($file_path), [
                'Content-Type' => Storage::mimeType($file_path),
            ]);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
