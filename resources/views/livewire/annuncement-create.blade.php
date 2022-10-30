<div>
    <form class="shadow p-5 {{ $theme . '-theme2' }} toBlack2" wire:submit.prevent='store'>
        @csrf
        {{-- <x-validate-errors /> --}}
        @if (session('message'))
        <div class="alert alert-info position-absolute top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="{{ asset('img/toast.png') }}" class="rounded me-2" alt="...">
              <strong class="me-auto">Presto.it</strong>
              <small>{{ __('ui.Ora') }}</small>
            </div>
            <div class="toast-body">
                {{ __('ui.Announcement_creation_success') }}
            </div>
          </div>
        @endif


        {{-- Titolo --}}
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('ui.TitoloAnnuncio') }}</label>
            <input type="text" wire:model="title" class="form-control toBlack3 {{ $theme . '-theme4' }} @error('title') is-invalid @enderror"
                id="title">

            @error('title')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-3">

            <label for="category">{{ __('ui.Categoria') }}</label>
            <select wire:model.defer="category" id="category"
                class="form-control toBlack3 {{ $theme . '-theme4' }} @error('category') is-invalid @enderror">

                <option  value="">{{ __('ui.CategoriaScegli') }} </option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category')
                {{ $message }}
            @enderror
        </div>
        {{-- Caricamento foto --}}
        <div class="mb-3">
            <label for="temporary_images">{{ __('ui.Foto') }}</label>
            <input id="temporary_images" wire:model="temporary_images" type="file" name="images" multiple
                class="form-control toBlack3 {{ $theme . '-theme4' }} shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img" />
            @error('temporary_images.*')
                <p class="text-danger mt-2">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <div class="row boreder border-4 border-info shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col my-3">
                                <div class="img-preview mx-auto shadow rounded"
                                style="background-image: url({{$image->temporaryUrl()}})"></div>
                                <button type="button"
                                    class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{ $key }})">Cancella</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif




        <div class="mb-3">

            <label for="provincia">{{ __('ui.Provincia') }}</label>
            <select wire:model.defer="provincia" id="provincia"
                class="form-control toBlack3 {{ $theme . '-theme4' }} @error('provincia') is-invalid @enderror">

                <option value="">{{ __('ui.ProvinciaScegli') }}</option>

                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->name }}">{{ $provincia->name }}</option>
                @endforeach
            </select>

            @error('provincia')
                {{ $message }}
            @enderror
        </div>

        {{--  prezzo del annuncio --}}
        <div class="mb-3">
            <label for="price" class="form-label">{{ __('ui.PrezzoProdotto') }}</label>
            <input type="decimal" wire:model="price" class="form-control toBlack3 {{ $theme . '-theme4' }} @error('price') is-invalid @enderror"
                id="price">
            @error('price')
                {{ $message }}
            @enderror
        </div>

        {{-- Descizione annuncio --}}
        <div class="mb-3">

            <label for="description" class="form-label"> {{ __('ui.DescrizioneAnnuncio') }}</label>
            <textarea wire:model="description" class="toBlack3 {{ $theme . '-theme4' }} form-control @error('description') is-invalid @enderror" cols="10"
                rows="10"></textarea>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <div class="row">
            <div class="col-12 mb-2"> <button type="submit" class="btn btn-presto" id="Save">{{ __('ui.Salva') }}</button></div>
            <div class="col-12 text-start">{{ __('ui.Obbligatori') }}</div>

        </div>

        <div> </div>
    </form>

</div>

