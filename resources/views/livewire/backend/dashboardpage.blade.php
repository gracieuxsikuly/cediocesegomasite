<div>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">TABLEAU DE BOARD</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">

                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">Totale Doyenne</p>
                                        <h5 class="mb-0">{{ $totalDoyn ?? 0 }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-book-bookmark"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card blog-stats-wid">
                            <div class="card-body">

                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">Total Paroisse</p>
                                        <h5 class="mb-0">{{ $totalParois ?? 0 }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-note"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card blog-stats-wid">
                            <div class="card-body">
                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">Activite Programme</p>
                                        <h5 class="mb-0">{{ $totalActivite ?? 0 }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-message-square-dots"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-start">
                            <h5 class="card-title me-2">Visitors</h5>
                        </div>

                        <div class="row text-center">
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <p class="text-muted mb-1">Today</p>
                                    <h5>1024</h5>
                                </div>
                            </div>

                            {{-- <div class="col-lg-4">
                                <div class="mt-4">
                                    <p class="text-muted mb-1">This Month</p>
                                    <h5>12356 <span class="text-success font-size-13">0.2 % <i
                                                class="mdi mdi-arrow-up ms-1"></i></span></h5>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-4">
                                <div class="mt-4">
                                    <p class="text-muted mb-1">This Year</p>
                                    <h5>102354 <span class="text-success font-size-13">0.1 % <i
                                                class="mdi mdi-arrow-up ms-1"></i></span></h5>
                                </div>
                            </div> --}}
                        </div>

                        <hr class="mb-4">

                        <div class="apex-charts" id="area-chart" dir="ltr"></div>
                    </div>
                </div>
            </div>
            <!-- end col -->


            <!-- end col -->

        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>