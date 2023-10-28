<?php

namespace App\Http\Livewire;


use App\Models\Repas;
use App\Models\Restaurant;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class ShowRepas extends Component
{
    use WithFileUploads;
    public Repas $deleting;
    public Repas $editing;
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
            'editing.prix' => 'required',
            'editing.type' => 'required',
            'editing.restaurant_id' => 'required',



        ];
    }

    public function delete(Repas $repas)
    {
        $this->deleting = $repas;
        $this->action = 'Supprimer un repas';
        $this->showDeleteModal = true;
    }

    public function edit(Repas $repas)
    {
        $this->editing = $repas;
        $this->action = 'Modifier un repas';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Repas();
        $this->action = 'Ajouter un repas';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un repas');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,video/webm,video/mp4,video/3gpp,audio/mpeg,audio/mp3,audio/wav|max:2048',
        ]);


        $file = $this->file;
        
        $name = time() . $file->getClientOriginalName();
        $fileType = $this->getFileType($file);
        //dd($fileType);
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
        Repas::create([
            'name' => $this->editing->name,
            'description' => $this->editing->description,
            'prix' => $this->editing->prix,
            'type' => $this->editing->type,
            'restaurant_id' => $this->editing->restaurant_id,
            'image_url' => $url,
        ]);
        $this->notify('Enregistrement effectué avec succès');
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.show-repas', [
            'repas' => Repas::all(),
            'restaurants' => Restaurant::all(),

        ]);
    }
}
