<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $current_password = '';
    public $password = '';
    public $password_confirmation = '';
    public $photo = null;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.backend.profile-edit')
            ->layout('layouts.defaultbackend', ['title' => 'Mon profil']);
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.auth()->id(),
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->photo) {
            $data['profile_photo_path'] = $this->photo->store('profile-photos', 'public');
        }

        $user->update($data);
        session()->flash('message', 'Profil modifie avec succes.');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (! Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError('current_password', 'Le mot de passe actuel est incorrect.');
            return;
        }

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['current_password', 'password', 'password_confirmation']);
        session()->flash('message', 'Mot de passe modifie avec succes.');
    }
}
