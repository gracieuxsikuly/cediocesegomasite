<div>
    <div class="container py-5">
        <h2 class="text-center mb-4">Contactez-nous</h2>

        <!-- Message de succès -->
        @if ($successMessage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $successMessage }}
                <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
            </div>
        @endif

        <form wire:submit.prevent="submitForm">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" class="form-control" wire:model.lazy="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" id="email" class="form-control" wire:model.lazy="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Sujet</label>
                <input type="text" id="subject" class="form-control" wire:model.lazy="subject">
                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" class="form-control" rows="5" wire:model.lazy="message"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                <span wire:loading.remove>Envoyer</span>
                <span wire:loading>Envoi...</span>
            </button>
        </form>
    </div>
</div>
