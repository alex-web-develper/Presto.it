<div class="container my-2 ">
    <div class="row align-items-center justify-content-end offcann-btn">

        <x-session-messages />

        <div class="col-12 mb-3">

            <div class="dropdown justify-content-end d-flex">
                <button class="btn btn-presto" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"> <span
                        class="fs-5">{{ __('ui.Filtri') }}</span>
                    <i class="bi bi-filter-square-fill fs-5"></i>
                </button>
            </div>
            <div class="offcanvas offcanvas-start toBlack {{ $theme . '-theme2' }}" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bold" id="offcanvasWithBothOptionsLabel">{{ __('ui.A-S') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="">
                    {{-- sezione ordinamento per data --}}
                    <div class="p-3 filter-col rounded-start border-bottom border-top shadow-sm">
                        <h6 class="title fw-bold"><i class="bi bi-sort-numeric-down"></i> {{ __('ui.OrdinaData') }}</h6>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault5" wire:click='order_by_newest'>
                                <label class="form-check-label" for="flexRadioDefault5">
                                    {{ __('ui.Recente') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault6" wire:click='order_by_oldest'>
                                <label class="form-check-label" for="flexRadioDefault6">
                                    {{ __('ui.Vecchio') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- sezione ordinamento per prezzo offcanvas --}}
                    <div class="p-3 filter-col rounded-start  border-bottom shadow-sm">
                        <h6 class="fw-bold"><i class="bi bi-sort-numeric-up"></i> {{ __('ui.OrdinaPrezzo') }}</h6>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault7" wire:click='order_by_expensive'>
                                <label class="form-check-label" for="flexRadioDefault7">
                                    {{ __('ui.Economico') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault8" wire:click='order_by_cheap'>
                                <label class="form-check-label" for="flexRadioDefault8">
                                    {{ __('ui.Costoso') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- sezione prezzo min e max offcanvas --}}
                    <div class="p-3 filter-col rounded-start  border-bottom shadow-sm">
                        <article class="card-group-item">

                            <h6 class="fw-bold"><i class="bi bi-coin"></i> {{ __('ui.Prezzo') }}</h6>

                            <div class="filter-content">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-2">
                                            <input type="number" wire:model.debounce.1500ms="price_min"
                                                class="form-control @error('price_min') is-invalid @enderror"
                                                id="price_min" placeholder="€ Min">
                                        </div>
                                        <div class="form-group col-md-6 text-right">
                                            <input type="number" wire:model.debounce.1500ms="price_max"
                                                class="form-control" placeholder="€ Max"id="price_max">
                                        </div>
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                            @error('price_min')
                                {{ __('ui.PrezzoMin') }}
                            @enderror
                        </article>
                    </div>
                    {{-- sezione filtro provincia offcanvas --}}
                    <div class="p-3 filter-col rounded-start  border-bottom shadow-sm">
                        <label for="provincia" class="fw-bold mb-2"><i class="bi bi-building"></i>
                            {{ __('ui.Provincia*') }}</label>
                        <select wire:model.lazy="provincia" id="provincia"
                            class="form-control @error('provincia') is-invalid @enderror">

                            <option value="">{{ __('ui.ProvinciaScegli') }}</option>

                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->name }}">{{ $provincia->name }}</option>
                            @endforeach
                        </select>

                        @error('provincia')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

        </div>


    </div>

    {{-- ricerca avanzata --}}
    <div class="row mx-4 shadow border-none rounded d-flex mb-3 mt-5 filter-row toBlack {{ $theme . '-theme2' }}">
        {{-- sezione ordinamento per data --}}
        <div class="col-3 p-3 filter-col rounded-start">
            <h6 class="title fw-bold"><i class="bi bi-sort-numeric-down"></i> {{ __('ui.OrdinaData') }}</h6>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                        checked wire:click='order_by_newest'>
                    <label class="form-check-label" for="flexRadioDefault2">
                        {{ __('ui.Recente') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                        wire:click='order_by_oldest'>
                    <label class="form-check-label" for="flexRadioDefault1">
                        {{ __('ui.Vecchio') }}
                    </label>
                </div>
            </div>
        </div>
        {{-- sezione ordinamento per prezzo --}}
        <div class="col-3 p-3 filter-col rounded-start">
            <h6 class="fw-bold"><i class="bi bi-sort-numeric-up"></i> {{ __('ui.OrdinaPrezzo') }}</h6>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                        wire:click='order_by_expensive'>
                    <label class="form-check-label" for="flexRadioDefault3">
                        {{ __('ui.Economico') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4"
                        wire:click='order_by_cheap'>
                    <label class="form-check-label" for="flexRadioDefault4">
                        {{ __('ui.Costoso') }}
                    </label>
                </div>
            </div>
        </div>
        {{-- sezione prezzo min e max --}}
        <div class="col-3 p-3 filter-col rounded-start">
            <article class="card-group-item">

                <h6 class="fw-bold"><i class="bi bi-coin"></i> {{ __('ui.Prezzo') }}</h6>

                <div class="filter-content">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-2">
                                <input type="number" wire:model.debounce.1500ms="price_min"
                                    class="form-control @error('price_min') is-invalid @enderror" id="price_min"
                                    placeholder="€ Min">
                            </div>
                            <div class="form-group col-md-6 text-right">
                                <input type="number" wire:model.debounce.1500ms="price_max" class="form-control"
                                    placeholder="€ Max"id="price_max">
                            </div>
                        </div>
                    </div> <!-- card-body.// -->
                </div>
                @error('price_min')
                    {{ __('ui.PrezzoMin') }}
                @enderror
            </article>
        </div>
        {{-- sezione filtro provincia --}}
        <div class="col-3 p-3 filter-col rounded-start">
            <label for="provincia" class="fw-bold mb-2"><i class="bi bi-building"></i>
                {{ __('ui.Provincia*') }}</label>
            <select wire:model.lazy="provincia" id="provincia"
                class="form-control @error('provincia') is-invalid @enderror">

                <option value="">{{ __('ui.ProvinciaScegli') }}</option>

                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->name }}">{{ $provincia->name }}</option>
                @endforeach
            </select>

            @error('provincia')
                {{ $message }}
            @enderror
        </div>
    </div>
    {{-- caricamento --}}
    <div class="row justify-content-center">
        <div wire:loading>
            <div class="spinner-border tx-blue" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    {{-- Cards  inizio --}}
    <div class="row">
        @forelse ($annuncements as $annuncement)
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
            <div class="col-12 text-center">
                <a href="{{ route('annuncement.create') }}"
                    class="btn btn-presto shadow">{{ __('ui.Pubblica') }}</a>
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
        {{ $annuncements->links() }}
    </div>
</div>
