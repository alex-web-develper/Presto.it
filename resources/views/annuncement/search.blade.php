<x-layout title="Ricerca degli Annunci">

    <x-header>
        Tutte le categorie
    </x-header>

    <x-session-messages />

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
            <div class="d-flex justify-content-center py-3">
                @if (Config::get('app.locale') == 'it')
                    <img class="search-empty" src="{{ asset('img/search-empty.jpg') }}"
                        alt="La tua ricerca non ha prodotto risultati">
                @elseif (Config::get('app.locale') == 'en')
                    <img class="search-empty" src="{{ asset('img/search-empty-eng.jpg') }}" alt="La tua ricerca non ha prodotto risultati">
                @elseif (Config::get('app.locale') == 'es')
                    <img class="search-empty" src="{{ asset('img/search-empty-esp.jpg') }}" alt="La tua ricerca non ha prodotto risultati">
                @endif


            </div>
        @endforelse
        {{-- {{an nuncements->links()}} --}}
    </div>

    </div>

</x-layout>
