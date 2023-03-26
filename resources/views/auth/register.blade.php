@extends('layouts.main')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="{{ asset('images/logo.svg') }}" alt="logo">
                    </div>
                    <h4>Belum punya akun?</h4>
                    <h6 class="font-weight-light">Daftar dulu masbro!</h6>
                    <form class="pt-3" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="exampleInputUsername1"
                                name="name" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg"
                                id="exampleInputEmail1" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg"
                                id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox">
                                    I agree to all Terms & Conditions
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                SIGN UP
                            </button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection