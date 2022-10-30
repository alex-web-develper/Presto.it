<x-layout title="conferma email">
    <x-header>
        Attenzione!
    </x-header>
    <div class="container">
        <div class="row pt-4 justify-content-center">
            <div class="col-10 p-3 shadow mb-4 rounded-pill text-center bg-grey">
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-info position-absolute bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <img src="{{ asset('img/toast.png') }}" class="rounded me-2" alt="...">
                            <strong class="me-auto">Presto.it</strong>
                            <small>{{ __('ui.Ora') }}</small>
                        </div>
                        <div class="toast-body">
                            {{ __('ui.Invio') }}
                        </div>
                    </div>  
                @endif

                <h2 class="m-4">{{ __('ui.PrimaDi') }}</h2>
                <form method="POST" action="{{ route('verification.send') }}" class="">
                    @csrf
                    <button class="btn btn-presto" id="">{{ __('ui.Clicca') }}</button>
                </form>
            </div>
        </div>
        
        <div class="row justify-content-center">
            
        </div>
    </div>


</x-layout>
