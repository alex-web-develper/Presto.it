<x-layout title="Presto.it">

    <x-header>
        Presto.it
    </x-header>
    {{-- qui vanno le categorie --}}
    <div class="">
        <div class="d-flex flex-wrap justify-content-center  tx-blue-trasparent rounded-5 mx-4">
            @foreach ($categories as $category)
                <div class="p-3">
                    <div class="card shadow-sm category-card category-{{ $category->name }} {{ $theme . '-theme' }}">
                        <a class="text-decoration-none" href="{{ route('categoryShow', compact('category')) }}">
                            <div class="card-body text-center">
                                <h5 class="mt-2 card-title tx-blue fw-bold d-inline-block">{{ __("ui.$category->name") }}
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- qui va l'immagine --}}
    <div class="d-flex justify-content-center py-3">
        @if (Config::get('app.locale') == 'it')
            <img class="shopping-lady" src="{{ asset('img/shopping-lady.jpg') }}" alt="logo sito">
        @elseif (Config::get('app.locale') == 'en')
            <img class="shopping-lady" src="{{ asset('img/shopping-lady-eng.jpg') }}" alt="logo sito">
        @elseif (Config::get('app.locale') == 'es')
            <img class="shopping-lady" src="{{ asset('img/shopping-lady-esp.jpg') }}" alt="logo sito">
        @endif
    </div>
    {{-- segnalibro annunci --}}
    <div class="container">
        <div class="row pt-4">
            <div class="col-2">
            </div>
            <div class="col-10 p-3 shadow mb-4 annunce-title">
                <h1 class=" fw-bold ms-5 ps-5 text-white">{{ __('ui.Annunci') }}</h1>
            </div>
        </div>
    </div>
    <x-session-messages />

    {{-- nuova card --}}
    <div class="container">
        <div class="row">
            @forelse ($annuncements as $annuncement)
                <div class="col-6 col-md-4 my-4">
                    <div class="card border-0 mb-lg-0 mb-4 toBlack {{ $theme . '-theme2' }}">
                        <div class="backgroundEffect">
                        </div>
                        <a href="{{ route('annuncement.show', compact('annuncement')) }}" class="card-presto">
                            <div class="pic">
                                <img src="{{ !$annuncement->images()->get()->isEmpty() ? $annuncement->images()->first()->getUrl(300, 300) : 'https:picsum.photos/400/400' }}"
                                    class="card-img-top rounded" alt="...">
                                <div class="date ps-1 pe-2">
                                    <span>{{ $annuncement->created_at->format('d/M/y') }} </span>
                                </div>
                            </div>
                        </a>
                        <div class="content">
                            <a href="{{ route('annuncement.show', compact('annuncement')) }}"
                                class="text-decoration-none text-reset">
                                <p class="h-1 mt-2 mb-0">{{ $annuncement->title }}</p>
                                <hr class="mt-1 mb-2">
                                <p class="text-muted mt-0  overflow-hidden" style="height: 60px;">{{ $annuncement->description }}</p>
                                <strong>
                                    <p class="card-text">{{ $annuncement->price }} €</p>
                                </strong>
                            </a>
                            <div class="d-flex align-items-center justify-content-between pb-3 flex-wrap">
                                <div class="">
                                    <a href="{{ route('categoryShow', [$annuncement->category]) }}"
                                        class="my-2 border-top pt-2 card-link shadow btn btn-presto rounded-pill flex-nowrap">
                                        {{ __('ui.' . $annuncement->category->name) }}<i
                                            class="bi bi-box-arrow-in-right"></i>
                                    </a>
                                </div>
                                <div class="foot d-block">
                                    <p class="admin mb-0 me-1 d-inline"><i class="bi bi-person-circle"></i>
                                        {{ $annuncement->user->name ?? '' }}</p>

                                    <p class="admin mb-0 d-inline"><i
                                            class="bi bi-geo-alt"></i>{{ $annuncement->provincia }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
        </div>
        <div class="row ">
            <div class="col-12 text-center">
                <a href="{{ route('annuncement.create') }}" class="btn btn-presto shadow">{{ __('ui.Pubblica') }}</a>
            </div>
        </div>
        @endforelse
    </div>
    </div>
</x-layout>
