<x-layout title="Categorie">
    <x-header>
        Tutte le categorie $category->
    </x-header>


    <div class="container">
        <div class="row pt-4">
            <div class="col-2">
            </div>
            <div class="col-10 p-3 shadow mb-4 annunce-title">
                <h1 class=" fw-bold ms-5 ps-5 text-white">{{ __("ui.$category->name") }}</h1>
            </div>
        </div>
    </div>
    <x-session-messages />

    <div class="container">
        <div class="row">
            {{-- awsa --}}
            @forelse ($category->annuncements as $annuncement)
                <div class="col-6 col-md-4 my-4">
                    <div class="card border-0 mb-lg-0 mb-4 toBlack {{ $theme . '-theme2' }}">
                        <div class="backgroundEffect">
                        </div>
                        <a href="{{ route('annuncement.show', compact('annuncement')) }}" class="card-presto">
                            <div class="pic">
                                <img src="{{ !$annuncement->images()->get()->isEmpty()? $annuncement->images()->first()->getUrl(300, 300): 'https:picsum.photos/400/400' }}"
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
                                <p class="text-muted mt-0  overflow-hidden" style="height: 60px;">
                                    {{ $annuncement->description }}</p>
                                <strong>
                                    <p class="card-text">{{ $annuncement->price }} €</p>
                                </strong>

                                <div class="d-flex align-items-center justify-content-between pb-3 flex-wrap">
                                    <div class="">

                                    </div>
                                    <div class="foot d-block">
                                        <p class="admin mb-0 me-1 d-inline"><i class="bi bi-person-circle"></i>
                                            {{ $annuncement->user->name ?? '' }}</p>

                                        <p class="admin mb-0 d-inline"><i
                                                class="bi bi-geo-alt"></i>{{ $annuncement->provincia }}</p>
                                    </div>
                                </div>
                            </a>

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
        <div class="d-flex justify-content-center py-3">
            @if (Config::get('app.locale') == 'it')
                <img class="category-empty" src="{{ asset('img/category-empty.jpg') }}"
                    alt="Sii il primo ad aggiungere un annuncio!">
            @elseif (Config::get('app.locale') == 'en')
                <img class="category-empty" src="{{ asset('img/category-empty-eng.jpg') }}"
                    alt="Sii il primo ad aggiungere un annuncio!">
            @elseif (Config::get('app.locale') == 'es')
                <img class="category-empty" src="{{ asset('img/category-empty-esp.jpg') }}"
                    alt="Sii il primo ad aggiungere un annuncio!">
            @endif



        </div>
        @endforelse
    </div>
    </div>
</x-layout>
