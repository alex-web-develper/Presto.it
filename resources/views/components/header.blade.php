<div class="container mt-5 pt-2">
    <hr>
    <div class="row align-items-center justify-content-between">
        <div class="col-3">
            <div>
                <a href="{{ route('homepage') }}">
                    <img class="hero-img" src="{{ asset('img/presto-logo.png') }}" alt="logo sito">
                </a>
            </div>
        </div>

        {{-- se l'utente è loggato mostra l'icona del profilo --}}
        @auth
            <div class="col-5 d-flex justify-content-end">
                <div class="text-decoration-none me-4">
                    <a class="dropdown-toggle fw-bold text-decoration-none tx-blue new-ann-i2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <p></p> <span class="new-ann">{{ Auth::user()->name }}</span>
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                    </a>

                    {{-- dropdown --}}
                    <ul class="dropdown-menu {{ $theme . '-theme' }}" style="left: inherit ">
                        <li class="">
                            <a class="dropdown-item dropdown-presto" href="{{ route('profile') }}">
                                <i class="bi bi-file-person"></i> {{ __('ui.Profilo') }}</a>
                        </li>
                        {{-- pulsante d'uscita --}}
                        <li><a class="dropdown-item dropdown-presto" href="#"
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();"><i
                                    class="bi bi-box-arrow-left"></i> Logout</a>
                        </li>
                        <form id="form-logout" method="POST" action="{{ route('logout') }}" class="d-none">@csrf</form>
                    </ul>
                </div>
            </div>
        @else
            <div class="col-4 d-flex justify-content-end">
                <div class="">
                    <a href="{{ route('login') }}"
                        class="fw-bold pe-1 text-decoration-none tx-blue border-0 bg-transparent">{{ __('ui.Accedi') }}</a>
                    <a href="{{ route('register') }}" class="text-decoration-none tx-blue">{{ __('ui.Registrati') }}</a>

                </div>
                <div class="col-1 d-flex justify-content-end">
                </div>


            </div>

        @endauth


        {{-- inserisco annuncio --}}
        @auth
            <div class="col-4">
                <a href="{{ route('annuncement.create') }}" type="btn btn-button"
                    class="btn tx-blue-trasparent px-4 btn-header">
                    <div class="d-block">
                        <i class="bi bi-calendar-plus tx-blue new-ann-i"></i>
                        <span class="m-0 tx-blue fw-bold new-ann">{{ __('ui.NuovoAnnuncio') }}</span>
                    </div>
                </a>

            </div>
        @endauth

    </div>
    <hr>
</div>
