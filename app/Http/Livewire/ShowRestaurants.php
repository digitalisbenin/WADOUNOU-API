<?php

namespace App\Http\Livewire;

use App\Models\Abonnement;
use App\Models\Restaurant;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ShowRestaurants extends Component
{

    use WithFileUploads;
    public Restaurant $deleting;
    public Restaurant $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;
    public $file;


    public function getFileType(UploadedFile $file): string
    {
        if ($file && $file->isValid()) {
            $mime = $file->getMimeType();
    
            return $this->mimeToType($mime); // Utilisez $this->mimeToType() pour appeler la méthode de la classe
        }
    
        return '';
    }
    
        function mimeToType(string $mime = null): string
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

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.description' => 'required',
            'editing.addrese' => 'required',
            'editing.image_url' => 'required',
            'editing.phone' => 'required',
            'editing.abonnement_id' => 'nullable',
            'editing.user_id' => 'required',
            
            
        ];
    }

    public function delete(Restaurant $restaurants)
    {
        $this->deleting = $restaurants;
        $this->action = 'Supprimer un restaurants';
        $this->showDeleteModal = true;
    }

    public function edit(Restaurant $restaurants)
    {
        $this->editing = $restaurants;
        $this->action = 'Modifier un restaurants';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Restaurant();
        $this->action = 'Ajouter un restaurants';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un restaurants');
    }

  
    public function save()
    {
        $this->validate([
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,video/webm,video/mp4,video/3gpp,audio/mpeg,audio/mp3,audio/wav|max:2048',
        ]);


        $file = $this->file;
        $name = time() . $file->getClientOriginalName();
        $fileType = $this->getFileType($file);
        $path = '';
        switch ($fileType) {
            case 'image':
                $path = 'images';
                break;
            case 'audio':
                $path = 'audios';
                break;
            case 'video':
                $path = 'videos';
                break;
            case 'pdf':
                $path = 'pdfs';
                break;
            default:
                $path = 'images';
                break;
        }
        $url = $this->file->storePubliclyAs($path, $name, 's3');
        $url = "https://bucetwadounou.s3.us-east-1.amazonaws.com/$url";
        Restaurant::create([
            'name' => $this->editing->name,
            'description' => $this->editing->description,
            'addrese' => $this->editing->addrese,
            'phone' => $this->editing->phone,
            'user_id' => $this->editing->user_id,
            'abonnement_id' => $this->editing->abonnement_id,
            'image_url' => $url,
        ]);
        $this->notify('Enregistrement effectué avec succès');
        $this->showEditModal = false;
    }
    
    public function render()
    {
        return view('livewire.show-restaurants',[
            'restaurants'=> Restaurant::all(), 
            'abonnements'=> Abonnement::all(),
            'users'=> User::all(),  
        ]);
    }
}
