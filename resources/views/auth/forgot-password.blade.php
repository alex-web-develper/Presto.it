<x-layout title="Reset Password">
    <x-header>
        Cambio Password, Password dimenticata
    </x-header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @if (session('status') == 'verification-link-sent')
                    <div class="my-5 alert-success">
                        Ti è stato correttamente inviata una nuova mail di verifica
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success my-5">
                        {{ session('status') }}
                    </div>
                     
                @endif
                <form class="rounded p-4 {{ $theme . '-theme2' }} toBlack2 shadow" method="POST" action="/forgot-password">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control toBlack3 {{ $theme . '-theme4' }} @error('email') is-invalid @enderror"
                            id="email">
                        @error('email')
                        <div class="alert alert-info position-absolute top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <img src="{{ asset('img/toast.png') }}" class="rounded me-2" alt="...">
                              <strong class="me-auto">Presto.it</strong>
                              <small>{{ __('ui.Ora') }}</small>
                            </div>
                            <div class="toast-body">
                                {{ $message }}
                            </div>
                          </div>
                            
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-presto">Reset password</button>
                </form>



            </div>


        </div>
    </div>


</x-layout>
