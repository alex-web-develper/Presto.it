<x-layout title="Registrati | Presto.it">

    <x-header>
        Registrati
    </x-header>


    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    @if (Config::get('app.locale') == 'it')
                        <img class="register-side" src="{{ asset('img/register-side.jpg') }}" alt="logo sito">
                    @elseif (Config::get('app.locale') == 'en')
                        <img class="register-side" src="{{ asset('img/register-side-eng.jpg') }}" alt="logo sito">
                    @elseif (Config::get('app.locale') == 'es')
                        <img class="register-side" src="{{ asset('img/register-side-esp.jpg') }}" alt="logo sito">
                    @endif
                    {{-- per funzionare il form serve un method="",action="", @csrf il token --}}

                    <form class="p-5 shadow w-100 rounded {{ $theme . '-theme2' }} toBlack2" method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Email dell'utente --}}
                        <div class="mb-3">
                            {{-- il name è obbligatorio se no la request del form non sa come gestire questo elemento --}}
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control toBlack3 {{ $theme . '-theme4' }} @error('email') is-invalid @enderror" id="email"
                                aria-describedby="emailHelp">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>

                        {{-- Nome della persona  --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('ui.Nome') }}</label>
                            <input type="text" name="name"
                                class="form-control toBlack3 {{ $theme . '-theme4' }} @error('name') is-invalid @enderror" id="name">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>

                        {{-- nome utente UserName --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username"
                                class="form-control toBlack3 {{ $theme . '-theme4' }} @error('username') is-invalid @enderror" id="username">
                            @error('username')
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
                        {{-- conferma password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('ui.Conferma') }}</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control toBlack3 {{ $theme . '-theme4' }} @error('password_confirmation') is-invalid @enderror">

                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-presto">{{ __('ui.Registrati') }}</button>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center m-3">
                                <a class="btn btn-light border" href="/auth/google" role="button"
                                    style="text-transform:none">
                                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                        {{ __('ui.RegisterGoogle') }}
                                </a>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</x-layout>
