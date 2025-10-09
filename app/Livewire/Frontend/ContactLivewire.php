<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact; // Assure-toi que ton modèle Contact existe

class ContactLivewire extends Component
{
    public $name, $email, $sujet, $message;
    public $successMessage = '';

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'sujet' => 'required|string|min:3',
        'message' => 'required|string|min:5',
    ];

    public function submitForm()
    {
        $this->validate();

        // Enregistrement dans la base de données
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'sujet' => $this->sujet,
            'message' => $this->message,
        ]);

        // Envoi d'email 
        Mail::raw($this->message, function ($mail) {
            $mail->to('ton_email@exemple.com') // Remplace par ton email réel
                 ->subject($this->sujet)
                 ->from($this->email, $this->name);
        });

        // Réinitialiser les champs du formulaire
        $this->reset(['name', 'email', 'sujet', 'message']);
        $this->successMessage = "Merci, ton message a été envoyé et enregistré avec succès !";
    }

    public function render()
    {
        return view('livewire.frontend.contact-livewire')
            ->layout('layouts.defaultfrontend', ['title' => 'Contact']);
    }
}
