
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/Componentes/form.css">
    <link rel="icon" href="../Img/ico/logo-color.ico">
    <script defer src="../js/form.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <section class="w-100 container section-container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Registro de Cuenta</h5>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-input-label class="form-label" for="name" :value="__('Name')" />
                                <x-text-input id="name"
                                              class="form-control"
                                              type="text"
                                              name="name"
                                              :value="old('name')"
                                              required autofocus autocomplete="name"
                                              placeholder="Ingresa tu correo"
                                >Ingrese un nombre_usuario</x-text-input>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label class="form-label" for="email" :value="__('Email')">Correo Electrónico</x-input-label>
                            <x-text-input id="email" class="form-control"
                                          type="email"
                                          name="email"
                                          :value="old('email')"
                                          required autocomplete="usuarioname"
                                          placeholder="Ingresa tu correo"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <x-input-label class="form-label" for="password" :value="__('Password')">Contraseña</x-input-label>
                            <x-text-input id="password" class="form-control"
                                          type="password"
                                          name="password"
                                          placeholder="Ingresa tu contraseña"
                                          required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <x-input-label class="form-label" for="password_confirmation" :value="__('Confirmar contraseña')" />

                            <x-text-input id="password_confirmation" class="form-control"
                                          type="password"
                                          name="password_confirmation"
                                          required autocomplete="new-password"
                                          placeholder="Confirmar contraseña"
                            />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="mb-3 mt-3 button-container d-flex justify-content-center">
                            <input type="submit" value="Registrarse" name="enviar"
                                class="btn btn-primary w-100 enviar-btn">
                        </div>
                        </form>
                    <div class="text-center mt-3">
                        <p>¿Ya tienes una cuenta?</p>
                        <button type="button" class="btn btn-link" onclick="window.location='{{ route('login') }}'">Iniciar Sesión</button>

                    </div>
                </div>
            </div>

        </section>
    </div>
</body>

</html>
