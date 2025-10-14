<div> 
    <div class="container-fluid">
    
        @if($successMessage)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $successMessage }}
            <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Liste des Contacts</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Contacts reçus</h5>
                        
                        <!-- Recherche  -->
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Rechercher un contact..."
                                wire:model.live="searchTerm">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Sujet</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->sujet }}</td>
                                        <td>{{ Str::limit($contact->message, 50) }}</td>
                                        <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                           <button type="button" class="btn btn-sm btn-danger"
                                                    wire:click="deleteContact({{ $contact->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Aucun contact trouvé.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            
                            @if(method_exists($contacts, 'links'))
                            <div class="mt-3">
                                {{ $contacts->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de confirmation de suppression -->
        @if($confirmingDelete)
        <div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression Contact</h5>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer ce contact ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="cancelDelete">Annuler</button>
                        <button type="button" class="btn btn-danger" wire:click="confirmDelete">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div> <!-- container-fluid -->

    @push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Fermer le modal après l'ajout ou la modification
            Livewire.on('contactAdded', () => {
                const modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
                if (modal) {
                    modal.hide();
                }
            });

            Livewire.on('contactUpdated', () => {
                const modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
                if (modal) {
                    modal.hide();
                }
            });
            
            // Ouvrir le modal en mode édition
            Livewire.on('openContactModal', () => {
                const modal = new bootstrap.Modal(document.getElementById('contactModal'));
                modal.show();
            });
        });

        // Gérer la fermeture du modal de confirmation en cliquant à l'extérieur
        document.addEventListener('click', function(event) {
            const deleteModal = document.querySelector('[wire\\:key="delete-confirmation-modal"]');
            if (deleteModal && event.target === deleteModal) {
                @this.call('cancelDelete');
            }
        });
    </script>
    @endpush
</div> <!-- UNIQUEMENT CET ÉLÉMENT RACINE -->