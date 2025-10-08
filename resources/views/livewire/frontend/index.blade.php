<div>
   <!-- Hero Section Start -->
	<div class="hero hero-slider">
        <div class="hero-slider-layout">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Hero Slide Start -->
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <!-- Slider Image Start -->
                            <div class="hero-slider-image">
                                <img src="{{asset('asset_frontend/images/hero-bg-3.jpg')}}" alt="">
                            </div>
                            <!-- Slider Image End -->
    
                            <!-- Slider Content Start -->
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <!-- Hero Content Start -->
                                        <div class="hero-content">
                                            <!-- Section Title Start -->
                                            <div class="section-title">
                                                <h3 class="wow fadeInUp">L'adoration</h3>
                                                <h1 class="text-anime-style-2" data-cursor="-opaque">Notre device</h1>
                                                <p class="wow fadeInUp" data-wow-delay="0.25s">Prie, communie, sacrifie-toi, sois apotre</p>
                                            </div>
                                            <!-- Section Title End -->
                    
                                            <!-- Hero Content Body Start -->
                                            <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                                                <a href="{{ route('ressources') }}" class="btn-default"><span>Ressources</span></a>
                                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted"><span>Rejoindre la croisade eucharistique</span></a>
                                            </div>
                                            <!-- Hero Content Body End -->
                                        </div>
                                        <!-- Hero Content End -->
                                    </div>
                                </div>
                            </div>
                            <div class="down-arrow">
                                <a href="#home-about"><i class="fa-solid fa-arrow-down-long"></i></a>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div>
                    <!-- Hero Slide End -->

                    <!-- Hero Slide Start -->
                    <div class="swiper-slide">
                        <div class="hero-slide">
                            <!-- Slider Image Start -->
                            <div class="hero-slider-image">
                                <img src="{{asset('asset_frontend/images/hero-bg-4.jpg')}}" alt="">
                            </div>
                            <!-- Slider Image End -->
    
                            <!-- Slider Content Start -->
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <!-- Hero Content Start -->
                                        <div class="hero-content">
                                            <!-- Section Title Start -->
                                            <div class="section-title">
                                                <h3 class="wow fadeInUp">Avec le Christ!!!</h3>
                                                <h1 class="text-anime-style-2" data-cursor="-opaque">Rien n'est impossible</h1>
                                                <p class="wow fadeInUp" data-wow-delay="0.25s">Une journée sans messe est une journée sans soleil</p>
                                            </div>
                                            <!-- Section Title End -->
                    
                                            <!-- Hero Content Body Start -->
                                            <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                                                <a href="{{ route('ressources') }}" class="btn-default"><span>Ressources</span></a>
                                                <a href="{{ route('contact') }}" class="btn-default btn-highlighted"><span>Rejoindre la croisade eucharistique</span></a>
                                            </div>
                                            <!-- Hero Content Body End -->
                                        </div>
                                        <!-- Hero Content End -->
                                    </div>
                                </div>
                            </div>
                            <div class="down-arrow">
                                <a href="#home-about"><i class="fa-solid fa-arrow-down-long"></i></a>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div>
                    <!-- Hero Slide End -->
                     
                </div>
                <div class="hero-pagination"></div>
            </div>
        </div>		
	</div>
	<!-- Hero Section End -->

    <!-- Our Scrolling Ticker Section Start -->
    <div class="our-scrolling-ticker">
        <!-- Scrolling Ticker Start -->
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span></span>
                <span></span>
                  <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">Niya ya mwezi :{{$this->mois}}</span>
                <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">{{$this->designation}}</span>
                <span></span>
            </div>

            <div class="scrolling-content">
                <span></span>
                  <span></span>
                  <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">Niya ya mwezi :{{$this->mois}}</span>
                <span><img src="{{asset('asset_frontend/images/icon-sparkles.svg')}}" alt="">{{$this->designation}}</span>
                <span></span>
            </div>
        </div>
    </div>
	<!-- Scrolling Ticker Section End -->

    <!-- About Us Section Start -->
	<div class="about-us" id="home-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Image Start -->
                    <div class="about-image">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="{{asset('asset_frontend/images/about-us-img-3.jpg')}}" alt="">
                            </figure>
                        </div>

                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                <img src="{{asset('asset_frontend/images/about.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- About Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">A propos de nous</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">
                                Prie, communie, sacrifie-toi,<span>sois apotre</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s" style="text-align: justify;">La Croisade Eucharistique est un mouvement d’action catholique dont la spiritualité
est centrée sur l’Eucharistie. Mouvement pontifical à vocation apostolique, elle vise à
contribuer à la vie de l’Église par la formation d’une véritable École primaire de
l’action catholique.</p>
                            <p class="wow fadeInUp" data-wow-delay="0.5s" style="text-align: justify;">
                                Fidèle à sa spiritualité et à son charisme, la Croisade Eucharistique trouve son
activité principale dans <b>la célébration de la Messe</b> et <b>l’adoration du Saint-Sacrement</b>, considérées comme le cœur de sa mission. Cette culture eucharistique
confère au mouvement un caractère à la fois contemplatif et sacerdotal, tout en
demeurant actif et ludique. Elle a 4 sections : 

                            </p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Content List Start -->
                        <div class="about-content-body">
                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-1.svg')}}" alt="">
                                </div>
                                {{-- les enfants (6-12 ans), les adolescents (13-17 ans), les jeunes (18-35 ans) et les adultes (36 ans et plus). --}}
                                <div class="about-list-item-content">
                                    <h3>A.	La Section des Croisillons et Croisillonne (4-10 ans)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.25s">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-2.svg')}}" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>B.	La section des Feux Nouveaux (11-14 ans)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.5s">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-3.svg')}}" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>C.	La section des Cadets (tes) (15-25 ans)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.75s">
                                <div class="icon-box">
                                    <img src="{{asset('asset_frontend/images/icon-about-list-4.svg')}}" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>D.	La section apostolique (Equap) (26 ans et plus)</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->
                        </div>
                        <!-- About Content List End -->


                        <!-- About Us Footer Start -->
                        <div class="about-us-footer wow fadeInUp" data-wow-delay="1s">
                            <a href="{{ route('aboutus') }}" class="btn-default">En savoir plus</a>
                        </div>
                        <!-- About Us Footer End -->
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    
     <!-- Our Mission Section Start -->
    <div class="join-worship">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mission-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">SILAHA ZETU</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Sala, sadaka <span>Komunio, na Kitume</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Mission Content Body Start -->
                        <div class="mission-content-body">
                            <h3 class="wow fadeInUp" data-wow-delay="0.25s">UKOMO WETU</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.5s"> Ukomo wetu ni kulinganisha maisha yetu
na ya yesu kristu “nime ishi ila si mimi tena ni kristu anaye
ishi ndani mwangu” sherti kuangaliya njiya saba (7 piste) na
namna saba (7 moyens) kwa kufikiya ukomo wa croisade
eucharistique</p>
                        </div>
                        <!-- Mission Content Body End -->
                        <div class="mission-content-body">
                            <h3 class="wow fadeInUp" data-wow-delay="0.25s">LES 7 PISTE D’UN CROISE / NJIYA 7 ZA MUCROISE</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.5s"> 
                                1. Kukombowa roho zinazo gandamizwa na shetani kuzileta kwake yesu.<br>
                                2. Kufata umoja wa wandugu wa kristu wote piya makanisa zote.<br>
                                3. Kuishi maisha ya uusiano na yesu kristu katinda vikundi vya sala .<br>
                                4. Kwa kipekee kuishi maisha ya sala na ushirika kwa kuchangiya neno la yesu na wengine wa kristu.<br>
                                5. Kusikiya uito wamatendo ya roho mtakatifu ndani ya maisha yako kila siku na ndani ya tukiyo ya histoire yako.<br>
                                6. Kuishi kama vile mitume wa sasa.<br>
                                7. Kuishi mwenyi heri kwakuendelesha maisha ya kristu.<br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Mission Image Start -->
                    <div class="mission-image">
                        <!-- Mission Image Start -->
                        <div class="mission-img">
                            <figure class="image-anime reveal">
                                <img src="{{asset('asset_frontend/images/hero-bg-5.jpg')}}" alt="">
                            </figure>
                        </div>
                        <!-- Mission Image End -->

                        <!-- Mission Life Circle Start -->
                        <div class="mission-life-circle">
                            <img src="{{asset('asset_frontend/images/CElogs.png')}}" alt="">
                        </div>
                        <!-- Mission Life Circle End -->
                    </div>
                    <!-- Mission Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Mission Section End -->

    <!-- Our Counter Section Start -->
    <div class="our-counter">
        <div class="container">
            <div class="row counter-box">
                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">1500</span>+</h2>
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">
                            <h3>Croisillons</h3>
                            <p>sur 6300 croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">2000</span>+</h2>
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">                            
                            <h3>Feux nouveaux</h3>
                            <p>sur 6300 croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">1800</span>+</h2>                            
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">
                            <h3>Cadet(te)s</h3>
                           <p>sur 6300 croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Counter Item Start -->
                    <div class="counter-item">
                        <!-- Counter Title Start -->
                        <div class="counter-title">
                            <h2><span class="counter">1000</span>+</h2>
                        </div>
                        <!-- Counter Title End -->                     

                        <!-- Counter Content Start -->
                        <div class="counter-content">
                            <h3>Equaps</h3>
                           <p>sur 6300 croises du Diocese de Goma</p>
                        </div>
                        <!-- Counter Content End -->
                    </div>
                    <!-- Counter Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Counter Section End -->

   

    <!-- Our Services Section Start -->
    <div class="our-services">
        <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    {{-- <h3 class="wow fadeInUp">LES ENGAGEMENTS(MAAGANO)</h3> --}}
                    <h2 class="text-anime-style-2" data-cursor="-opaque">LES ENGAGEMENTS(MAAGANO)<span></span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-1.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;">
                        Ibada ya ahadi ya kupokelewa kama mwanamemba mpya wa C.E inaanza na wimbo wa  <b>( veni creator)</b> na kumalizika na <b>( hymne : je suis croise)</b>. Inafanyika ndani ya ibada ya missa takatifu, kiisha homelia ya padri, kwani  
« mbali ya kanisa hakuna wokovu wowote »  ( mtakatifu Augistino ) 
Ibada hii inaelekea wanamemba wapya ( bila tafauti ya mikasama) ambamo wame kwisha kuonesha ushunjaa wao na kuhuzuria kama desturi 
mafundisho ya kuelekea kawaida ya chama, ikiwezekana, muda ya myezi sita.
 Ndiyo kusema Ibada hii ya weza ku fanyika tu mara mbili kwa mwaka katika parokia, secteur, ao sous-secteur fulani fulani. 

                            </p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Aspirant croisé(kukopelewa upya)</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-2.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;">Ibada ya ahadi ya kupewa daraja la umiliki inaanza na wimbo wa
                                <b>kuomba nguvu ya Roho Mtakatifu</b> na kumalizika na hymne <b>“Debout fils de l’Eglise”</b>
Ibada hii ni matengeneo ambayo hupatia mpenzi wa Ukaristia umiliki wa kupewa madaraka ya uongozi ndani ya mkasama moja. Shabaa kubwa ni kwamba waongozi hawa wafikie hali ya kujenga ushirikiano ao uhusiano bora na utengeneo wa kweli ndani ya chama cha Croisade Eucharistique ;  hasa kusaidia kufasiriya wanamemba wote mambo yanayo unda samani yetu kama, kwa Eklezia, moja na vyama vilivyo shamba la miche kwa mwito mbali mbali.
 
	Ibada hii, inatolewa vile ndani ya ibada ya Misa Takatifu kiisha Homelia ya Padri 
</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Feu Aspirant croisé(daraja la umiliki)</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-3.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;">Ibada hii inaanza na wimbo wa <b>« zaburi 115 »</b> na kumalizika na <b>« hymne de la promesse »</b>
Inafanyika ndani ya misa takatifu, Kiisha Komunio na yalazimisha Sacramenta ya Ukaristia takatifu.
 Ahadi ya ibada hii inatambulisha vema mpenzi wa Ukaristia katika uito wake wa pekee,
