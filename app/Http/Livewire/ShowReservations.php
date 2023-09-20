<?php

namespace App\Http\Livewire;

use App\Models\Reservation;
use App\Models\Restaurant;
use Livewire\Component;

class ShowReservations extends Component
{

    public Reservation $deleting;
    public Reservation $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.description' => 'required',
            'editing.place' => 'required',
            'editing.date' => 'required',
            'editing.restaurant_id' => 'required',
            
            
        ];
    }

    public function delete(Reservation $reservations)
    {
        $this->deleting = $reservations;
        $this->action = 'Supprimer une reservation';
        $this->showDeleteModal = true;
    }

    public function edit(Reservation $reservations)
    {
        $this->editing = $reservations;
        $this->action = 'Modifier une reservation';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Reservation();
        $this->action = 'Ajouter une reservation';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une reservations');
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
        return view('livewire.show-reservations',[
            'reservations'=> Reservation::all(), 
            'restaurants'=> Restaurant::all(), 
        ]);
    }
}
