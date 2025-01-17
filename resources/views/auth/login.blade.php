@extends('layouts.core')

@section('main')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible w-100 fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="form-control p-3" method="POST" action="{{ route('auth.store') }}">
                    @csrf

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">E-posta</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Şifre</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Giriş Yap</button>

                </form>
            </div>
        </div>
    </div>
@endsection
