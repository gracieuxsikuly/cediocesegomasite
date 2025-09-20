<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
       <title>Croisade Eucharistique | Mouvement spirituel des enfants et jeunes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="La Croisade Eucharistique est un mouvement spirituel catholique pour enfants, adolescents, jeunes et adulte, visant à les éduquer dans la foi, la prière, le service, le partage et l’amour de l’Eucharistie. Présente dans plusieurs paroisses et écoles, elle forme des apôtres au service de l’Église et de la société.">
        <meta name="author" content="Croisade Eucharistique, gracieux sikuly" />
        <meta name="keywords" content="Croisade Eucharistique, Mouvement catholique, Eucharistie, Enfants, Jeunes, Foi, Prière, Service, Partage, Amour, Église, Mouvement spirituel, Adoration" />
        <meta name="robots" content="index, follow">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets_backend/images/favicon.ico')}}">
        <!-- Bootstrap Css -->
        <link href="{{asset('assets_backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets_backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets_backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
 @livewireStyles
    </head>

    <body data-sidebar="dark">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
        <!-- Begin page -->
        <div id="layout-wrapper">   
           @include('layouts.partials.header')

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                @include('layouts.partials.sidebar')
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                      {{ $slot ?? '' }}
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © CE DIOCESE DE GOMA.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Develop by Gsikuly
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

       

        {{-- <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div> --}}

        <!-- JAVASCRIPT -->
        <script src="{{('assets_backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{('assets_backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{('assets_backend/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{('assets_backend/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{('assets_backend/libs/node-waves/waves.min.js')}}"></script>

        <!-- apexcharts -->
        <script src="{{('assets_backend/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- dashboard blog init -->
        <script src="{{('assets_backend/js/pages/dashboard-blog.init.js')}}"></script>

        <script src="{{('assets_backend/js/app.js')}}"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireScripts
    </body>
    </html>
