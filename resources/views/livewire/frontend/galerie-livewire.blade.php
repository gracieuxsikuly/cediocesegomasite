<div>
    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque">Gallery</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('acceuil') }}">Acceuil</a></li>
								<li class="breadcrumb-item active" aria-current="page">gallery</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Photo Gallery Section Start -->
	<div class="page-gallery">
		<div class="container">
			<!-- gallery section start -->
			<div class="row gallery-items page-gallery-box">
                @forelse ($galeries as $gallerie )
                   <div class="col-lg-4 col-6">
                    <!-- image gallery start -->
                    <div class="photo-gallery wow fadeInUp" data-cursor-text="View">
                        <a href="{{ asset('storage/' . $gallerie->liens) }}">
                            <figure class="image-anime">
                                <img src="{{ asset('storage/' . $gallerie->liens) }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <!-- image gallery end -->
                </div> 
                @empty
                    <p class="text-danger">No image found</p>
                @endforelse
                <div class="col-lg-12">
                    <!-- Page Pagination Start -->
                     @if(method_exists($galeries, 'links'))
                    <div class="page-pagination wow fadeInUp" data-wow-delay="0.5s">
                        <ul class="pagination">
                           {{-- pagination livewire avec link --}}
                            {{ $galeries->links('livewire::bootstrap') }}
                        </ul>
                    </div>
                      @endif
                    <!-- Page Pagination End -->
                </div>
			</div>
			<!-- gallery section end -->
		</div>
	</div>
	<!-- Photo Gallery Section End -->

</div>
