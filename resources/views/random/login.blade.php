@extends('random.auth-layout')

@section('content')
    <main class="main-position">
        <div class="auth-position">
            <div class="auth-content">
                <div class="auth-header">
                    <div class="text-center">
                        <h1 class="header-text">Login</h1>
                    </div>
                </div>
                <div class="auth-body">
                    <div class="auth-body-content">
                        @error('auth_fail')
                        <div class="alert-danger bg-danger-text mb-3 f-s-23">
                            {{ $message }}
                        </div>
                        @enderror
                        <form action="{{ route('random.login.post') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="name">Username</label>
                                <span class="form-icon-wrapper">
                                    <span class="form-icon form-icon--left i-s-12">
                                        <i class="fas fa-user form-icon__item"></i>
                                    </span>
                                    <input type="text" id="name" class="form-control form-icon-input-left auth-input
                                           @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                           autocomplete="username" placeholder="Username" autofocus>
                                </span>
                                @error('name')
                                <div class="alert-danger f-s-20 mt-1 pl-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <span class="form-icon-wrapper">
                                    <span class="form-icon form-icon--left i-s-12">
                                        <i class="fas fa-key form-icon__item"></i>
                                    </span>
                                    <input type="password" id="password" class="form-control form-icon-input-left auth-input
                                           @error('password') is-invalid @enderror" name="password" autocomplete="current-password"
                                           placeholder="Password">
                                </span>
                                @error('password')
                                <div class="alert-danger f-s-20 mt-1 pl-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" id="submit-btn" class="btn mt-4 auth-btn">{{ __('Login') }}</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5" role="contentinfo">
                <p class="mb-0 auth-copyright-text">© 2020 <a class="auth-copyright-text-user" href="https://github.com/houtarou-dism">houtarou</a>.</p>
            </div>
        </div>
    </main>
@endsection
