<?php

namespace App\Livewire\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class UserCrud extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $roleFilter = '';
    public $editMode = false;
    public $userId;
    public $name = '';
    public $email = '';
    public $password = '';
    public $role = User::ROLE_USER;

    public function roleOptions(): array
    {
        return [
            User::ROLE_ADMIN => 'Administrateur',
            User::ROLE_USER => 'Utilisateur',
            User::ROLE_ACTIVITES_RESSOURCES => 'Activites et ressources',
            User::ROLE_RADIO_MARIA => 'Radio Maria',
            User::ROLE_MANAGER_DONNEES => 'Gestion des donnees',
            User::ROLE_SECRETARIAT => 'Secretariat',
            User::ROLE_ZELATEUR => 'Zelateur',
            User::ROLE_TRESORERIE => 'Tresorerie',
        ];
    }

    public function render()
    {
        $query = User::query();

        if ($this->searchTerm) {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
            });
        }

        if ($this->roleFilter) {
            $query->where('role', $this->roleFilter);
        }

        return view('livewire.backend.user-crud', [
            'users' => $query->latest()->paginate(10),
            'roleOptions' => $this->roleOptions(),
        ])->layout('layouts.defaultbackend', ['title' => 'Utilisateurs']);
    }

    public function createUser()
    {
        $this->resetForm();
        $this->dispatch('openUserModal');
    }

    public function addUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:'.implode(',', array_keys($this->roleOptions())),
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'email_verified_at' => now(),
        ]);

        $this->resetForm();
        $this->dispatch('userSaved');
        session()->flash('message', 'Utilisateur cree avec succes.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->editMode = true;
        $this->dispatch('openUserModal');
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$this->userId,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:'.implode(',', array_keys($this->roleOptions())),
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        User::findOrFail($this->userId)->update($data);

        $this->resetForm();
        $this->dispatch('userSaved');
        session()->flash('message', 'Utilisateur modifie avec succes.');
    }

    public function deleteUser($id)
    {
        if ((int) $id === (int) auth()->id()) {
            session()->flash('message', 'Vous ne pouvez pas supprimer votre propre compte connecte.');
            return;
        }

        LivewireAlert::title('Suppression utilisateur')
            ->text('Voulez-vous supprimer cet utilisateur ?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => $id])
            ->show();
    }

    public function deleteItem($data)
    {
        User::find($data['id'])?->delete();
        LivewireAlert::title('Succes')->text('Utilisateur supprime avec succes')->success()->timer(5000)->show();
    }

    private function resetForm(): void
    {
        $this->reset(['userId', 'name', 'email', 'password', 'editMode']);
        $this->role = User::ROLE_USER;
        $this->resetErrorBag();
    }
}
