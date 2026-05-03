<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Gestion de la caisse</h4>
                    <button type="button" class="btn btn-primary" wire:click="createMouvement"><i class="fas fa-plus-circle"></i> Nouvelle operation</button>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif

        <div class="row">
            <div class="col-xl-4 col-md-6"><div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Revenus</p><h3 class="text-success">{{ number_format($totalRevenus, 2, ',', ' ') }} USD</h3></div></div></div>
            <div class="col-xl-4 col-md-6"><div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Depenses</p><h3 class="text-danger">{{ number_format($totalDepenses, 2, ',', ' ') }} USD</h3></div></div></div>
            <div class="col-xl-4 col-md-12"><div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Solde caisse</p><h3 class="text-primary">{{ number_format($solde, 2, ',', ' ') }} USD</h3></div></div></div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="row g-2 mb-3">
                    <div class="col-md-4"><input type="text" class="form-control" placeholder="Rechercher operation, motif, reference..." wire:model.live.debounce.400ms="searchTerm"></div>
                    <div class="col-md-2"><select class="form-control" wire:model.live="typeFilter"><option value="">Tous</option><option value="revenu">Revenus</option><option value="depense">Depenses</option></select></div>
                    <div class="col-md-3"><input type="date" class="form-control" wire:model.live="dateDebut"></div>
                    <div class="col-md-3"><input type="date" class="form-control" wire:model.live="dateFin"></div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light"><tr><th>Date</th><th>Operation</th><th>Type</th><th>Montant</th><th>Mode</th><th>Reference</th><th>Piece</th><th>Actions</th></tr></thead>
                        <tbody>
                            @forelse($mouvements as $mouvement)
                                <tr>
                                    <td>{{ optional($mouvement->date_operation)->format('d/m/Y') }}</td>
                                    <td><strong>{{ $mouvement->designation }}</strong><br><small>{{ Str::limit($mouvement->motif, 60) }}</small></td>
                                    <td><span class="badge bg-{{ $mouvement->type === 'revenu' ? 'success' : 'danger' }}">{{ ucfirst($mouvement->type) }}</span></td>
                                    <td>{{ number_format($mouvement->montant, 2, ',', ' ') }}</td>
                                    <td>{{ str_replace('_', ' ', $mouvement->mode_paiement) }}</td>
                                    <td>{{ $mouvement->reference ?? 'N/A' }}</td>
                                    <td>@if($mouvement->piece_jointe)<a href="{{ asset('storage/' . $mouvement->piece_jointe) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-download"></i></a>@else N/A @endif</td>
                                    <td><div class="btn-group"><button class="btn btn-sm btn-warning" wire:click="editMouvement({{ $mouvement->id }})"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-danger" wire:click="deleteMouvement({{ $mouvement->id }})"><i class="fas fa-trash"></i></button></div></td>
                                </tr>
                            @empty
                                <tr><td colspan="8" class="text-center text-muted">Aucune operation de caisse.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $mouvements->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>

        <div class="modal fade" id="financeModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg"><div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">{{ $editMode ? 'Modifier operation' : 'Nouvelle operation de caisse' }}</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form wire:submit.prevent="{{ $editMode ? 'updateMouvement' : 'addMouvement' }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 mb-3"><label class="form-label">Type *</label><select class="form-control" wire:model.live="type"><option value="revenu">Revenu</option><option value="depense">Depense</option></select></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Date *</label><input type="date" class="form-control" wire:model.live="date_operation">@error('date_operation') <span class="text-danger">{{ $message }}</span> @enderror</div>
                            <div class="col-md-4 mb-3"><label class="form-label">Montant *</label><input type="number" step="0.01" class="form-control" wire:model.live="montant">@error('montant') <span class="text-danger">{{ $message }}</span> @enderror</div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3"><label class="form-label">Designation *</label><input type="text" class="form-control" wire:model.live="designation">@error('designation') <span class="text-danger">{{ $message }}</span> @enderror</div>
                            <div class="col-md-4 mb-3"><label class="form-label">Mode paiement *</label><select class="form-control" wire:model.live="mode_paiement"><option value="espece">Espece</option><option value="mobile_money">Mobile money</option><option value="banque">Banque</option><option value="autre">Autre</option></select></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Reference</label><input type="text" class="form-control" wire:model.live="reference"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Piece justificative</label><input type="file" class="form-control" wire:model.live="piece_jointe">@error('piece_jointe') <span class="text-danger">{{ $message }}</span> @enderror</div>
                        </div>
                        <div class="mb-3"><label class="form-label">Motif</label><textarea class="form-control" rows="3" wire:model.live="motif"></textarea></div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button><button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="piece_jointe,addMouvement,updateMouvement"><span wire:loading.remove wire:target="piece_jointe,addMouvement,updateMouvement">{{ $editMode ? 'Modifier' : 'Enregistrer' }}</span><span wire:loading wire:target="piece_jointe,addMouvement,updateMouvement">Traitement...</span></button></div>
                </form>
            </div></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('openFinanceModal', () => new bootstrap.Modal(document.getElementById('financeModal')).show());
        Livewire.on('financeSaved', () => bootstrap.Modal.getInstance(document.getElementById('financeModal'))?.hide());
    });
</script>
@endpush
