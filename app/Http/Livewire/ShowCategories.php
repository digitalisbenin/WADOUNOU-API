<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use Livewire\Component;

class ShowCategories extends Component
{
    public Categorie $deleting;
    public Categorie $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search; 


    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.description' => 'required',
            
        ];
    }

    public function delete(Categorie $categories)
    {
        $this->deleting = $categories;
        $this->action = 'Supprimer une categories';
        $this->showDeleteModal = true;
    }

    public function edit(Categorie $categories)
    {
        $this->editing = $categories;
        $this->action = 'Modifier une categories';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Categorie();
        $this->action = 'Ajouter une categories';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une categories');
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();
        $this->notify('Enregistrement effectué avec succès');
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.show-categories',[
            'categories'=> Categorie::all(),
        ]);
    }
}
