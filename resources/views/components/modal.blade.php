<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login-modal">Accedi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container my-5">
                    <div class="row justify-content-center">

                        {{-- per funzionare il form serve un method="",action="", @csrf il token --}}
                        <form class="p-5 shadow" method="POST" action="{{ route('login') }}">
                            @csrf
                            <x-validate-errors />

                            {{-- Email dell'utente --}}
                            <div class="mb-3">
                                {{-- il name è obbligatorio se no la request del form non sa come gestire questo elemento --}}
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp">
                            </div>

                            {{-- password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>

                            {{-- gestione di ricordarsi --}}
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="rember" class="form-check-input" id="remebrer">
                                <label class="form-check-label" for="remebrer">Ricordati di me</label>
                            </div>

                            <button type="submit" class="btn btn-presto">Accedi</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
