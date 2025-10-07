<header class="main-header">
		<div class="header-sticky">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					<!-- Logo Start -->
					<a class="navbar-brand" href="{{ route('acceuil') }}" style="display: flex; align-items: center; text-decoration: none;">
    <img src="{{ asset('asset_frontend/images/logoce.png') }}" alt="Logo" width="50" height="50">
    <div style="display: flex; flex-direction: column; margin-left: 10px;">
        <span style="color: white; font-size: 20px; font-weight: bold;">CROISADE EUCHARISTIQUE</span>
        <span style="color: white; font-size: 16px; font-weight: normal;">DIOCÈSE DE GOMA</span>
    </div>
</a>
					<!-- Logo End -->

					<!-- Main Menu Start -->
					<div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('acceuil') }}">Acceuil</a>
                                </li>                                
                                 <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">Apropos de nous</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('doyennes') }}">Doyennés</a></li>
                               
                                <li class="nav-item"><a class="nav-link" href="{{ route('activites') }}">Activités</a>
                                </li>
                                 <li class="nav-item"><a class="nav-link" href="{{ route('ressources') }}">Ressources</a>
                                </li>
                                  <li class="nav-item"><a class="nav-link" href="{{ route('galleriephoto') }}">Galerie</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- Let’s Start Button Start -->
                        <div class="header-btn d-inline-flex">
                            <a href="{{ route('login') }}" class="btn-default">Connexion</a>
                        </div>
                        <!-- Let’s Start Button End -->
					</div>
					<!-- Main Menu End -->
					<div class="navbar-toggle"></div>
				</div>
			</nav>
			<div class="responsive-menu"></div>
		</div>
	</header>