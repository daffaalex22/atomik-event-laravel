@extends('layout')

@section('content')

<section>
    <div class="container-fluid" style="background-image: url({{asset('img/Background.jpg')}}); background-color: #cccccc;">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="800">
            <img src="{{ asset('img/atomik-white-transparent.png')}}" class="h-50 w-50">
        </div>
    </div>
</section>

<!-- About Section-->
<section class="page-section mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center" style="font-family:Century Gothic;color=#0B062E;"><strong>About <i>Atomik</i></strong></h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- About Section Content-->
        <div class="mx-auto"><p class="lead" style="font-family:Century Gothic;color=#0B062E;text-align:center;">
            🚀 Dive into the coding cosmos at Atomik, where innovation and coding brilliance collide! Whether you're a seasoned coding maestro or just starting your journey, Atomik promises an electrifying experience. Engage in quantum coding workshops, tackle mind-bending challenges, and connect with like-minded innovators. Join us at Atomik to ignite the spark of atomic-level coding, and secure your pass now for a journey that will redefine your coding universe! </p></div>

        <!-- About Section Button-->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                <i class="fas fa-download me-2"></i>
                Free Download!
            </a>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="footer text-center">
    <div class="container">
        <div class="row justify-content-md-center">
            <!-- Footer Location-->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">Location</h4>
                <p class="lead mb-0">
                    Jl Jend Sudirman 266, Jawa Barat
                    <br />
                    Kota Bandung, Jawa Barat 40181
                    <br />
                </p>
            </div>
            <!-- Footer About Text-->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">Contact</h4>
                <i class="fab fa-fw fa-whatsapp"></i>
                <p class="lead mb-0" style="display: inline-block;">0888-8888-8888</p>
                <br />
                <i class="fa fa-fw fa-envelope"></i>
                <p class="lead mb-0" style="display: inline-block;">atomik.code@gmail.com</p>
                <br />
                <i class="fab fa-fw fa-youtube"></i>
                <p class="lead mb-0" style="display: inline-block;">@Atomik-eb9jx</p>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright Section
<div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright &copy; Mochamad Haikal Ghiffari</small></div>
</div>
-->

@endsection