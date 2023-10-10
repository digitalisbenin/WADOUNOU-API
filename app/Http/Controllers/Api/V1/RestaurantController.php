<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Restaurant\RestaurantCollection;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Abonnement;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\S3\Exception\S3Exception;
use Illuminate\Http\UploadedFile;

class RestaurantController extends ApiController
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RestaurantCollection(Restaurant::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
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

            $abonnement = Abonnement::create($request->all());
             $user = User::create($request->all());
            $restaurant = Restaurant::create([
                'name' => $request->name,
                'description' => $request->description,
                'addrese' => $request->addrese,
                'phone' => $request->phone,
                'image_url' => $url,
                'abonnement_id' => $abonnement->id,
                'user_id' => $user->id,
            ]);

            return new RestaurantResource($restaurant);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Invalid file',
        ]);

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());
        return new RestaurantResource($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return response(null, 204);
    }
}
