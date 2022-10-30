<x-layout title="{{ $annuncement->title }}">

    <x-header>
        Tutte le categorie
    </x-header>

    <x-session-messages />

    <div class="container">
        <div class="row p-4 shadow mb-4 annunce-title text-white">
            <div class="col-12">
                <h1 class="dispaly-2">{{ __('ui.Annuncio') }}: {{ $annuncement->title }}</h1>
                <span class=""><i class="bi bi-geo-alt"></i>{{ __('ui.Provincia:') }}
                    {{ $annuncement->provincia }}</span>
            </div>

        </div>
    </div>


    <div class="container shadow rounded {{ $theme . '-theme2' }} toBlack2">
        <div class="row p-5">
            <div class="col-lg-7 col-md-12">
                <div class="">
                    <div id="carouselExampleControls" class="carousel-hero carousel slide" data-bs-ride="carousel">
                        @if ($annuncement->images->count() > 0)
                            <div class="carousel-inner">
                                @foreach ($annuncement->images as $image)
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
                <h3 class="mb-0">{{ $annuncement->title }}</h3>
                <hr class="mt-0">
                <div class="bg-grey rounded px-3 mb-3">
                    <p class=" overflow-hidden mb-0">{{ __('ui.Pubblicatoil:') }}
                        {{ $annuncement->created_at->format('d/m/Y') }}
                    <p class=" overflow-hidden mb-0">{{ __('ui.Da') }}: {{ $annuncement->user->name ?? '' }}</p>
                </div>
                <strong>
                    <p class="card-text text-danger">{{ $annuncement->price }} €</p>
                </strong>
                <div>
                    <p class="card-text fw-bold mb-0">{{ __('ui.Descrizione:') }} </p>
                    <p class="overflow-hidden text-dark rounded description py-1 px-2">{{ $annuncement->description }}</p>
                </div>
                
                <a href="{{ route('categoryShow', [$annuncement->category]) }}"
                    class="my-2 pt-2 btn btn-presto rounded-pill">{{ __('ui.VaiAllaCategoria:') }}
                    {{ __('ui.' . $annuncement->category->name) }} <i
                    class="bi bi-box-arrow-in-right"></i>
                </a>
            </div>
        </div>
        
    </div>
    </div>

</x-layout>
