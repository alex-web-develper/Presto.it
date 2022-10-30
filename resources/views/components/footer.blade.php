<!-- Footer -->
<footer class="text-center text-lg-start text-dark mt-5 bg-footer {{ $theme . '-theme' }}">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-1 text-white blue-bg">
        <!-- scritta -->
        <div class="ps-3 me-5 d-flex align-items-center">
            <span class="new-ann-i2">{{ __('ui.Social') }} </span>
        </div>
        <!-- scritta -->

        <!-- icone -->
        <div>
            {{-- icona facebook --}}
            <a href="https://www.facebook.com/" class="text-decoration-none me-4" target="_blank">
                <i class="bi bi-facebook text-white icon-size"></i>
            </a>
            {{-- icona twitter --}}
            <a href="https://www.twitter.com/" class="text-decoration-none me-4" target="_blank">
                <i class="bi bi-twitter text-white icon-size"></i>
            </a>
            {{-- icona youtube --}}
            <a href="https://www.youtube.com/" class="text-decoration-none me-4" target="_blank">
                <i class="bi bi-youtube text-white icon-size"></i>
            </a>
            {{-- icona instagram --}}
            <a href="https://www.instagram.com/" class="text-decoration-none me-4" target="_blank">
                <i class="bi bi-instagram text-white icon-size"></i>
            </a>
        </div>
        <!-- icone -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section>
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="fw-bold fs-2">Presto.it</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto foot-line" />
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p class="fw-bold">{{ __('ui.Lavorare') }}</p>

                    <a href="{{ route('become.revisor') }}"
                        class="text-white btn btn-presto shadow ">{{ __('ui.DiventaRevisore!') }}</a>
                </div>
                <!-- Grid column -->


                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="fw-bold fs-5">{{ __('ui.LinksUtili') }}</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto foot-line" />
                    <p>
                        <a href="#!" class="" style="color: inherit" >{{ __('ui.TuoAcccount') }}</a>
                    </p>
                    <p>
                        <a href="#!" class="" style="color: inherit">{{ __('ui.Affigliato') }}</a>
                    </p>
                    <p>
                        <a href="#!" class="" style="color: inherit">{{ __('ui.Tariffe') }}</a>
                    </p>
                    <p>
                        <a href="#!" class="" style="color: inherit">{{ __('ui.Aiuto') }}</a>
                    </p>
                </div>



                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="fw-bold fs-5">{{ __('ui.Contatti') }}</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto foot-line" />
                    <p><i class="bi bi-house-fill"></i> Qualiano, NA 80012, IT</p>
                    <p><i class="bi bi-envelope-fill"></i> info@example.com</p>
                    <p><i class="bi bi-telephone-fill"></i> + 081 234 67 88</p>
                    <p><i class="bi bi-headset"></i></i> + 081 234 67 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2022 Copyright:
        <a class="" href="" style="color: inherit">Presto.it</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
