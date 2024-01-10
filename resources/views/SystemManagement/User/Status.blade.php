@extends(Cookie::get('Layout') == 'LayoutSidebar' ? 'Layouts.master' : 'Layouts.master-layouts')
@section('title') System Management @endsection
@section('css')
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
                    <td style="float:right;">
                        <div class="">
                            <div class="text-center">
                                <h4 class="font-size-18 mb-1"><a href="#" class="badge badge-soft-success">Scan Me </a></h4>
                                <div class="mb-3" class="rounded">
                                    {!! DNS2D::getBarcodeSVG(''.$data->id, 'QRCODE', 6, 6, true) !!}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-10">
        <h5 style="font-weight: bold;" class="card-header  text-dark mb-3">PEROSNAL INFORMATION</h5>
    </div>
    <div class="col-md-2 col-sm-2 mb-2">
        <a data-bs-toggle="collapse" data-bs-target="#addUser" aria-expanded="false" aria-controls="addUser" class="btn btn-outline-info btn-lg waves-effect  waves-light float-end text-uppercase"><i class="mdi mdi-square-edit-outline me-1"></i>Edit</a>
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="collapse hide" id="addUser">
            <div class="card shadow-none card-body text-muted mb-0 mb-4" style="border: 2px dashed #50a5f1;">
                <form class="needs-validation" action="{{route('UpdateUser', [$data -> id])}}" method="POST" enctype="multipart/form-data" novalidate>
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
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
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
                                                            <div class="col-md-4">
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
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="FullName" class="form-label ">Full Name </label>
                                                                    <input type="text" class="form-control form-control-lg @error('FullName') is-invalid @enderror" value="{{$data -> FullName}}" id="FullName" name="FullName" required>
                                                                    @error('FullName')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Job" class="form-label ">Job </label>
                                                                    <input type="text" class="form-control form-control-lg @error('Job') is-invalid @enderror" value="{{$data -> Job}}" id="Job" name="Job" required>
                                                                    @error('Job')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="email" class="form-label ">Email (User Name)<i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{$data -> email}}" id="email" name="email" required>
                                                                    @error('email')
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
<div class="row mt-4">
    <div class="col-md-10">
        <h5 style="font-weight: bold;" class="card-header  text-dark mb-3">Roles and Permissions INFORMATION</h5>
    </div>
    <div class="col-md-2 col-sm-2 mb-2">
        <a data-bs-toggle="collapse" data-bs-target="#addRole" aria-expanded="false" aria-controls="addRole" class="btn btn-outline-success btn-lg waves-effect  waves-light float-end"><i class="mdi mdi-plus me-1"></i>ADD ROLES</a>
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="collapse hide" id="addRole">
            <div class="card shadow-none card-body text-muted mb-0 mb-4" style="border: 2px dashed #50a5f1;">
                <form class="needs-validation" action="{{route('AssignRoleUser', [$data -> id])}}" method="POST" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-2 col-sm-3 ">
                                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active bg-info" id="v-pills-personal-tab" data-bs-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">
                                        <i class="mdi mdi-account-plus-outline  d-block check-nav-icon mt-4 mb-2"></i>
                                        <p class="fw-bold mb-4 text-uppercase">Assign Roles</p>
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
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsOrphanRelief') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsOrphanRelief" name="IsOrphanRelief" {{ $data->IsOrphanRelief=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="mdi mdi-account-child  display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Orphans Relief</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsAidAndRelief') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsAidAndRelief" name="IsAidAndRelief" {{ $data->IsAidAndRelief=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bx-briefcase-alt-2 display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Aid and Relief</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsWash') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsWash" name="IsWash" {{ $data->IsWash=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bx-gas-pump  display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Wash</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsEducation') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsEducation" name="IsEducation" {{ $data->IsEducation=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bxs-graduation  display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Education</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsInitiative') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsInitiative" name="IsInitiative" {{ $data->IsInitiative=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bx-bulb  display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Initiative</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsMedicalSector') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsMedicalSector" name="IsMedicalSector" {{ $data->IsMedicalSector=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bxs-ambulance  display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Medical Sector</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsQamarCareCard') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsQamarCareCard" name="IsQamarCareCard" {{ $data->IsQamarCareCard=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bx-credit-card display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Care Card</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsFoodAppeal') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsFoodAppeal" name="IsFoodAppeal" {{ $data->IsFoodAppeal=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bx-fingerprint display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Appeals</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsAppealsDistributions') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsAppealsDistributions" name="IsAppealsDistributions" {{ $data->IsAppealsDistributions=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bx-task display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Distribution</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsDonorsAndDonorBoxes') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsDonorsAndDonorBoxes" name="IsDonorsAndDonorBoxes" {{ $data->IsDonorsAndDonorBoxes=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bxs-box display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Donors</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsVolunteer') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsVolunteer" name="IsVolunteer" {{ $data->IsVolunteer=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="mdi mdi-account-star-outline display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Volunteers</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsRepresentative') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsRepresentative" name="IsRepresentative" {{ $data->IsRepresentative=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="mdi mdi-account-supervisor-circle-outline display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Representatives</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsDonorsAndDonorBoxes') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsDonorsAndDonorBoxes" name="IsDonorsAndDonorBoxes" {{ $data->IsDonorsAndDonorBoxes=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="bx bxs-box display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Donors</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsSuperAdmin') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsSuperAdmin" name="IsSuperAdmin" {{ $data->IsSuperAdmin=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="mdi mdi-application-cog display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">System</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsManager') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsManager" name="IsManager" {{ $data->IsManager=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="mdi mdi-account-network-outline display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">Manager</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-2">
                                                                <div class="card-one  mini-stats-wid border border-secondary">
                                                                    <div class="card-body text-center">
                                                                        <div class="form-check form-checkbox-outline form-check-danger float-end @error('IsGeneralManager') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="IsGeneralManager" name="IsGeneralManager" {{ $data->IsGeneralManager=="1"? 'checked':'' }}>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <i class="mdi mdi-account-settings-outline display-5 "></i>
                                                                                <p class="my-0 text-dark mt-2 font-size-18">General Manager</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end btn-rounded w-lg" type="submit">Assign </button>
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
    @if($data -> IsOrphanRelief == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexOrphansRelief')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="mdi mdi-account-child  display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Orphans Relief</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsAidAndRelief == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexOrphansRelief')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bx-briefcase-alt-2 display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Aid and Relief</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsWash == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexOrphansRelief')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bx-gas-pump  display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Wash</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsEducation == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexEducation')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bxs-graduation  display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Education</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsInitiative == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexEducation')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bx-bulb  display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Initiative</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsMedicalSector == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexEducation')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bxs-ambulance  display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Medical Sector</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsQamarCareCard == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexCareCard')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bx-credit-card display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Care Card</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsFoodAppeal == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexEducation')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bx-fingerprint display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Appeals</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsAppealsDistributions == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexCareCard')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bx-task display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Distribution</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsDonorsAndDonorBoxes == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexCareCard')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="bx bxs-box display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Donors</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsVolunteer == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('AllVolunteer')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="mdi mdi-account-star-outline display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Volunteers</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data ->  IsRepresentative  == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('AllRepresentative')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="mdi mdi-account-supervisor-circle-outline display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Representatives</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsSuperAdmin == 1)
    <div class="col-md-2 mb-2">
        <a href="{{route('IndexSystemManagement')}}">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="mdi mdi-application-cog display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">System</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsManager == 1)
    <div class="col-md-2 mb-2">
        <a href="#">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="mdi mdi-account-network-outline display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if($data -> IsGeneralManager == 1)
    <div class="col-md-2 mb-2">
        <a href="#">
            <div class="card-one  mini-stats-wid border border-secondary">
                <div class="card-body text-center">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <i class="mdi mdi-account-settings-outline display-5 "></i>
                            <p class="my-0 text-dark mt-2 font-size-18">General Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
