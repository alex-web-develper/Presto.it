<x-layout title="Presto.it">
    {{-- header --}}
    <x-header>

    </x-header>
    <div class="container">
        <div class="row justify-content-center d-flex">

            <div class="col-12 justify-content-center d-flex mb-5">
                <div class="rounded shadow info-container toBlack {{ $theme . '-theme2' }}">
                    <ul class="list-group list-group-flush rounded toBlack {{ $theme . '-theme2' }}">
                        <li class="list-group-item d-flex justify-content-between profile-element-presto border">
                            <div class="fw-bold">{{ __('ui.Nome') }}:</div>
                            <div>{{ Auth::user()->name }}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between profile-element-presto border">
                            <div class="fw-bold">Email:</div>
                            <div>{{ Auth::user()->email }}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between profile-element-presto border">
                            <div class="fw-bold">{{ __('ui.Username') }}:</div>
                            <div>{{ Auth::user()->username }}</div>
                        </li>
                        <li class="list-group-item profile-element-presto border">
                            @if (!empty(Auth::user()->email_verified_at))
                                <div class="fw-bold">{{ __('ui.VerificaConferma') }}:</div>
                                <div class="text-center">{{ __('ui.EmailVerificato') }}</div>
                            @else
                                <div class="fw-bold">{{ __('ui.VerificaConferma') }}:</div>
                                <div class="text-center">{{ __('ui.DaVerificare') }}</div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @forelse ($annuncements as $annuncement)

        @if (Auth::user()->id == $annuncement->user_id)
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
        @endif
    @empty
        <div class="col-12 text-center">
            <a href="{{ route('annuncement.create') }}" class="btn btn-presto shadow">{{ __('ui.Pubblica') }}</a>
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


</x-layout>
