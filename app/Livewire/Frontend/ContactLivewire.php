<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactLivewire extends Component
{
    public $name, $email, $subject, $message;
    public $successMessage = '';

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'subject' => 'required|string|min:3',
        'message' => 'required|string|min:5',
    ];

    public function submitForm()
    {
        $this->validate();

        // Enregistrement dans la base de données
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Envoi d'email (optionnel)
        // Mail::raw($this->message, function ($mail) {
        //     $mail->to('ton_email@exemple.com')
        //          ->subject($this->subject)
        //          ->from($this->email, $this->name);
        // });

        // Réinitialiser les champs
        $this->reset(['name', 'email', 'subject', 'message']);
        $this->successMessage = "Merci, ton message a été envoyé avec succès !";
    }

    public function render()
    {
        return view('livewire.frontend.contact-livewire')
            ->layout('layouts.defaultfrontend', ['title' => 'Contact']);
    }
}
