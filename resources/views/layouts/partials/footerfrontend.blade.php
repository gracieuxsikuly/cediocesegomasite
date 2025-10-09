<footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- About Footer Start -->
                    <div class="about-footer">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <img src="{{ asset('asset_frontend/images/logoce.png') }}" alt=""
                            width="80" height="80" >
                        </div>
                        <!-- Footer Logo End -->

                        <!-- About Footer Content Start -->
                        <div class="about-footer-content">
                            <p>
                              La Croisade Eucharistique est un mouvement d’action catholique dont la spiritualité
est centrée sur l’Eucharistie. Mouvement pontifical à vocation apostolique, elle vise à
contribuer à la vie de l’Église par la formation d’une véritable École primaire de
l’action catholique.
                            </p>
                        </div>
                        <!-- Footer Social Links Start -->
                        {{-- <div class="footer-social-links">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>                                                                
                            </ul>
                        </div> --}}
                        <!-- Footer Social Links End -->
                        
                    </div>
                    <!-- About Footer End -->
                </div>
                
                <div class="col-lg-2 col-md-6 col-6">
                    <!-- About Links Start -->
                    <div class="footer-links">
                        <h3>Liens rapides</h3>
                        <ul>
                            <li><a href="{{ route('acceuil') }}">Accueil</a></li>
                              <li><a href="{{ route('aboutus') }}">Apropos de nous</a></li>
                            <li><a href="{{ route('doyennes') }}">Doyennés</a></li>
                            <li><a href="{{ route('activites') }}">Activités</a></li>
                            <li><a href="{{ route('ressources') }}">Ressources</a></li>
                            <li><a href="{{ route('galleriephoto') }}">Galerie</a></li>
                        </ul>
                    </div>
                    <!-- About Links End -->
                </div>

                {{-- <div class="col-lg-3 col-md-4 col-6">
                    <!-- About Links Start -->
                    <div class="footer-links">
                        <h3>our services</h3>
                        <ul>
                            <li><a href="#">support groups</a></li>
                            <li><a href="#">special events</a></li>
                            <li><a href="#">online services</a></li>
                            <li><a href="#">pastoral care</a></li>
                            <li><a href="#">sunday worship</a></li>
                        </ul>
                    </div>
                    <!-- About Links End -->
                </div> --}}

                <div class="col-lg-6 col-md-6">
                    <!-- About Links Start -->
                    <div class="footer-contact">
                        <h3>contact</h3>
                        <!-- Footer Contact Details Start -->
                        <div class="footer-contact-details">
                            <!-- Footer Info Box Start -->
                            <div class="footer-info-box">
                                <div class="icon-box">
                                    <img src="{{ asset('asset_frontend/images/icon-phone.svg') }}" alt="">
                                </div>
                                <div class="footer-info-box-content">
                                    <p>(+243) 824 500 018| 990 378 202</p>
                                    <p>(+243) 995764961| 0819469877</p>
                                    {{-- « croisadeeucharistique.diocese.goma@gmail.com » --}}
                                </div>                                
                            </div>
                            <!-- Footer Info Box End -->

                            <!-- Footer Info Box Start -->
                            <div class="footer-info-box">
                                <div class="icon-box">
                                    <img src="{{ asset('asset_frontend/images/icon-mail.svg') }}" alt="">
                                </div>
                                <div class="footer-info-box-content">
                                    <p>croisadeeucharistique.diocese.goma@gmail.com</p>
                                </div>
                            </div>
                            <!-- Footer Info Box End -->

                            <!-- Footer Info Box Start -->
                            <div class="footer-info-box">
                                <div class="icon-box">
                                    <img src="{{ asset('asset_frontend/images/icon-location.svg') }}" alt="">
                                </div>
                                <div class="footer-info-box-content">
                                    <p>RDC-NordKivu-Goma</p>
                                </div>                                
                            </div>
                            <!-- Footer Info Box End -->
                        </div>
                        <!-- Footer Contact Details End -->
                    </div>
                    <!-- About Links End -->
                </div>
            </div>

            <!-- Footer Copyright Section Start -->
            <div class="footer-copyright">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4">
                        <!-- Footer Copyright Start -->
                        <div class="footer-copyright-text">
                            <p>Copyright @php
                            echo date('Y');
                            @endphp Croisade Eucharistique. Tout droit réservé.</p>
                        </div>
                        <!-- Footer Copyright End -->
                    </div>

                    <div class="col-lg-8 col-md-8">
                <!-- Footer Social Link Start -->
<div class="footer-privacy-policy">
    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 20px; font-size: 14px; color: #666; padding: 15px 0;">
        <li style="display: flex; align-items: center; gap: 5px;">
            <i class="fas fa-code" style="color: #888;"></i>
            <span style="color: #888;">Développé par</span>
        </li>
        <li style="display: flex; align-items: center; gap: 8px;">
            <a href="#" style="text-decoration: none; color: #2c5530; font-weight: 600; transition: color 0.3s;">
                Gracieux Sikuly
            </a>
            <span style="color: #666; font-size: 12px; display: flex; align-items: center; gap: 5px;">
                <i class="fas fa-cross"></i>
                Apostolat Croisé & Zelateur Diocésain
            </span>
        </li>
        <li style="display: flex; align-items: center; gap: 5px;">
            <a href="tel:+243990378202" style="text-decoration: none; color: #2c5530; display: flex; align-items: center; gap: 5px; transition: color 0.3s;">
                <i class="fas fa-phone-alt"></i>
                +243 990 378 202
            </a>
        </li>
    </ul>
</div>
                        <!-- Footer Social Link End -->
                    </div>
                </div>
            </div>
            <!-- Footer Copyright Section End -->
        </div>
     </footer>