ambamo:
- Anatolea maisha yake yote kwa kuiunganisha na sadaka ya Yesu Kristu kwa ajili ya wokovu wa
dunia nzima;
- Anahaidia uaminifu ndani ya Chama cha Wapenzi wa Ukaridtia na kushika mapashwa yake:
Sala, Sadaka, Komunio na Kitume.
- Anajikusudia kujitolea bila kuchoka kwa ajili ya Wapenzi wote;
- Anajikusuida pia kupenda Misa, kufwata Misa na kuishi Misa; kuabudu Ukaristia takatifu,
kupenda na kuheshimu Mama Bikira Maria, Malkia wa Croisade Eucharistia.
</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Apostolat croisé(Ahadi Ya Kuagania Uaminifu Kwa Moyo Mtakatifu Wa Yesu Na Moyo Safi Wa Bikira Maria Ndani Ya Chama)</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="{{asset('asset_frontend/images/icon-service-4.svg')}}" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p style="text-align: justify;"> Ibada hii inaanza na wimbo wa <b>« zaburi 115 »</b> na kumalizika na <b>« hymne de la promesse »</b>
Inafanyika ndani ya misa takatifu, Kiisha Komunio na yalazimisha Sacramenta ya Ukaristia takatifu.
 Ahadi ya ibada hii inatambulisha vema mpenzi wa Ukaristia katika uito wake wa pekee,
