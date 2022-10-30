<x-layout title="Reset Password">
    <x-header>
        Reset password
    </x-header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @if (session('status'))
                    <div class="alert alert-success my-5">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="p-5 shadow {{ $theme . '-theme2' }} toBlack2 shadow rounded" method="POST" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    <div class="mb-3">
                        {{-- il name è obbligatorio se no la request del form non sa come gestire questo elemento --}}
                        <label for="email" class="form-label">Indirizzo email</label>
                        <input type="email" name="email" class="form-control toBlack3 {{ $theme . '-theme4' }} @error('email') is-invalid @enderror"
                            id="email" value="{{ $request->email }}">
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

                    {{-- conferma password --}}
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('ui.Conferma') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control toBlack3 {{ $theme . '-theme4' }} @error('password_confirmation') is-invalid @enderror">

                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-presto mt-3">Reset password</button>
                </form>



            </div>


        </div>
    </div>


</x-layout>
