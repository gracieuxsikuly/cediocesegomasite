<div>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Photos & Vidéos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Liste des photos et vidéos</h5>
                        
                        <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                            {{-- Champ de recherche --}}
                            <input type="text" class="form-control" placeholder="Rechercher une photo/vidéo..."
                                wire:model.live="searchTerm" style="flex: 1 1 70%;">

                            {{-- Bouton d'ajout --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#photoVideoModal" style="flex: 0 0 25%;">
                                <i class="fas fa-plus-circle"></i>
                                Ajouter des Photos/Vidéos
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-responsive table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Désignation</th>
                                        <th>Fichier</th>
                                        <th>Type</th>
                                        <th>Doyenne</th>
                                        <th>Paroisse</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($photosVideos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->designation }}</td>
                                        <td>
                                            @if($item->liens)
                                                @if($this->isImage($item->liens))
                                                    <img src="{{ asset('storage/' . $item->liens) }}" 
                                                         alt="{{ $item->designation }}" 
                                                         style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;"
                                                         data-bs-toggle="modal" 
                                                         data-bs-target="#imageModal"
                                                         onclick="document.getElementById('modalImage').src = this.src">
                                                @elseif($this->isVideo($item->liens))
                                                    <video width="80" height="60" controls style="object-fit: cover;">
                                                        <source src="{{ Storage::disk('public')->url($item->liens) }}" type="video/mp4">
                                                        Votre navigateur ne supporte pas la lecture vidéo.
                                                    </video>
                                                @endif
                                            @else
                                                <span class="text-muted">Aucun fichier</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($this->isImage($item->liens))
                                                <span class="badge bg-success">Photo</span>
                                            @elseif($this->isVideo($item->liens))
                                                <span class="badge bg-info">Vidéo</span>
                                            @else
                                                <span class="badge bg-secondary">Autre</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->doyenne->designation ?? 'N/A' }}</td>
                                        <td>{{ $item->paroisse->designation ?? 'N/A' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning" 
                                                    wire:click="editPhotoVideo({{ $item->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" 
                                                    wire:click="deletePhotoVideo({{ $item->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                @if($item->liens)
                                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    wire:click="downloadFile({{ $item->id }})">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Aucune photo ou vidéo trouvée.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if(method_exists($photosVideos, 'links'))
                            <div class="mt-3">
                                {{ $photosVideos->links('livewire::bootstrap') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'ajout/édition -->
        <div class="modal fade" id="photoVideoModal" tabindex="-1" aria-labelledby="photoVideoModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="photoVideoModalLabel">
                            {{ $editMode ? 'Modifier la Photo/Vidéo' : 'Ajouter des Photos/Vidéos' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    {{-- message --}}
                    @if (session()->has('message'))
                        <div class="alert alert-success m-3">
                            {{ session('message') }}
                        </div>
                    @endif
                    {{-- Fin message --}}
                    
                    <form wire:submit.prevent="{{ $editMode ? 'updatePhotoVideo' : 'addPhotoVideo' }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Désignation</label>
                                        <input type="text" class="form-control" id="designation" wire:model.live="designation"
                                            placeholder="Entrez la désignation">
                                        @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="doyenne_id" class="form-label">Doyenne</label>
                                        <select class="form-control" id="doyenne_id" wire:model.live="doyenne_id">
                                            <option value="">Sélectionnez une doyenne</option>
                                            @foreach($doyennes as $doyenne)
                                                <option value="{{ $doyenne->id }}">{{ $doyenne->designation }}</option>
                                            @endforeach
                                        </select>
                                        @error('doyenne_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="paroisse_id" class="form-label">Paroisse</label>
                                        <select class="form-control" id="paroisse_id" wire:model.live="paroisse_id">
                                            <option value="">Sélectionnez une paroisse</option>
                                            @foreach($paroisses as $paroisse)
                                                <option value="{{ $paroisse->id }}">{{ $paroisse->designation }}</option>
                                            @endforeach
                                        </select>
                                        @error('paroisse_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="lien" class="form-label">
                                            {{ $editMode ? 'Nouveau fichier (laisser vide pour garder l\'actuel)' : 'Fichiers (Photos/Vidéos)' }}
                                        </label>
                                        <input type="file" class="form-control" id="lien" 
                                            wire:model.live="lien" 
                                            {{ $editMode ? '' : 'multiple' }}
                                            accept="image/*,video/*">
                                        @error('lien')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @error('lien.*')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        
                                        {{-- Aperçu des fichiers sélectionnés --}}
                                        @if($lien && count($lien) > 0)
                                            <div class="mt-3">
                                                <h6>Fichiers sélectionnés :</h6>
                                                <div class="d-flex flex-wrap gap-2 mt-2">
                                                    @foreach($lien as $index => $file)
                                                        <div class="file-preview-item border rounded p-2">
                                                            @if(str_starts_with($file->getMimeType(), 'image/'))
                                                                <img src="{{ $file->temporaryUrl() }}" 
                                                                     alt="Aperçu" 
                                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                                            @elseif(str_starts_with($file->getMimeType(), 'video/'))
                                                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                                                     style="width: 60px; height: 60px;">
                                                                    <i class="fas fa-video text-muted"></i>
                                                                </div>
                                                            @else
                                                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                                                     style="width: 60px; height: 60px;">
                                                                    <i class="fas fa-file text-muted"></i>
                                                                </div>
                                                            @endif
                                                            <div class="mt-1 text-center">
                                                                <small class="d-block text-truncate" style="max-width: 80px;">
                                                                    {{ $file->getClientOriginalName() }}
                                                                </small>
                                                                <button type="button" class="btn btn-sm btn-danger mt-1" 
                                                                        wire:click="removeUploadedFile({{ $index }})">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="form-text">
                                            Formats acceptés : 
                                            <strong>Photos</strong> (JPG, JPEG, PNG, GIF) - 
                                            <strong>Vidéos</strong> (MP4, AVI, MOV, WMV)
                                            <br>Taille maximale par fichier : 10MB
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" 
                                wire:loading.attr="disabled" 
                                wire:target="{{ $editMode ? 'updatePhotoVideo' : 'addPhotoVideo' }}, lien">
                                <span wire:loading.remove wire:target="{{ $editMode ? 'updatePhotoVideo' : 'addPhotoVideo' }}, lien">
                                    {{ $editMode ? 'Modifier' : 'Enregistrer' }}
                                </span>
                                <span wire:loading wire:target="{{ $editMode ? 'updatePhotoVideo' : 'addPhotoVideo' }}, lien">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ $editMode ? 'Modification...' : 'Enregistrement...' }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal pour l'affichage de l'image en grand -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Aperçu de l'image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Aperçu" style="max-width: 100%; max-height: 80vh;">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        // Fermer le modal après l'ajout ou la modification
        Livewire.on('photoVideoAdded', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('photoVideoModal'));
            modal.hide();
        });

        Livewire.on('photoVideoUpdated', () => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('photoVideoModal'));
            modal.hide();
        });
        
        // Ouvrir le modal en mode édition
        Livewire.on('openModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('photoVideoModal'));
            modal.show();
        });

        // Réinitialiser le formulaire quand le modal est fermé
        document.getElementById('photoVideoModal').addEventListener('hidden.bs.modal', function () {
            Livewire.dispatch('resetForm');
        });
    });

    // Gestion de l'affichage des images en grand
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    });
</script>
@endpush