<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row d-flex flex-wrap-reverse justify-content-center align-items-center min-vh-100">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 d-flex flex-column justify-content-center align-items-center px-5">
                    <div class="row d-flex justify-content-center">
                        <h4 class="fw-bold">Login</h4>
                        <p class="fw-medium text-secondary">Enter Your Account Detail</p>
                        <div class="d-flex flex-column gap-3 justify-content-start">
                            <x-input-label for="email" :value="__('Email')"/>
                            <div class="fom-control">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan NISN anda" value="{{old('email')}}" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="text-danger list-group-item list-none"/>
                            </div>
                            <x-input-label for="password" :value="__('Password')"/>    
                            <div class="fom-control">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password Anda" required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="text-danger list-group-item list-none"/>
                            </div>
                             <!-- Remember Me -->
                            <div class="block">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            
                            <button type="submit" class="button text-decoration-none text-center rounded py-2" value="Login">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 d-flex flex-column justify-content-center align-items-center d-none d-sm-block">
                    <img src="{{ asset('img/sma1.png') }}" alt="sma" style="z-index: 1" class="w-100">
                </div>
            </div>
        </form>
    </div>
    </div>
    {{-- bootstrap js --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en"> --}}

{{-- <head> --}}
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}

    {{-- font --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> --}}

    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
{{-- </head> --}}

{{-- <body>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    <div class="container">
        <div class="row d-flex flex-wrap-reverse justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 d-flex flex-column justify-content-center align-items-center px-5">
                <div class="row d-flex justify-content-center">
                    <h4 class="fw-bold">Login</h4>
                    <p class="fw-medium text-secondary">Enter Your Account Detail</p>
                    <div class="d-flex flex-column gap-3 justify-content-start">
                        <div class="fom-control">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                        </div>
                        <div class="fom-control">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" /></div>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                        
                                    <x-primary-button class="ms-3">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 d-flex flex-column justify-content-center align-items-center d-none d-sm-block">
                <img src="{{ asset('img/sma1.png') }}" alt="sma" style="z-index: 1" class="w-100">
            </div>
        </div>
    </div>
    </div>

</form>
    {{-- bootstrap js --}}
    {{-- <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body> --}} 
</html>
