<div>
    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque">Contactez nous</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Accueil</a></li> {{-- Correction: acceuil -> accueil --}}
								<li class="breadcrumb-item active" aria-current="page">contactez nous</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Contact Information Start -->
                    <div class="contact-information">
                        <!-- Contact Information Title Start -->
                        <div class="section-title">
                               <h2 class="text-anime-style-2" data-cursor="-opaque"> <span>LA CROISADE EUCHARISTIQUE</span></h2> {{-- Correction: EUHARISTIQUE -> EUCHARISTIQUE --}}
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Contactez pour plus d'Informations</p>
                        </div>
                        
                        <div class="contact-info-list">
                        
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
                                
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-phone.svg')}}" alt="Icône téléphone">
                                    <h3>(+243) 824 500 018</h3>
                                </div>
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-phone.svg')}}" alt="Icône téléphone">
                                    <h4>(+243)  990 378 202</h4>
                                </div>
                              <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-phone.svg')}}" alt="Icône téléphone"><h5>(+243)  995 764 961</h5>
                                 
                                </div>                       
                        
                            </div>
                           
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-mail.svg')}}" alt="Icône email">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <p>Envoi un message</p>
                                    <h3>croisadeeucharistique.diocese.goma@gmail.com</h3>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Contact Info Item End -->

                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.75s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-location.svg')}}" alt="Icône localisation">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <p>Notre localisation</p>
                                    <h3>RDC-NordKivu-Goma</h3>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Contact Info Item End -->
                        </div>
                        <!-- Contact Information List End -->
                    </div>
                    <!-- Contact Information End -->
                </div>

                <div class="col-lg-6">
                    <!-- Contact Form Start -->
                    <div class="contact-us-form wow fadeInUp" data-wow-delay="0.25s">
                        {{-- Formulaire Livewire --}}
                        <form wire:submit.prevent="submitForm" class="wow fadeInUp" data-wow-delay="0.5s">
                            @csrf
                            <div class="row">
                                {{-- Champ Nom --}}
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nom" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Champ Email --}}
                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Adresse Email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Champ Sujet --}}
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" wire:model="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Sujet" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Champ Message --}}
                                <div class="form-group col-md-12 mb-4">
                                    <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="5" placeholder="Message" required></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Message de succès --}}
                                @if($successMessage)
                                    <div class="col-md-12 mb-4">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ $successMessage }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif

                                {{-- Bouton d'envoi --}}
                                <div class="col-lg-12">
                                    <div class="Contacts-btn">
                                        <button type="submit" class="btn-default" wire:loading.attr="disabled">
                                            <span wire:loading.remove>Envoyer le message</span>
                                            <span wire:loading>Envoi en cours...</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Map Start -->
	<div class="google-map leaflet-map-section">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-12">
                    <div class="google-map-iframe leaflet-map-card">
                        <div id="cathedrale-map" style="height: 460px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Map End -->
</div>

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="">
<style>
    .leaflet-map-section {
        padding: 0 0 100px;
        overflow: hidden;
    }

    .leaflet-map-card {
        position: relative;
        height: 460px;
        max-height: 460px;
        overflow: hidden;
        border-radius: 8px;
        border: 1px solid #e9e9e9;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        background: #fff;
    }

    .leaflet-map-card #cathedrale-map,
    .leaflet-map-card .leaflet-container {
        position: absolute;
        inset: 0;
        width: 100% !important;
        height: 100% !important;
        border-radius: 8px;
        z-index: 1;
    }

    .leaflet-map-card img {
        max-width: none !important;
    }

    @media (max-width: 767px) {
        .leaflet-map-section {
            padding-bottom: 70px;
        }

        .leaflet-map-card {
            height: 360px;
            max-height: 360px;
            border-radius: 6px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mapElement = document.getElementById('cathedrale-map');
        if (!mapElement || mapElement.dataset.initialized) return;

        mapElement.dataset.initialized = 'true';
        const position = [-1.6792, 29.2285];

        L.Icon.Default.imagePath = '';
        L.Icon.Default.mergeOptions({
            iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
            iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png'
        });

        const map = L.map('cathedrale-map').setView(position, 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        L.marker(position).addTo(map)
            .bindPopup('<strong>Paroisse Cathedrale Saint Joseph</strong><br>Goma, Nord-Kivu')
            .openPopup();
    });
</script>
@endpush