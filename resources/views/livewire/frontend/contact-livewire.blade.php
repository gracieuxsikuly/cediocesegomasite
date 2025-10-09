<div class="contact-us-form wow fadeInUp" data-wow-delay="0.25s">
    @if ($successMessage)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $successMessage }}
            <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
        </div>
    @endif

    <form wire:submit.prevent="submitForm">
        <div class="row">
            <div class="form-group col-md-6 mb-4">
                <input type="text" class="form-control" wire:model.lazy="name" placeholder="First Name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
                <input type="email" class="form-control" wire:model.lazy="email" placeholder="Email Address">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
                <input type="text" class="form-control" wire:model.lazy="subject" placeholder="Sujet">
                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
                <textarea class="form-control" rows="5" wire:model.lazy="message" placeholder="Message"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Envoyer</span>
                    <span wire:loading>Envoi...</span>
                </button>
            </div>
        </div>
    </form>
</div>
