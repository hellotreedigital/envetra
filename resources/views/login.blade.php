@extends('layouts/new-main')

@section('content')

    <div class="login-background">
        <img src="{{ Voyager::image($login_settings->background_image) }}" />
        <div class="d-flex flex-column position-relative container h-100 py-4">
            <div>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/new/logo.svg') }}" height="45" />
                </a>
            </div>
            <div class="flex-grow-1 d-flex align-items-center justify-content-center py-5" animate="down">
                <div class="login-card mb-4">
                    <div class="login-card-shadow"></div>
                    <div class="position-relative bg-white">
                        <h2 class="login-title"><b>{{ $login_settings->title }}</b></h2>
                        <form id="login-form">
                            @csrf
                            <input class="d-block w-100" name="email" placeholder="{{ $login_settings->email_placeholder }}" />
                            <input class="d-block w-100" type="password" name="password" placeholder="{{ $login_settings->password_placeholder }}" />
                            <div class="text-end">
                                <button class="btn btn-prim">{{ $login_settings->button_text }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="toast toast-danger text-center bg-white p-3"></div>

@endsection
