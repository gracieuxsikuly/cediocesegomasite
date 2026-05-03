<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Gestion des sliders</h4>
                    <button type="button" class="btn btn-primary" wire:click="createSlider"><i class="fas fa-plus-circle"></i> Ajouter un slider</button>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="alert alert-info mb-3">Dimension conseillee des photos: <strong>{{ $recommendedSize }}</strong></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light"><tr><th>Image</th><th>Texte</th><th>Ordre</th><th>Statut</th><th>Actions</th></tr></thead>
                        <tbody>
                            @forelse($sliders as $slider)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->titre }}" width="120" class="rounded"></td>
                                    <td><strong>{{ $slider->titre }}</strong><br><small>{{ $slider->sous_titre }}</small><br><span>{{ Str::limit($slider->description, 80) }}</span></td>
                                    <td>{{ $slider->ordre }}</td>
                                    <td><span class="badge bg-{{ $slider->statut === 'actif' ? 'success' : 'secondary' }}">{{ $slider->statut }}</span></td>
                                    <td><div class="btn-group"><button class="btn btn-sm btn-warning" wire:click="editSlider({{ $slider->id }})"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-danger" wire:click="deleteSlider({{ $slider->id }})"><i class="fas fa-trash"></i></button></div></td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center text-muted">Aucun slider configure.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $sliders->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>

        <div class="modal fade" id="sliderModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg"><div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">{{ $editMode ? 'Modifier slider' : 'Ajouter slider' }}</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form wire:submit.prevent="{{ $editMode ? 'updateSlider' : 'addSlider' }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Petit titre / mot cle</label><input type="text" class="form-control" wire:model.live="sous_titre"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Grand titre *</label><input type="text" class="form-control" wire:model.live="titre">@error('titre') <span class="text-danger">{{ $message }}</span> @enderror</div>
                        </div>
                        <div class="mb-3"><label class="form-label">Description / slogan</label><textarea class="form-control" rows="3" wire:model.live="description"></textarea></div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Bouton principal</label><input type="text" class="form-control" wire:model.live="bouton_texte"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Lien principal</label><input type="text" class="form-control" wire:model.live="bouton_lien"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Bouton secondaire</label><input type="text" class="form-control" wire:model.live="bouton_secondaire_texte"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Lien secondaire</label><input type="text" class="form-control" wire:model.live="bouton_secondaire_lien"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3"><label class="form-label">Ordre *</label><input type="number" min="1" class="form-control" wire:model.live="ordre"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Statut *</label><select class="form-control" wire:model.live="statut"><option value="actif">Actif</option><option value="inactif">Inactif</option></select></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Image {{ $editMode ? '' : '*' }}</label><input type="file" class="form-control" wire:model.live="image"><small class="text-muted">{{ $recommendedSize }}</small>@error('image') <span class="text-danger d-block">{{ $message }}</span> @enderror</div>
                        </div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button><button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="image,addSlider,updateSlider"><span wire:loading.remove wire:target="image,addSlider,updateSlider">{{ $editMode ? 'Modifier' : 'Enregistrer' }}</span><span wire:loading wire:target="image,addSlider,updateSlider">Traitement...</span></button></div>
                </form>
            </div></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('openSliderModal', () => new bootstrap.Modal(document.getElementById('sliderModal')).show());
        Livewire.on('sliderSaved', () => bootstrap.Modal.getInstance(document.getElementById('sliderModal'))?.hide());
    });
</script>
@endpush