ambamo:
- Anatolea maisha yake yote kwa kuiunganisha na sadaka ya Yesu Kristu kwa ajili ya wokovu wa
dunia nzima;
- Anahaidia uaminifu ndani ya Chama cha Wapenzi wa Ukaridtia na kushika mapashwa yake:
Sala, Sadaka, Komunio na Kitume.
- Anajikusudia kujitolea bila kuchoka kwa ajili ya Wapenzi wote;
- Anajikusuida pia kupenda Misa, kufwata Misa na kuishi Misa; kuabudu Ukaristia takatifu,
kupenda na kuheshimu Mama Bikira Maria, Malkia wa Croisade Eucharistia.</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>Feu Apostolat, Chevalier du Christ et Vrai soldat du Christ</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="{{asset('asset_frontend/images/arrow-white.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Service Ticker Start -->
	<div class="service-ticker">
		<div class="scrolling-ticker">
            <div class="scrolling-ticker-box">
                <div class="scrolling-content">
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">L'adoration</span>					
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Notre devise</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Le foulard</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Notre drapeau</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Avec le Christ</span>				
                </div>

                <div class="scrolling-content">
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Rien n'est impossible</span>					
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Dieu le veux</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Toujours plus</span>				
                    <span><img src="{{asset('asset_frontend/images/icon-asterisk.svg')}}" alt="">Toujours mieux</span>				
                </div>
            </div>
        </div>
	</div>
	<!-- Service Ticker End -->

    <!-- Our Ministries Section Start -->
    <div class="our-ministries">
         <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp"> Activités</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Nos Recentes<span> Activites</span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                @forelse ($activities as $activity)
                     <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="#" class="image-anime" data-cursor-text="View">
                                    <img src="{{ asset('storage/' . $activity->image1) }}" alt="">
                                </a>
                            </figure>
                            <!-- Sermons Meta Start -->
                            <div class="sermons-meta">
                                @php
                                    $date = \Carbon\Carbon::parse($activity->dateactivite);
                                @endphp

                                <h3>{{ $date->format('d') }}</h3>
                                <p>{{ $date->translatedFormat('F') }}</p>
                            </div>
                            <!-- Sermons Meta End -->

                            <div class="sermons-audio-icon">
                                <a href="#"><img src="{{asset('asset_frontend/images/audio-play-icon.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>{{ $activity->titre }}</h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-user"></i>Lieu : <span>{{ $activity->emplacement }}</span></li>
                                    <li><i class="fa-solid fa-tag"></i>Categories : <span>{{ $activity->typeactivite }}</span></li>
                                    <li><i class="fa-regular fa-calendar-days"></i>Date & Heure : <span>{{ $date->translatedFormat('F') }} {{ $date->format('d') }} - on {{ $activity->start_time }} - {{ $activity->end_time }}</span></li>
                                </ul>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>
                @empty
                    <p>Aucune activité pour le moment</p>
                @endforelse
               
            </div>
        </div>
    </div>
    <!-- Our Ministries Section End -->

  

    <!-- Verse Church Section Start -->
    <div class="verse-church">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Verse Church Content Start -->
                    <div class="verse-church-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">verse of the day</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Life is a Church that Loves <span>God and People.</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Life is a church dedicated to loving God and serving people. We foster a welcoming community where faith and compassion drive everything we do, striving to make a positive impact both spiritually and socially. Join us in this journey.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Verse Church Btn Start -->
                        <div class="verse-church-btn wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default">donate now</a>
                        </div>
                        <!-- Verse Church Btn End -->
                    </div>
                    <!-- Verse Church Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Verse Church Section End -->

    <!-- Donate Now Section Start -->
    <div class="donate-now parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-4">
                    <div class="intro-video-box">
                        <!-- Video Play Button Start -->
                        <div class="video-play-button">
                            <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video" data-cursor-text="Play">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                        <!-- Video Play Button End -->
                    </div>
                </div>

                <div class="col-lg-6 col-md-8">
                    <!-- Donate Box Start -->
                    <div class="donate-box">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">donate now</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Support <span>Our Mission</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Your generous support enables to continue its mission of spreading God's love and serving our community.</p>
                        </div>
                        <!-- Section Title End -->

                        <div class="donate-form wow fadeInUp" data-wow-delay="0.5s">
                            <form id="donateForm" action="#" method="POST">
                                <div class="form-group mb-4">
                                    <input type="text" name="text" class="form-control" placeholder="donate now ..." required>
                                </div>

                                <fieldset class="donate-value-box">                                  
                                    <div class="donate-value">
                                        <input type="radio" id="value1" name="value" value="value1" checked>
                                        <label for="value1">$ 100.00</label>
                                      </div>
                                    
                                      <div class="donate-value">
                                        <input type="radio" id="value2" name="value" value="value2">
                                        <label for="value2">$ 200.00</label>
                                      </div>
                                    
                                      <div class="donate-value">
                                        <input type="radio" id="value3" name="value" value="value3">
                                        <label for="value3">$ 300.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value4" name="value" value="value4">
                                          <label for="value4">$ 400.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value5" name="value" value="value5">
                                          <label for="value5">$ 500.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value6" name="value" value="value6">
                                          <label for="value6">$ 600.00</label>
                                      </div>
                                </fieldset>

                                <div class="form-group-btn">
                                    <button type="submit" class="btn-default">donate now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Donate Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Donate Now Section End -->

    <!-- Our Blog Start -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                     <!-- Section Title Start -->
                     <div class="section-title">
                        <h3 class="wow fadeInUp">latest post</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Read Our <span>Latest Articles</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="#" class="image-anime">
                                    <img src="{{asset('asset_frontend/images/post-1.jpg')}}" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Body Start -->
                        <div class="post-item-body">
                            <h2><a href="#">This Week's Sermon: Embracing Forgiveness</a></h2>
                        </div>
                        <!-- Post Item Body End-->

                        <!-- Post Item Footer Start-->
                        <div class="post-item-footer">
                            <a href="#" class="read-more-btn">read more</a>
                        </div>
                        <!-- Post Item Footer End-->
                    </div>
                    <!-- Blog Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="#" class="image-anime">
                                    <img src="{{asset('asset_frontend/images/post-2.jpg')}}" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Body Start -->
                        <div class="post-item-body">
                            <h2><a href="#">Join Us for the Christmas Eve Candlelight Service</a></h2>
                        </div>
                        <!-- Post Item Body End-->

                        <!-- Post Item Footer Start-->
                        <div class="post-item-footer">
                            <a href="#" class="read-more-btn">read more</a>
                        </div>
                        <!-- Post Item Footer End-->
                    </div>
                    <!-- Blog Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Blog Item Start -->
                    <div class="blog-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Post Featured Image Start-->
                        <div class="post-featured-image" data-cursor-text="View">
                            <figure>
                                <a href="#" class="image-anime">
                                    <img src="{{asset('asset_frontend/images/post-3.jpg')}}" alt="">
                                </a>
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- post Item Body Start -->
                        <div class="post-item-body">
                            <h2><a href="#">New Bible Study Series Starts This Sunday</a></h2>
                        </div>
                        <!-- Post Item Body End-->

                        <!-- Post Item Footer Start-->
                        <div class="post-item-footer">
                            <a href="#" class="read-more-btn">read more</a>
                        </div>
                        <!-- Post Item Footer End-->
                    </div>
                    <!-- Blog Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Blog End -->
</div>