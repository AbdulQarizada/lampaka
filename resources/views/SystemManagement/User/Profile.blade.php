@extends(Cookie::get('Layout') == 'LayoutSidebar' ? 'Layouts.master' : 'Layouts.master-layouts')
@section('title') System Management @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/filepond/css/filepond.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/filepond/css/plugins/filepond-plugin-image-preview.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/filepond/css/plugins/filepond-plugin-file-poster.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/css/mystyle/tabstyle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{route('AllUser')}}" class="btn btn-outline-info btn-lg waves-effect mb-3 btn-label waves-light"><i class="bx bx-left-arrow  font-size-16 label-icon"></i>Back</a>
        <a href="javascript:window.print()" class="btn btn-outline-dark mb-3 waves-effect waves-light"><i class=" bx bxs-printer   font-size-18"></i></a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-nowrap">
                <tr>
                    <td>
                        <img src="{{URL::asset('/uploads/User/Profiles/'.$data -> Profile)}}" style="width: 130px; height: 135px;" class="rounded">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-9">
        <h5 style="font-weight: bold;" class="card-header  text-dark mb-3">PEROSNAL INFORMATION</h5>
    </div>
    <div class="col-md-3 col-sm-2 float-end">
        <div class="d-flex flex-wrap gap-2">
           <a data-bs-toggle="collapse" data-bs-target="#resetPassord" aria-expanded="false" aria-controls="resetPassord" class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end text-uppercase"><i class="mdi mdi-lock-reset me-1"></i>Change Passord</a>
           <a data-bs-toggle="collapse" data-bs-target="#addUser" aria-expanded="false" aria-controls="addUser" class="btn btn-outline-info btn-lg waves-effect  waves-light float-end text-uppercase"><i class="mdi mdi-square-edit-outline me-1"></i>Edit</a>
       </div>
   </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="collapse hide" id="addUser">
            <div class="card shadow-none card-body text-muted mb-0 mb-4" style="border: 2px dashed #50a5f1;">
                <form class="needs-validation" action="{{route('UpdateProfileUser', [$data -> id])}}" method="POST" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-2 col-sm-3 ">
                                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active bg-info" id="v-pills-personal-tab" data-bs-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">
                                        <i class="mdi mdi-account-settings-outline  d-block check-nav-icon mt-4 mb-2"></i>
                                        <p class="fw-bold mb-4 text-uppercase">Personal Information</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-sm-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3 class="card-header bg-info text-white mb-3"></h3>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="FirstName" class="form-label ">First Name <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input type="text" class="form-control form-control-lg @error('FirstName') is-invalid @enderror" value="{{$data -> FirstName}}" id="FirstName" name="FirstName" required>
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
                                                                    <input type="text" class="form-control form-control-lg @error('LastName') is-invalid @enderror" value="{{$data -> LastName}}" id="LastName" name="LastName" required>
                                                                    @error('LastName')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="FullName" class="form-label ">Full Name </label>
                                                                    <input type="text" class="form-control form-control-lg @error('FullName') is-invalid @enderror" value="{{$data -> FullName}}" id="FullName" name="FullName">
                                                                    @error('FullName')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Job" class="form-label ">Job </label>
                                                                    <input type="text" class="form-control form-control-lg @error('Job') is-invalid @enderror" value="{{$data -> Job}}" id="Job" name="Job">
                                                                    @error('Job')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="email" class="form-label ">Email (User Name)<i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{$data -> email}}" id="email" name="email" readonly>
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
                                                                        <input class="form-control form-select-lg @error('DOB') is-invalid @enderror" value="{{$data -> DOB}}" type="date" id="example-date-input" name="DOB" id="DOB" required>
                                                                        @error('DOB')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 justify-content-center">
                                                        <input type="file" class="my-pond @error('Profile') is-invalid @enderror" value="{{$data -> Profile}}" id="Profile" name="Profile" />
                                                        @error('Profile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end btn-rounded w-lg" type="submit">Update </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="collapse hide" id="resetPassord">
            <div class="card shadow-none card-body text-muted mb-0 mb-4" style="border: 2px dashed #50a5f1;">
                <form class="needs-validation" action="{{route('UpdatePasswordUser', [$data -> id])}}" method="POST" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-2 col-sm-3 ">
                                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active bg-info" id="v-pills-personal-tab" data-bs-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">
                                        <i class="mdi mdi-lock-reset  d-block check-nav-icon mt-4 mb-2"></i>
                                        <p class="fw-bold mb-4 text-uppercase">Change Password</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-sm-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3 class="card-header bg-info text-white mb-3"></h3>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="current_password" class="form-label ">Current Password <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input class="form-control form-control-lg me-auto @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}" type="text" name="current_password" id="current_password" required>
                                                                    @error('current_password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="password" class="form-label ">New Password <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input class="form-control form-control-lg me-auto @error('password') is-invalid @enderror" value="{{ old('password') }}" type="text" name="password" id="QCC" required>
                                                                    @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="password_confirmation" class="form-label ">New Password Again<i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input class="form-control form-control-lg me-auto @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" type="text" name="password_confirmation" id="password_confirmation" required>
                                                                    @error('password_confirmation')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end btn-rounded" type="submit">Change </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-nowrap">
                <tr>
                    <td style="width: 20%; border: 2px solid #000; padding: 5px;">First Name</td>
                    <td style="width: 40%; border: 2px solid #000; padding: 5px;">{{ $data -> FirstName}} </td>
                    <td style="width: 20%; border: 2px solid #000; padding: 5px;">Last Name</td>
                    <td style="width: 40%; border: 2px solid #000; padding: 5px;">{{ $data -> LastName}}</td>
                </tr>
                <tr>
                    <td style="width: 20%; border: 2px solid #000; padding: 5px;">Full Name</td>
                    <td style="width: 40%; border: 2px solid #000; padding: 5px;">{{ $data -> FullName}}</td>
                    <td style="width: 20%; border: 2px solid #000; padding: 5px;">Job</td>
                    <td style="width: 40%; border: 2px solid #000; padding: 5px;">{{ $data -> Job}}</td>
                </tr>
                <tr>
                    <td style="width: 20%; border: 2px solid #000; padding: 5px;">Email</td>
                    <td style="width: 40%; border: 2px solid #000; padding: 5px;">{{ $data -> email }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/pages/sweetalert.min.js') }}"></script>
<!-- FilePond -->
<script src="{{ URL::asset('/assets/libs/filepond/js/filepond.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/filepond/js/plugins/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/filepond/js/plugins/filepond-plugin-file-poster.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/filepond/js/plugins/filepond-plugin-file-validate-type.js') }}"></script>
<!-- Form Valdation -->
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.registerPlugin(FilePondPluginFilePoster);

    // Get a reference to the file input element
    const inputProfile = document.querySelector('input[name="Profile"]');
    const Profile = FilePond.create(inputProfile, {
        labelIdle: 'Profile <span class="bx bx-upload"></span >'
        , server: {
            url: '{{ route('Users_Profile')}}'
            , headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
        , acceptedFileTypes: ['image/png', 'image/jpeg']
        , allowFileTypeValidation: true
        , instantUpload: true
        , imagePreviewHeight: 100
        , imageCropAspectRatio: '1:1'
        , imageResizeTargetWidth: 10
        , imageResizeTargetHeight: 10
        , stylePanelLayout: 'compact circle'
        , styleLoadIndicatorPosition: 'center bottom'
        , styleProgressIndicatorPosition: 'right bottom'
        , styleButtonRemoveItemPosition: 'left bottom'
        , styleButtonProcessItemPosition: 'right bottom'
        , files: [{
            source: '{{Auth::user() -> Profile}}'
            , options: {
                type: 'local'
                , file: {
                    type: 'image/png'
                }
                , metadata: {
                    poster: '{{URL::asset('/uploads/User/Profiles/'.Auth::user() -> Profile)}}'
                }
            }
        }]
    , });
</script>

@endsection
