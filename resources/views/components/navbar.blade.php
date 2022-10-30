<nav class="navbar navbar-dark blue-bg d-flex p-1 fixed-top toBlack {{ $theme . '-theme2' }}">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <div class="">
            <div class="dropdown">
                <button class="dropdown-toggle btn-lingua" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                        class="bi bi-translate"></i>
                    {{ __('ui.Lingua') }}</button>
                <ul class="dropdown-menu text-end {{ $theme . '-theme' }}" id="lang-drop">
                    <li class="dropdown-presto text-center">
                        <x-_locale lang="it" nation="it" />
                    </li>
                    <li class="dropdown-presto text-center">
                        <x-_locale lang="en" nation="gb" />
                    </li>
                    <li class="dropdown-presto text-center">
                        <x-_locale lang="es" nation="es" />
                    </li>
                </ul>
            </div>


        </div>



        {{-- Barra di ricerca 2 --}}
        <div class="d-flex align-items-center">
            <form class="w-100 me-3 position-relative" action="{{ route('annuncements.search') }}" method="GET">
                <input name="searched" class="form-control rounded-pill toBlack3 {{ $theme . '-theme4' }}" type="search" placeholder="Search..."
                    aria-label="Search">
            </form>


            <button id="open-side-nav" class="openbtn d-flex align-items-center">
                <img src="{{ asset('img/logo-32x32.png') }}" alt="mdo" class="rounded-circle">
                <i class="bi bi-list"></i>
            </button>

        </div>
    </div>
    {{-- side bar --}}
    <div id="mySidepanel" class="sidepanel {{ $theme . '-theme3' }}">
        <a href="javascript:void(0)" class="closebtn text-decoration-none text-reset" id="close-side-nav">&times;</a>
        <a class="fw-bold p-2 {{ Route::is('') ? 'active' : '' }} nav-member" href="{{ route('annuncement.index') }}">
            {{ __('ui.ListaAnnunci') }}<i class="bi bi-list-columns ps-2"></i></a>

        <a class="dropdown-toggle nav-member fw-bold" href="#" role="button" id="categoryDropdown"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('ui.Categorie') }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdo {{ $theme . '-theme' }}" style="top:135px;">
            @foreach ($categories as $category)
                <li><a class="dropdown-item"
                        href="{{ route('categoryShow', compact('category')) }}">{{ __("ui.$category->name") }}</a>
                </li>
            @endforeach
        </ul>






        @auth

            <a class="dropdown-toggle nav-member fw-bold p-2 text-decoration-none" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="overflow-hidden">{{ Auth::user()->name }}</span>
                <i class="bi bi-person-fill ps-1"></i>
            </a>
            {{-- dropdown --}}
            <ul class="dropdown-menu dropdown-menu-end {{ $theme . '-theme' }}" style="top:175px;">
                <li class="dropdown-presto">
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="bi bi-file-person"></i> {{ __('ui.Profilo') }}</a>
                </li>
                {{-- pulsante d'uscita --}}
                <li class="dropdown-presto">
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.querySelector('#form-logout').submit();"><i
                            class="bi bi-box-arrow-left"></i> Logout</a>
                </li>
                <form id="form-logout" method="POST" action="{{ route('logout') }}" class="d-none">@csrf</form>

            </ul>

            @if (Auth::user()->is_revisor)
                <a class="fw-bold p-2 nav-link position-relative nav-member"
                    href="{{ route('revisor.index') }}">{{ __('ui.ZonaRevisore') }}
                    <span class="badge roundend-pill bg-danger">{{ App\Models\Annuncement::toBeRevisionedCount() }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            @endif

            <a href="{{ route('annuncement.create') }}"
                class="nav-member fw-bold p-2 text-decoration-none">{{ __('ui.NuovoAnnuncio') }}
                <i class="bi bi-calendar-plus ps-1"></i></a>
        @else
            <a href="{{ route('login') }}" class="nav-member fw-bold p-2 text-decoration-none">{{ __('ui.Accedi') }}</a>
            <a href="{{ route('register') }}"
                class="text-decoration-none nav-member p-2 fw-bold">{{ __('ui.Registrati') }}</a>
        @endauth
        {{-- switch luminosità --}}
        <div class="nav-member fw-bold d-flex justify-content-end align-items-center">
            <i class="bi bi-sun-fill tx-blue me-1"></i>
            <div class="form-check form-switch mb-0">

                {{-- <i class="bi bi-brightness-high-fill"></i><label class="form-check-label" for="flexSwitchCheckDefault"></label>
                <input class="form-check-input" type="checkbox" id="theme-toggle" @if (Cookie::get('theme') == 'dark')checked @endif>  --}}


                <label class="form-check-label" for="flexSwitchCheckDefault">
                    <input class="form-check-input" type="checkbox" id="theme-toggle"
                        @if (Cookie::get('theme') == 'dark') checked @endif>
                </label>

            </div>
            <i class="bi bi-moon-fill tx-blue"></i>
        </div>

    </div>
</nav>
