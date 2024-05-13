<x-app-layout layout="landing">
    <div class="bd-example">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#" style="font-weight: bold;"><img src="{{ asset('images/logo.png') }}" style="width: 160px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-1" aria-controls="navbar-1" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-1">
                    <ul class="navbar-nav ms-auto p-2 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#" style="font-weight: bold;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Kontak</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="btn bg-secondary btn-sm" href="{{ route('login') }}">
                                <svg width="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.08 22H7.91C4.38 22 2 19.729 2 16.34V7.67C2 4.28 4.38 2 7.91 2H16.08C19.62 2 22 4.28 22 7.67V16.34C22 19.729 19.62 22 16.08 22ZM14.27 11.25H7.92C7.5 11.25 7.17 11.59 7.17 12C7.17 12.42 7.5 12.75 7.92 12.75H14.27L11.79 15.22C11.65 15.36 11.57 15.56 11.57 15.75C11.57 15.939 11.65 16.13 11.79 16.28C12.08 16.57 12.56 16.57 12.85 16.28L16.62 12.53C16.9 12.25 16.9 11.75 16.62 11.47L12.85 7.72C12.56 7.43 12.08 7.43 11.79 7.72C11.5 8.02 11.5 8.49 11.79 8.79L14.27 11.25Z" fill="currentColor"></path>
                                </svg>
                                Login
                            </a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li class="px-3">
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="bd-example mt-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="{{ asset('images/gambar1.jpg') }}" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="550" alt="Placeholder: First slide">
                    <!-- <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div> -->
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('images/gambar2.jpg') }}" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="550" alt="Placeholder: First slide">
                    <!-- <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div> -->
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/gambar3.jpg') }}" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="550" alt="Placeholder: First slide">
                    <!-- <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div id="product" class="features-card page-bg" style="margin-top: 0;">
        <div class="container">
            <div class="row mx-2 mx-sm-0">
                <div class="col-lg-12"></div>
                <div class="col-lg-12 top-feature">
                    <div class="text-center">
                        <h3 class="mb-3 notch-feature-txt" style="color: #090E74;">Produk</h3>
                        <p class="mb-5 pb-5 text-black">It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 m-auto">
                    <nav class="m-auto">
                        <div class="page-bg nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active mr-2" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bank Maypada </button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">DBS</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Digibank</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cimbniaga</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active mt-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img class="bd-placeholder-img pb-3" width="100%" height="200" src="{{ asset('images/gambar1.jpg') }}" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect>
                                            <h6 class="card-title">digibank Visa Travel Signature</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#detailmodel" style="color: #127E18;">Lihat Detail</a>
                                            <a href="{{route('formulir.create_formulir')}}" class="card-link">Ajukan Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img class="bd-placeholder-img pb-3" width="100%" height="200" src="{{ asset('images/gambar1.jpg') }}" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect>
                                            <h6 class="card-title">digibank Visa Travel Signature</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#detailmodel" style="color: #127E18;">Lihat Detail</a>
                                            <a href="{{route('formulir.create_formulir')}}" class="card-link">Ajukan Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img class="bd-placeholder-img pb-3" width="100%" height="200" src="{{ asset('images/gambar1.jpg') }}" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect>
                                            <h6 class="card-title">digibank Visa Travel Signature</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#detailmodel" style="color: #127E18;">Lihat Detail</a>
                                            <a href="{{route('formulir.create_formulir')}}" class="card-link">Ajukan Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="detailmodel" tabindex="-1" aria-labelledby="detailmodelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 800px;">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailmodelLabel">Detail digibank Visa Travel Signature</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-3">
                                    <!-- Konten detail model bisa ditambahkan di sini -->
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img class="bd-placeholder-img" width="100%" height="250" src="{{ asset('images/gambar1.jpg') }}" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">digibank Visa Travel Signature</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary">Ajukan Sekarang</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="about" class="section-padding bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('images/landing-pages/images/home-1/aboutus.webp') }}" alt=""
                        class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3 class="mb-5"><span style="color: #090E74;">Tentang Kami</span></h3>
                    <p class="text-black">Berdiri pada tahun 2002 (Berdasarkan akte no.2 Notaris Sarinah Sihombing), SH.SK.MEN.KEH.R.I 
                        Tgl 14-08-2002 No.C/1005,HT,03,02-2002, dan surat kemenhukam No.AHU-0933521 AH.01.02 Tahun 2015 yang bertempat 
                        di gedung Sentra Salemba Mas JL.Salemba Raya No.34-36 Blok.Y Jakarta Pusat, phn 021-3928711 fax.3928712. 
                        Dan Bergerak dalam bidang jasa, Khususnya tenaga outsourcing serta pedagang nasional dan Internasional. 
                        Selain itu PT.Pesona Putra Perkasa mempunyai pengalaman, pengetahuan serta keahlian dalam mencari, melatih, 
                        mengarahkan, dan menempatkan serta mengelola tenaga kerja Marketing yang berkualitas untuk para pelanggan/nasabah, 
                        Hal ini terbukti dengan adanya performance atau penghargaan yang di dapat PT.Pesona Putra Perkasa sebagai <span style="font-weight: bold; color: black;">The Best Sales 
                        Agency Personal Loan ANZ Bank</span>, Serta The Best Sales Agency Personal Loan DBS Bank, Mayapada Bank, CTBC Bank, dan Best Sales Agency 
                        Credit Card CIMB Niaga. </p>
                    <!-- <a hrer="javascript" class="btn btn-primary">Get Started</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding page-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <h3 class="mb-4 fast-afrd-txt" style="color: #127E18;">FAQ<br> 
                    <span style="color: #090E74;">Pertanyaan seputar kami</span></h3>
                </div>
                <div class="col-lg-7">
                <div class="bd-example">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="inner-box" id="kontak" style="background: #090E74;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="mb-4 text-white">Company</h5>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <li class="mb-3 list-unstyled">gedung Sentra Salemba Mas JL.Salemba Raya No.34-36 Blok.Y Jakarta Pusat</li>
                    <li class="mb-3 pb-5 list-unstyled">(021) 3928711</li>
                </div>
                <div class="col-lg-4">
                    <h5 class="mb-4 text-white ps-5">Link</h5>
                    <ul class="m-0 ps-5 list-unstyled">
                        <li class="mb-3">Produk</li>
                        <li class="mb-3">Tentang Kami</li>
                        <li class="mb-3">Kontak Kami</li>
                        <li>FAQ</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="mb-4 text-white">Get In touch</h5>
                        <p>Email:</p>
                        <a href="#" class="text-decoration-underline text-white">support@wablast.com</a>
                        <ul class="list-unstyled p-0 m-0 d-flex mt-4">
                            <li>
                                <a href="#"><img src="{{asset('images/brands/08.png')}}" alt="fb" loading="lazy" class="rounded-pill"></a>
                            </li>
                            <li class="ps-3">
                                <a href="#"><img src="{{asset('images/brands/09.png')}}" alt="gm" loading="lazy" class="rounded-pill"></a>
                            </li>
                            <li class="ps-3">
                                <a href="#"><img src="{{asset('images/brands/10.png')}}" alt="im" loading="lazy" class="rounded-pill"></a>
                            </li>
                            <li class="ps-3">
                                <a href="#"><img src="{{asset('images/brands/13.png')}}" alt="li" loading="lazy" class="rounded-pill"></a>
                            </li>
                        </ul>
                </div>
                <hr>
                <div class="col-md-12 text-center" style="height: 10px;">
                    <p class="mt-4">©<script>document.write(new Date().getFullYear())</script> Wa Blast, All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- <div class="section-card-padding  bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <p class="mb-2 text-secondary text-uppercase">
                        Pricing
                    </p>
                    <h2 class="text-secondary mb-4">Our <span class="text-primary">Price<br> Plans</span></h2>
                    <p class="mb-4">It is a long established fact that a reader will be distracted by the readable
                        content
                        of a page when looking at its layout. </p>
                    <a href="#" class="btn btn-primary mt-2">View demo</a>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="row iq-star-inserted row-cols-1 row-cols-md-2 row-cols-lg-2 text-center">
                        <div class="col iq-star-inserted-2">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <h5 class="my-0 fw-normal mb-4">Pro</h5>
                                    <h4 class="card-title pricing-card-title mb-0 text-primary mb-4">$15<small
                                            class="text-secondary"> / month</small></h4>
                                    <p class="">Billed Yearly</p>
                                    <p>$169.99 Billed Monthly</p>
                                    <ul class="list-unstyled my-3 p-0">
                                        <li class="mb-4">20 users included</li>
                                        <li class="mb-4">10GB of storage</li>
                                        <li class="mb-4">Priority Email support</li>
                                        <li class="mb-4">Help center access</li>
                                        <li class="mb-4">Help center access</li>
                                        <li>
                                            <p>Help center access</p>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-primary w-100">Get Started</button>
                                </div>
                            </div>
                        </div>
                        <div class="col iq-star-inserted-3">
                            <div class="card my-5">
                                <div class="card-body page-bg">
                                    <h5 class="my-0 fw-normal mb-4">Premium</h5>
                                    <h4 class="card-title pricing-card-title mb-0 text-primary mb-4">$49 <small
                                            class="text-secondary"> / month</small></h4>
                                    <p class="">Billed Yearly</p>
                                    <p>$169.9 Billed Monthly</p>
                                    <ul class="list-unstyled my-3 p-0">
                                        <li class="mb-3">30 users included</li>
                                        <li class="mb-3">15 GB of storage</li>
                                        <li class="mb-3">Call and email support</li>
                                        <li class="mb-3">Help center access</li>
                                        <li class="mb-3">Help center access</li>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="btn btn-primary w-100">Get Started</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding ">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                <div class="col">
                    <img src="{{ asset('images/landing-pages/images/home-1/01.webp') }}" alt=""
                        class="img-fluid ">
                </div>
                <div class="col">
                    <img src="{{ asset('images/landing-pages/images/home-1/02.webp') }}" alt=""
                        class="img-fluid ">
                </div>
                <div class="col">
                    <img src="{{ asset('images/landing-pages/images/home-1/03.webp') }}" alt=""
                        class="img-fluid ">
                </div>
            </div>
        </div>
    </div>
    <div class="section-card-padding bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <p class="mb-2 text-uppercase text-secondary">
                        team
                    </p>
                    <h2 class="text-secondary mb-4">Expert <span class="text-primary">Teams</span></h2>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team1.webp" teamTitle="Darlene Robertson"
                            teamText="Founder" />
                    </div>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team2.webp" teamTitle="Floyd Miles"
                            teamText="UI designer" />
                    </div>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team-3.webp" teamTitle="Arlene McCoy"
                            teamText="Researcher" />
                    </div>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team-4.webp" teamTitle="Darlene Robertson"
                            teamText="Founder" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-card-padding page-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <p class="mb-2 text-uppercase text-secondary">
                        Blog
                    </p>
                    <h2 class="text-secondary mb-4">All the <span class="text-primary">Support you Need</span></h2>
                </div>
                <div class="overflow-hidden slider-circle-btn mt-5" id="app-slider">
                    <ul class="p-0 m-0 swiper-wrapper list-inline">
                        <li class="swiper-slide card-slide card overflow-hidden">
                            <x-landing-pages.widgets.blog blogImage="home-1/04.webp"
                                blogTitle="The Shaping the futures, part by part." blogText="Video" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden">
                            <x-landing-pages.widgets.blog blogImage="home-1/05.webp"
                                blogTitle="Technology that unwinds your potential." blogText="Video" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden">
                            <x-landing-pages.widgets.blog blogImage="home-1/06.webp"
                                blogTitle="Generating the best online environment." blogText="Video" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden">
                            <x-landing-pages.widgets.blog blogImage="home-1/04.webp"
                                blogTitle="The Shaping the futures, part by part." blogText="Video" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden">
                            <x-landing-pages.widgets.blog blogImage="home-1/05.webp"
                                blogTitle="Technology that unwinds your potential." blogText="Video" />
                        </li>
                        <li class="swiper-slide card-slide card overflow-hidden">
                            <x-landing-pages.widgets.blog blogImage="home-1/06.webp"
                                blogTitle="Generating the best online environment." blogText="Video" />
                        </li>
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding bg-white">
        <div class="container">
            <div class="row align-items-center text-center row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
                <div class="col mb-lg-0 mb-4">
                    <x-landing-pages.widgets.counter couterVlue="3" counterTitle="Best Designer Award" />
                </div>
                <div class="col mb-lg-0 mb-4">
                    <x-landing-pages.widgets.counter couterVlue="50+" counterTitle="Loyal Clients" />
                </div>
                <div class="col">
                    <x-landing-pages.widgets.counter couterVlue="158+" counterTitle="Nominee Awards" />
                </div>
                <div class="col">
                    <x-landing-pages.widgets.counter couterVlue="92+" counterTitle="CSS Designs" />
                </div>
            </div>
        </div>
    </div>
    <div class="inner-box bg-secondary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 justify-content-center ">
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client clientImage="07.webp" />
                </div>
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client clientImage="08.webp" />
                </div>
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client clientImage="09.webp" />
                </div>
                <div class="col mb-md-0 mb-5 d-flex justify-content-center">
                    <x-landing-pages.widgets.client clientImage="10.webp" />
                </div>
                <div class="col d-flex justify-content-center">
                    <x-landing-pages.widgets.client clientImage="11.webp" />
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-12">
                    <p class="mb-4 text-uppercase text-secondary">Testimony</p>
                    <h2 class="text-secondary customer-txt">What our <span class="text-primary">Customer’s <br> are
                            saying</span></h2>
                </div>
                <div class="overflow-hidden slider-circle-btn" id="testimonial-slider">
                    <ul class="p-0 m-0 swiper-wrapper list-inline">
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal
                                testText="Torquatos nec eu, detr
                        periculis ex, nihil expetendis in mei. Mei an pericula euripidis.hinc partem ei est. Eos ei nisl
                        graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error
                        epicurei mea. Mea facilisis urbanitas.Torquatos nec eu, detr periculis ex, nihil expetendis in
                        mei."
                                testOwner="Elsa Schmidt" testSubtitle="Spa" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal
                                testText="Torquatos nec eu, detr
                        periculis ex, nihil expetendis in mei. Mei an pericula euripidis.hinc partem ei est. Eos ei nisl
                        graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error
                        epicurei mea. Mea facilisis urbanitas.Torquatos nec eu, detr periculis ex, nihil expetendis in
                        mei."
                                testOwner="Elsa Schmidt" testSubtitle="Spa" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal
                                testText="Torquatos nec eu, detr
                        periculis ex, nihil expetendis in mei. Mei an pericula euripidis.hinc partem ei est. Eos ei nisl
                        graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error
                        epicurei mea. Mea facilisis urbanitas.Torquatos nec eu, detr periculis ex, nihil expetendis in
                        mei."
                                testOwner="Elsa Schmidt" testSubtitle="Spa" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal
                                testText="Torquatos nec eu, detr
                        periculis ex, nihil expetendis in mei. Mei an pericula euripidis.hinc partem ei est. Eos ei nisl
                        graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error
                        epicurei mea. Mea facilisis urbanitas.Torquatos nec eu, detr periculis ex, nihil expetendis in
                        mei."
                                testOwner="Elsa Schmidt" testSubtitle="Spa" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal
                                testText="Torquatos nec eu, detr
                        periculis ex, nihil expetendis in mei. Mei an pericula euripidis.hinc partem ei est. Eos ei nisl
                        graecis, vix aperiri consequat an. Eius lorem tincidunt vix at, vel pertinax sensibus id, error
                        epicurei mea. Mea facilisis urbanitas.Torquatos nec eu, detr periculis ex, nihil expetendis in
                        mei."
                                testOwner="Elsa Schmidt" testSubtitle="Spa" />
                        </li>
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
