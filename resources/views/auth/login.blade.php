<x-layout title="Accedi | Pesto.it">

    <x-header>
        Accedi
    </x-header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                {{-- per funzionare il form serve un method="",action="", @csrf il token --}}
                <form class="p-5 shadow {{ $theme . '-theme2' }} toBlack2" method="POST" action="{{ route('login') }}">
                    @csrf


                    {{-- Email dell'utente --}}
                    <div class="mb-3">

                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control toBlack3 {{ $theme . '-theme4' }} @error('email') is-invalid @enderror"
                            id="email" aria-describedby="emailHelp">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>

                    {{-- password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password"
                            class="form-control toBlack3 {{ $theme . '-theme4' }} @error('password') is-invalid @enderror" id="password">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>

                    {{-- gestione del ricordarsi --}}
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="rember"
                            class="form-check-input toBlack3 {{ $theme . '-theme4' }} @error('checkbox') is-invalid @enderror" id="remebrer">
                        <label class="form-check-label" for="remebrer">{{ __('ui.RicordatiDiMe') }}</label>
                        @error('checkbox')
                            {{ $message }}
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-presto">{{ __('ui.Accedi') }}</button>
                    <span class="ms-2 fst-italic small"><a href="/forgot-password">{{ __('ui.Dimenticata') }}</a></span>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center m-3">
                            <a class="btn btn-light border" href="/auth/google" role="button"
                                style="text-transform:none">
                                <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                    {{ __('ui.LoginGoogle') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

</x-layout>
