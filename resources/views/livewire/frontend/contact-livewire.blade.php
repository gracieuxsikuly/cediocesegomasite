<div>
   <div class="container py-5">
    <h2 class="text-center mb-4">Contactez-nous</h2>

    @if ($successMessage)
        <div class="alert alert-success">{{ $successMessage }}</div>
    @endif

    <form wire:submit.prevent="submitForm">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" id="name" class="form-control" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" id="email" class="form-control" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="sujet" class="form-label">Sujet</label>
            <input type="text" id="sujet" class="form-control" wire:model="sujet">
            @error('sujet') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" class="form-control" rows="5" wire:model="message"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

</div>
