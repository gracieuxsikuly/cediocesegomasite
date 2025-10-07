<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;

class Contacts extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $confirmingDelete = false;
    public $itemIdToDelete;
    public $successMessage = '';

    // SUPPRESSION 
    public function deleteContact($id)
    {
        $this->itemIdToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function confirmDelete()
    {
        if($this->itemIdToDelete) {
            Contact::find($this->itemIdToDelete)->delete();
            $this->confirmingDelete = false;
            $this->itemIdToDelete = null;
            $this->successMessage = 'Contact supprimé avec succès';
        }
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->itemIdToDelete = null;
    }

    public function render()
    {
        $query = Contact::query();

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('sujet', 'like', '%'.$this->searchTerm.'%')
                  ->orWhere('message', 'like', '%'.$this->searchTerm.'%');
            });
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('livewire.backend.contacts', [
            'contacts' => $contacts
        ])->layout('layouts.defaultbackend', ['title' => 'Contacts']);
    }
}