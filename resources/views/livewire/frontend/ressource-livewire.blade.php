<div>
     <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque">Nos Ressources</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Acceuil</a></li>
								<li class="breadcrumb-item active" aria-current="page">Nos Ressources</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Blog Start -->
    <div class="page-blog">
        <div class="container">
            <div class="row">
                   @forelse ($resources as $resource)
    <div class="col-lg-4 col-md-6">
        <!-- Blog Item Start -->
        <div class="blog-item wow fadeInUp">
            <!-- Post Featured Image Start-->
            <div class="post-featured-image" data-cursor-text="View">
                <figure>
                    <a href="#" class="image-anime" data-bs-toggle="modal" data-bs-target="#resourceModal{{ $resource->id }}">
                        <!-- Toujours afficher post-1.png -->
                        <img src="{{ asset('asset_frontend/images/post-1.png') }}" alt="{{ $resource->titre }}">
                    </a>
                </figure>
            </div>
            <!-- Post Featured Image End -->

            <!-- Post Item Body Start -->
            <div class="post-item-body">
                <h2><a href="#" data-bs-toggle="modal" data-bs-target="#resourceModal{{ $resource->id }}">{{ $resource->titre }}</a></h2>
            </div>
            <!-- Post Item Body End-->

            <!-- Post Item Footer Start-->
            <div class="post-item-footer">
                <!-- Badge pour le type de ressource -->
                <span class="badge 
                    @if($resource->formatressource === 'pdf') bg-danger
                    @elseif($resource->formatressource === 'audio') bg-success
                    @elseif($resource->formatressource === 'video') bg-primary
                    @elseif($resource->formatressource === 'image') bg-info
                    @else bg-secondary
                    @endif
                ">
                    <i class="fas 
                        @if($resource->formatressource === 'pdf') fa-file-pdf
                        @elseif($resource->formatressource === 'audio') fa-file-audio
                        @elseif($resource->formatressource === 'video') fa-file-video
                        @elseif($resource->formatressource === 'image') fa-file-image
                        @else fa-file
                        @endif
                    "></i>
                    {{ strtoupper($resource->formatressource ?? 'file') }}
                </span>
                
                <a href="#" class="read-more-btn" data-bs-toggle="modal" data-bs-target="#resourceModal{{ $resource->id }}">Lire plus</a>
            </div>
            <!-- Post Item Footer End-->
        </div>
        <!-- Blog Item End -->
    </div>

    <!-- Modal pour la ressource -->
    <div class="modal fade" id="resourceModal{{ $resource->id }}" tabindex="-1" aria-labelledby="resourceModalLabel{{ $resource->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resourceModalLabel{{ $resource->id }}">
                        <i class="fas 
                            @if($resource->formatressource === 'pdf') fa-file-pdf text-danger
                            @elseif($resource->formatressource === 'audio') fa-file-audio text-success
                            @elseif($resource->formatressource === 'video') fa-file-video text-primary
                            @elseif($resource->formatressource === 'image') fa-file-image text-info
                            @else fa-file text-secondary
                            @endif
                        "></i>
                        {{ $resource->title }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($resource->file)
                        @php
                            $fileExtension = strtolower(pathinfo($resource->file, PATHINFO_EXTENSION));
                            $fileName = basename($resource->file);
                        @endphp
                        
                        <!-- PDF Viewer -->
                        @if($fileExtension === 'pdf')
                            <div class="pdf-viewer">
                                <embed src="{{ asset('storage/' . $resource->file) }}#toolbar=1&navpanes=1" 
                                       type="application/pdf" 
                                       width="100%" 
                                       height="500px"
                                       class="rounded border">
                            </div>
                        
                        <!-- Audio Player -->
                        @elseif(in_array($fileExtension, ['mp3', 'wav', 'ogg', 'm4a']))
                            <div class="audio-player">
                                <div class="d-flex align-items-center gap-3 bg-light p-3 rounded">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-music fa-2x text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <audio controls class="w-100">
                                            <source src="{{ asset('storage/' . $resource->file) }}" 
                                                    type="audio/{{ $fileExtension }}">
                                            Votre navigateur ne supporte pas la lecture audio.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        
                        <!-- Video Player -->
                        @elseif(in_array($fileExtension, ['mp4', 'webm', 'ogg', 'mov', 'avi']))
                            <div class="video-player text-center">
                                <video controls width="100%" class="rounded" style="max-height: 400px;">
                                    <source src="{{ asset('storage/' . $resource->file) }}" 
                                            type="video/{{ $fileExtension }}">
                                    Votre navigateur ne supporte pas la lecture vidéo.
                                </video>
                            </div>
                        
                        <!-- Image Preview -->
                        @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp']))
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $resource->file) }}" 
                                     alt="{{ $resource->title }}" 
                                     class="img-fluid rounded" 
                                     style="max-height: 500px;">
                            </div>
                        
                        <!-- Other file types -->
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-file fa-3x text-secondary mb-3"></i>
                                <p class="text-muted">Aperçu non disponible pour ce type de fichier</p>
                                <p class="small text-muted">Fichier: {{ $fileName }}</p>
                            </div>
                        @endif
                        
                        <!-- Download button -->
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas 
                                    @if($fileExtension === 'pdf') fa-file-pdf text-danger
                                    @elseif(in_array($fileExtension, ['mp4', 'webm', 'ogg', 'mov', 'avi'])) fa-file-video text-primary
                                    @elseif(in_array($fileExtension, ['mp3', 'wav', 'ogg', 'm4a'])) fa-file-audio text-success
                                    @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'])) fa-file-image text-info
                                    @else fa-file text-secondary
                                    @endif
                                "></i>
                                {{ $fileName }}
                            </small>
                            <a href="{{ asset('storage/' . $resource->file) }}" 
                               download 
                               class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-download"></i> Télécharger
                            </a>
                        </div>
                        
                        {{-- <!-- Description -->
                        @if($resource->description)
                            <div class="mt-3 p-3 bg-light rounded">
                                <h6>Description:</h6>
                                <p class="mb-0">{{ $resource->description }}</p>
                            </div>
                        @endif --}}
                        
                    @else
                        <div class="alert alert-warning text-center">
                            <i class="fas fa-exclamation-triangle"></i> Aucun fichier associé à cette ressource.
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    @if($resource->file)
                        <a href="{{ asset('storage/' . $resource->file) }}" 
                           download 
                           class="btn btn-primary">
                            <i class="fas fa-download"></i> Télécharger
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <p class="text-center text-muted">Aucune ressource</p>
    </div>
@endforelse

                <div class="col-lg-12">
                    <!-- Page Pagination Start -->
                     @if(method_exists($resources, 'links'))
                    <div class="page-pagination wow fadeInUp" data-wow-delay="0.5s">
                        <ul class="pagination">
                           {{-- pagination livewire avec link --}}
                            {{ $resources->links('livewire::bootstrap') }}
                        </ul>
                    </div>
                      @endif
                    <!-- Page Pagination End -->
               
                </div>
            </div>
        </div>
    </div>
    <!-- Page Blog End -->
</div>