</div>
<div class="row mt-4">
    <div class="col-md-10">
        <h5 style="font-weight: bold;" class="card-header  text-dark mb-3">User Status</h5>
    </div>
    <div class="col-md-2 col-sm-2 mb-2">
        <a data-bs-toggle="collapse" data-bs-target="#resetPassord" aria-expanded="false" aria-controls="resetPassord" class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end text-uppercase"><i class="mdi mdi-lock-reset me-1"></i>Reset Passord</a>
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="collapse hide" id="resetPassord">
            <div class="card shadow-none card-body text-muted mb-0 mb-4" style="border: 2px dashed #50a5f1;">
                <form class="needs-validation" action="{{route('ResetPasswordUser', [$data -> id])}}" method="POST" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-2 col-sm-3 ">
                                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active bg-info" id="v-pills-personal-tab" data-bs-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">
                                        <i class="mdi mdi-lock-reset  d-block check-nav-icon mt-4 mb-2"></i>
                                        <p class="fw-bold mb-4 text-uppercase">Reset Password</p>
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
                                                            <div class="col-md-6">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="password" class="form-label ">New Password <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <div class="hstack gap-3">
                                                                        <input class="form-control form-control-lg me-auto @error('password') is-invalid @enderror" value="{{ old('password') }}" type="text" name="password" id="QCC" required>
                                                                        <button type="button" class="btn btn-lg btn-outline-danger password" onclick="Random()"><i class=" bx bxs-magic-wand  font-size-16 align-middle"></i> </button>
                                                                        @error('password')
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
                                        </div>
                                        <div>
                                            <button class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end btn-rounded" type="submit">Reset </button>
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
<div class="row mt-4">
    @if($data -> IsActive == 1)
    <div class="col-md-2 mb-2">
        <div class="card-one  mini-stats-wid border border-secondary">
            <div class="card-body text-center">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <i class="mdi mdi-check-decagram display-5 text-success"></i>
                        <p class="my-0 text-dark mt-2 font-size-18">Active</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($data -> IsActive != 1)
    <div class="col-md-2 mb-2">
        <div class="card-one  mini-stats-wid border border-secondary">
            <div class="card-body text-center">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <i class="mdi mdi-alert-remove-outline text-danger display-5 "></i>
                        <p class="my-0 text-dark mt-2 font-size-18">InActive</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($data -> IsEmployee == 1)
    <div class="col-md-2 mb-2">
        <div class="card-one  mini-stats-wid border border-secondary">
            <div class="card-body text-center">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <i class="mdi mdi-account-tie-outline text-info display-5 "></i>
                        <p class="my-0 text-dark mt-2 font-size-18">Employee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($data -> IsOrphanSponsor == 1)
    <div class="col-md-2 mb-2">
        <div class="card-one  mini-stats-wid border border-secondary">
            <div class="card-body text-center">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <i class="mdi mdi-account-child-outline text-primary display-5 "></i>
                        <p class="my-0 text-dark mt-2 font-size-18">Orphan Sponsor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-12">
        @if($data -> IsActive == 1)
        <a href="{{route('DeActivateUser', ['data' => $data -> id])}}" class="btn btn-outline-danger btn-lg btn-rounded w-lg waves-effect waves-light reinitiate m-3">
            De-ACTIVATE
        </a>
        @endif
        @if($data -> IsActive == 0)
        <a href="{{route('ActivateUser', ['data' => $data -> id])}}" class="btn btn-outline-success btn-lg btn-rounded w-lg waves-effect waves-light approve m-3">
            ACTIVATE
        </a>
        <a href="{{route('DeleteUser', ['data' => $data -> id])}}" class="btn btn-outline-danger btn-lg waves-effect waves-light delete-confirm">
            <i class=" bx bx-trash-alt font-size-16 align-middle"></i>
        </a>
        @endif
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/pages/sweetalert.min.js') }}"></script>

<script>
    $('.reinitiate').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?'
            , text: 'This record and it`s details will be re initiated!'
            , icon: 'warning'
            , buttons: ["Cancel", "Yes!"]
        , }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?'
            , text: 'This record and it`s details will be permanantly deleted!'
            , icon: 'warning'
            , buttons: ["Cancel", "Yes!"]
        , }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $('.approve').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?'
            , text: 'This record and it`s details will be approved!'
            , icon: 'warning'
            , buttons: ["Cancel", "Yes!"]
        , }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $('.reject').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?'
            , text: 'This record and it`s details will be rejected!'
            , icon: 'warning'
            , buttons: ["Cancel", "Yes!"]
        , }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    function Random() {
        const result = Math.random().toString(36).substring(2,7);
        document.getElementById('QCC').value = result;
    };
</script>

@endsection
