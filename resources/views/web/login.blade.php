<x-layout.default>
    <x-slot:pageTitle>
        Login
    </x-slot:pageTitle>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-4">
                <!-- Card para o formulário de login -->
                <div class="card shadow">
                    <div class="card-header text-center bg-dark text-white">
                        <h4 class="mb-0">Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <!-- Campo E-mail -->
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Campo Senha -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input 
                                    type="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Botão de login -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                    <!-- Footer do card -->
                    <div class="card-footer text-center">
                        <small>
                            Ainda não tem uma conta? <a href="{{ url('/register') }}">Registre-se</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.default>
