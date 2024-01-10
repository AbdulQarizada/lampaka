@extends('layouts.master-layouts')

@section('title')
Create Account | Qamar Foundation
@endsection

@section('css')
<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ URL::asset('/assets/libs/filepond/css/filepond.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/filepond/css/plugins/filepond-plugin-image-preview.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
@endsection


    @section('content')
    <form method="POST" class="form-horizontal" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <div class="w-100">

                    <div class="d-flex flex-column h-100">
                        <!-- <div class="mb-4 mb-md-5">
                            <a href="index" class="d-block auth-logo">
                                <span><img src="{{ URL::asset('/assets/images/side_logo.png') }}" alt="" height="90" class="auth-logo-dark"></span>
                            </a>
                        </div> -->
                        <div>
                            <h5 class="text-primary text-uppercase">Register account</h5>
                            <p class="text-muted">Be part of the biggest network of Qamar Foundation</p>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-lg-12">
                <div class="card ">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="FirstName" class="form-label ">First Name <i class="mdi mdi-asterisk text-danger"></i></label>
                                            <input type="text" class="form-control form-control-lg @error('FirstName') is-invalid @enderror" value="{{ old('FirstName') }}" id="FirstName" name="FirstName" required>
                                            @error('FirstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="LastName" class="form-label ">Last Name <i class="mdi mdi-asterisk text-danger"></i></label>
                                            <input type="text" class="form-control form-control-lg @error('LastName') is-invalid @enderror" value="{{ old('LastName') }}" id="LastName" name="LastName" required>

                                            @error('LastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="email" class="form-label ">Email <i class="mdi mdi-asterisk text-danger"></i></label>
                                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" required>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="mb-3 position-relative">
                                            <label for="DOB" class="form-label">Date of Birth <i class="mdi mdi-asterisk text-danger"></i></label>
                                            <div class="input-group " id="example-date-input">

                                                <input class="form-control form-select-lg @error('DOB') is-invalid @enderror" value="{{ old('DOB') }}" type="date" id="example-date-input" name="DOB" id="DOB" required>
                                                @error('DOB')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="password" class="form-label ">Password <i class="mdi mdi-asterisk text-danger"></i></label>
                                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" name="password" required>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="password_confirmation" class="form-label ">Confirm Password <i class="mdi mdi-asterisk text-danger"></i></label>
                                            <input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation" required>

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                             
                                    <!-- <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="PhoneNumber" class="form-label ">Phone Number <i class="mdi mdi-asterisk text-danger"></i></label>
                                            <input type="number" class="form-control form-control-lg @error('PhoneNumber') is-invalid @enderror" value="{{ old('PhoneNumber') }}" id="PhoneNumber" name="PhoneNumber" max="999999999" required>
                                            @error('PhoneNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> -->
                                  <div class="col-md-3">
                                  <label for="PhoneNumber" class="form-label ">Support us in:</label>
                                        <div class="mb-3 position-relative">
                                        <div class="form-check form-check-info mb-3">
                                    <input class="form-check-input @error('OrphanSponsor') is-invalid @enderror"  type="checkbox" value="1" id="formCheckcolor3" name="OrphanSponsor" id="OrphanSponsor" checked>
                                    <label class="form-check-label" for="formCheckcolor3">
                                        Orphan Sponsorship
                                    </label>
                                </div>
                                            
                                            @error('OrphanSponsor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-3 justify-content-center">
                            <img src="{{URL::asset('/assets/images/orphan.jpg')}}" alt="" class="img-fluid mx-auto d-block">

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3 mt-4">
                            </div>
                            <div class="mt-3 text-center">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                <p>Already have an account ? <a href="{{ url('login') }}" class="fw-medium text-primary"> Login</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->


    </form>

    @endsection
    @section('script')


    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

 

 
    @endsection