<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>CAAH ASBL | Conseil d’Alerte et Actions Humanitaires</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Le Conseil d’Alerte et Actions Humanitaires (CAAH ASBL) est une organisation nationale intervenant dans les domaines multisectoriels : sécurité alimentaire, santé et nutrition, VBG, protection, WASH, développement et progrès culturel. Siège social : Rutshuru, bureau provisoire : Kiwanja, quartier Buturande.">
        <meta name="author" content="gracieux sikuly" />
        <meta name="keywords" content="CAAH, Conseil d’Alerte et Actions Humanitaires, ONG, ASBL, Humanitaire, Sécurité alimentaire, Santé, Nutrition, Protection, VBG, WASH, Développement, Culture, Rutshuru, Kiwanja" />
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
