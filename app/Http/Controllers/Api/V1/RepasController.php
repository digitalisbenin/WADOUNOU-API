<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Repas\RepasCollection;
use App\Http\Resources\Repas\RepasResource;
use App\Http\Requests\Repas\StoreRepasRequest;
use App\Http\Requests\Repas\UpdateRepasRequest;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Repas;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\S3\Exception\S3Exception;
use Illuminate\Http\UploadedFile;

class RepasController extends ApiController
{
    public function getFileType(UploadedFile $file): string
    {
        if ($file && $file->isValid()) {
            $mime = $file->getMimeType();
            return $this->mimeToType($mime);
        }

        return '';
    }

    public function mimeToType(string $mime = null): string
    {
        if ($mime) {
            if (strstr($mime, 'image/')) {
                return 'image';
            } elseif (strstr($mime, 'video/')) {
                return 'video';
            } elseif (strstr($mime, 'audio/')) {
                return 'audio';
            } elseif ($mime == 'application/pdf') {
                return 'pdf';
            }
        }

        return 'file';
    }
 public function setFilePath(string $fileType, string $name): string 
 {
            $path = '';
            switch ($fileType) {
                case 'image':
                    $path = 'images/' . $name;
                    break;
                case 'audio':
                    $path = 'audios/' . $name;
                    break;
                case 'video':
                    $path = 'videos/' . $name;
                    break;
                case 'pdf':
                    $path = 'pdfs/' . $name;
                    break;
                default:
                    $path = 'images/' . $name;
                    break;
            }
            return $path;
        }
    public function index()
    {
        return new RepasCollection(Repas::all());
    }

    public function store(StoreRepasRequest $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $name = time() . $file->getClientOriginalName();
            $fileType = $this->getFileType($file);
            $filePath = $this->setFilePath($fileType, $name);

            $cloudDisk = Storage::disk('s3');
            try {
                $cloudDisk->put($filePath, file_get_contents($file));
                $url = $cloudDisk->url($filePath);
            } catch (S3Exception $e) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'S3 error',
                    'data'      => $e->getMessage(),
                ]);
            }

            $restaurant = Restaurant::create($request->all());
            $repas = Repas::create([
                'name' => $request->name,
                'description' => $request->description,
                'prix' => $request->prix,
                'type' => $request->type,
                'image_url' => $url,
                'restaurant_id' => $restaurant->id,
            ]);

            return new RepasResource($repas);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Invalid file',
        ]);
    }

    public function show(Repas $repas)
    {
        return new RepasResource($repas);
    }

    public function update(UpdateRepasRequest $request, Repas $repas)
    {
        $repas->update($request->all());
        return new RepasResource($repas);
    }

    public function destroy(Repas $repas)
    {
        $repas->delete();
        return response(null, 204);
    }

    
}
