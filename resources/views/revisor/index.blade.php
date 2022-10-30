<x-layout title="indice Revisione">
    <x-header>
        Revisione Annunci
    </x-header>
    <div class="container">
        <div class="row pt-4">
            <div class="col-2">
            </div>
            <div class="col-10 p-3 shadow mb-4 annunce-title">
                <h1 class=" fw-bold ps-3 text-white">
                    {{ $annuncement_to_check ? 'Ecco l\' annuncio da revisionare' : 'Non ci sono Annunci da revisionare' }}
                </h1>
            </div>
        </div>
    </div>

    @if ($annuncement_to_check)
    <div class="container shadow rounded {{ $theme . '-theme2' }} toBlack2">
        <div class="row p-5">
            <div class="col-lg-7 col-md-12">
                <div class="">
                    <div id="carouselExampleControls" class="carousel-hero carousel slide" data-bs-ride="carousel">
                        @if ($annuncement_to_check->images->count() > 0)
                            <div class="carousel-inner">
                                @foreach ($annuncement_to_check->images as $image)
                                    <div class="text-center carousel-item @if($loop->first) active @endif">
                                        <img src="{{Storage::url($image->path)}}" class="img-fluid rounded" alt="">  
                                    </div>    
                                @endforeach
                            </div>        
                        @else
                            <div class="carousel-inner">
                                <div class="text-center carousel-item active">
                                    <img src="https://picsum.photos/id/27/1200/400" class="d-block w-100" alt="Immagine Assente">
                                </div>
                                <div class="carousel-item text-center">
                                    <img src="https://picsum.photos/id/28/1000/600" class="d-block w-100" alt="Immagine Assente">
                                </div>
                                <div class="carousel-item text-center">
                                    <img src="https://picsum.photos/id/29/1100/800" class="d-block w-100" alt="Immagine Assente">
                                </div>
                            </div>
                        @endif
                        <button class="carousel-control-prev bg-arrow" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next bg-arrow" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-5 col-md-12">
                <h3 class="mb-0">{{ $annuncement_to_check->title }}</h3>
                <hr class="mt-0">
                <div class="bg-grey rounded px-3 mb-3">
                    <p class=" overflow-hidden mb-0">{{ __('ui.Pubblicatoil:') }}
                        {{ $annuncement_to_check->created_at->format('d/m/Y') }}
                    <p class=" overflow-hidden mb-0">{{ __('ui.Da') }}: {{ $annuncement_to_check->user->name ?? '' }}</p>
                </div>
                <strong>
                    <p class="card-text text-danger">{{ $annuncement_to_check->price }} €</p>
                </strong>
                <div>
                    <p class="card-text fw-bold mb-0">{{ __('ui.Descrizione:') }} </p>
                    <p class="overflow-hidden text-dark rounded description py-1 px-2">{{ $annuncement_to_check->description }}</p>
                </div>
                <a href="{{ route('revisor.takeLastAnnuncement') }}"
                    class="my-2 pt-2 btn btn-presto rounded-pill">{{ __('ui.ModificaUltimo') }}
                    <i class="bi bi-box-arrow-in-right"></i>
                </a>
                    {{-- pulsanti revisore --}}
                <div class="d-flex mt-3 justify-content-around">
                    {{-- pulsante accetta revisore --}}
                    <form action="{{ route('revisor.accept_annuncement', ['annuncement' => $annuncement_to_check]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success shadow">{{ __('ui.Accetta') }}</button>
                    </form>

                    {{-- pulsante rifiuta revisore --}}
                    <form action="{{ route('revisor.reject_annuncement', ['annuncement' => $annuncement_to_check]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger shadow">{{ __('ui.Rifiuta') }}</button>
                    </form>
                </div>
            <div>
        </div>
    </div>
</div>
    <div class="container ">
        <div class="row d-flex">
            @if ($annuncement_to_check->images)
                @foreach ($annuncement_to_check->images as $image)
                    <div class="col-3 col-tags shadow-sm rounded mx-0 mb-5 {{ $theme . '-theme' }} toBlack">
                        <div class="mt-1">
                            <p class="mb-1">Adulti: <span class="{{ $image->adult }}"></span></p>
                            <p class="mb-1">Satira: <span class="{{ $image->spoof }}"></span></p>
                            <p class="mb-1">Medicina: <span class="{{ $image->medical }}"></span></p>
                            <p class="mb-1">Violenza: <span class="{{ $image->violence }}"></span></p>
                            <p class="mb-1">Contenuto Ammicante: <span class="{{ $image->racy }}"></span></p>
                        </div>
                        @if ($image->labels)
                        <div class="">
                            <h5 class="tc-accent mt-3 mb-0">Tags:</h5>
                            <hr class="mt-0 mb-1">
                            <div class="overflow-hidden rounded description py-1 px-2 mb-3">
                                @foreach ($image->labels as $label)
                                    <p class="d-inline text-dark">{{ $label }},</p>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                @endforeach
            @endif  
        </div>
    </div>
</div>
</div>


    @endif
</x-layout>
