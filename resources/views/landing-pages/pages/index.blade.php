<x-app-layout layout="landing">
    <div class="section-padding bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('images/landing-pages/images/masjid.jpg') }}" alt="" class="img-fluid ">
                </div>
                <div class="col-md-8">
                    <p class="mb-2 text-secondary text-uppercase">
                        about us
                    </p>
                    <h2 class="text-secondary mb-4">BADAN AMIL ZAKAT<br> <span class="text-primary">Masjid Alhasanah</span></h2>
                    <p class="mb-5">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan
                        untuk mendemostrasikan elemen grafis atau presentasi visual seperti font,
                        tipografi, dan tata letak.Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan
                        untuk mendemostrasikan elemen grafis atau presentasi visual seperti font,
                        tipografi, dan tata letak.Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan
                        untuk mendemostrasikan elemen grafis atau presentasi visual seperti font,
                        tipografi, dan tata letak.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login Admin</a>
                </div>
            </div>
        </div>
    </div>

         <div class="container mt-3">
            <div class="row align-items-center">
            <img src="{{ asset('images/landing-pages/images/masjid.jpg') }}" alt="" class="img-fluid mb-4">

                <div class="col-md-12 text-center">
                    <h2 class="text-secondary mb-4">DKM <span class="text-primary">Al-Hassanah</span></h2>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team1.webp" teamTitle="Darlene Robertson" teamText="Ketua" />
                    </div>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team2.webp" teamTitle="Floyd Miles" teamText="Wakil Ketua" />
                    </div>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team-3.webp" teamTitle="Arlene McCoy" teamText="Bendahara" />
                    </div>
                </div>
                <div class="col-md-3 col-sm-2">
                    <div class="card team-image">
                        <x-landing-pages.widgets.team teamImage="team-4.webp" teamTitle="Darlene Robertson" teamText="Sekertaris" />
                    </div>
                </div>
            </div>
        </div>
 
    <div class="section-padding bg-white">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-12">
                    <!-- <p class="mb-4 text-uppercase text-secondary">Kutipan</p> -->
                    <!-- <h2 class="text-secondary customer-txt">What our <span class="text-primary">Customer’s <br> are -->
                            <!-- saying</span></h2> -->
                </div>
                <div class="overflow-hidden slider-circle-btn" id="testimonial-slider">
                    <ul class="p-0 m-0 swiper-wrapper list-inline">
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal testText="Dan jadikanlah hartamu sebagai zakat untuk membersihkan dan mensucikan dirimu, dan berdoalah untuk dirinya (orang yang engkau berikan zakat)" testOwner="Al-Baqarah (2:110)" testSubtitle="Al-Qur'an" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal testText="Sesungguhnya orang-orang yang mendapat bala (azab) dari Tuhanmu adalah orang-orang yang kafir. Mereka itu adalah orang-orang yang menahan (menyekat) zakat." testOwner="Al-Ma'arij (70:25-27)" testSubtitle="Al-Qur'an" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal testText="Hai orang-orang yang beriman, tunaikanlah (bayarlah) zakat dari sebagian hasil bumi yang kamu peroleh, dari buah-buahan (tanaman) yang kamu keluarkan, supaya kamu tidak disiksakan di hari kiamat." testOwner="Al-Baqarah (2:267)" testSubtitle="Al-Qur'an" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal testText="Tidaklah seseorang yang mempunyai harta, lalu dia menyembunyikannya dari zakatnya kecuali pada hari kiamat hartanya itu akan dijadikan sebagai ular yang panjang dan gemuk yang dibelitkan di lehernya, kemudian ular itu akan berbicara kepada dirinya pada hari kiamat: 'Aku adalah harta yang telah kamu simpan." testOwner="HR. Bukhari (Hadis no. 1401)" testSubtitle="" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal testText="Harta yang paling dicintai oleh Allah adalah harta yang paling banyak bermanfaat bagi pemiliknya, dan harta yang paling dicintai oleh Allah adalah zakat dari harta." testOwner="HR. Tirmidzi (Hadis no. 3357)" testSubtitle="" />
                        </li>
                        <li class="swiper-slide">
                            <x-landing-pages.widgets.testiominal testText="Seseorang berkata kepada Nabi shallallahu 'alaihi wa sallam: 'Wahai Rasulullah, berilah aku nasehat.' Beliau bersabda: 'Janganlah engkau melarang orang memberi sedekah, meskipun dengan setengah kurma. Dan hendaklah engkau takut kepada api neraka, walaupun dengan memberi setengah biji kurma. Dan jika engkau tidak mempunyai sesuatu, maka dengan perkataan yang baik." testOwner="HR. Bukhari (Hadis no. 1417)" testSubtitle="" />
                        </li>
                        
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>