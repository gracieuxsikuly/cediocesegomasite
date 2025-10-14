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
                        <!-- Contact Information Title End -->

                        <!-- Contact Information List Start -->
                        <div class="contact-info-list">
                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-phone.svg')}}" alt="Icône téléphone">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <p>contact</p>
                                    <h3>(+243) 824 500 0187</h3>
                                    <h4>(+243)  990 378 202</h4>
                                    <h5>(+243)  995 764 961</h5>
                                    <h5>(+243)  819 469 877</h5>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Contact Info Item End -->

                            <!-- Contact Info Item Start -->
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

    <!-- Google Map Start -->
	<div class="google-map">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-12">
                    <!-- Google Map Iframe Start -->
                    <div class="google-map-iframe">
                        {{-- Correction: Remplacement de la carte New York par Goma, RDC --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d408595.152944246!2d28.97278045!3d-1.65439035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dd3d63ab1c3e61%3A0x2d0d2e8a6b9a4f1f!2sGoma%2C%20Nord-Kivu%2C%20R%C3%A9publique%20D%C3%A9mocratique%20du%20Congo!5e0!3m2!1sfr!2sfr!4v1703158537552" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map Iframe End -->
                </div>
            </div>
        </div>
    </div>
	<!-- Google Map End -->
</div>