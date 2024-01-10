@extends(Cookie::get('Layout') == 'LayoutSidebar' ? 'Layouts.master' : 'Layouts.master-layouts')
@section('title') Expenses @endsection
@section('css')
<link href="{{ URL::asset('/assets/css/mystyle/tabstyle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/filepond/css/filepond.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/filepond/css/plugins/filepond-plugin-image-preview.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row mt-4">
    <div class="col-md-12 col-sm-12">
        <a href="{{route('root')}}" class="btn btn-outline-info btn-lg waves-effect mb-3 btn-label waves-light"><i class="bx bx-left-arrow  font-size-16 label-icon"></i>Back</a>
        <a data-bs-toggle="collapse" data-bs-target="#addUser" aria-expanded="false" aria-controls="addUser" class="btn btn-outline-success btn-lg waves-effect m-1 waves-light float-end btn-rounded"><i class="mdi mdi-plus me-1"></i>ADD EXPENSE</a>
    </div>
</div>
<div class="row ">
    <div class="col-md-12">
        <div class="collapse hide" id="addUser">
            <div class="card shadow-none card-body text-muted mb-0 mb-4" style="border: 2px dashed #50a5f1;">
                <form class="needs-validation" action="{{route('CreateExpense')}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-2 col-sm-3 ">
                                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active bg-info" id="v-pills-personal-tab" data-bs-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">
                                        <i class="mdi mdi-account-settings-outline  d-block check-nav-icon mt-4 mb-2"></i>
                                        <p class="fw-bold mb-4 text-uppercase">Add Expense</p>
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
                                                                    <label for="Item" class="form-label">Item <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <div class="input-group input-group-merge">
                                                                        <select class="form-select  form-select-lg @error('Item') is-invalid @enderror" value="{{ old('Item') }}" id="Item_ID" name="Item" required>
                                                                            <option value="">Select Your Item</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{ $item -> Name}}">{{ $item -> Name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <a href="#" data-bs-toggle="collapse" data-bs-target="#addLookUp" aria-expanded="false" aria-controls="addLookUp">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">                                                                              
                                                                                <i class="mdi mdi-plus me-1 font-size-16"></i>                                                                               
                                                                            </div>
                                                                        </div>
                                                                        </a>
                                                                    </div>
                                                                    @error('Item')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Amount" class="form-label ">Amount <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input type="number" class="form-control form-control-lg @error('Amount') is-invalid @enderror" value="{{ old('Amount') }}" id="Amount" name="Amount" required>
                                                                    @error('Amount')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Date" class="form-label">Date <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <div class="input-group " id="example-date-input">
                                                                        <input class="form-control form-select-lg @error('Date') is-invalid @enderror" value="{{ old('Date') }}" type="date" id="example-date-input" name="Date" id="Date" required>
                                                                        @error('Date')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Currency" class="form-label">Currency <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <select class="form-select  form-select-lg @error('Currency') is-invalid @enderror" value="{{ old('Currency') }}" id="Currency" name="Currency" required>
                                                                        <option value="">Select Your Currency</option>
                                                                        @foreach($currencies as $currency)
                                                                        <option value="{{ $currency -> Name}}">{{ $currency -> Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('Currency')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Type" class="form-label">Home <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <select class="form-select  form-select-lg @error('Type') is-invalid @enderror" value="{{ old('Type') }}" id="Type" name="Type" required>
                                                                        <option value="">Select Your Home</option>
                                                                        @foreach($homes as $home)
                                                                        <option value="{{ $home -> Name}}">{{ $home -> Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('Type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Bill" class="form-label">Bill</label>
                                                                    <input type="file" class="my-pond @error('Bill') is-invalid @enderror" value="{{ old('Bill') }}" name="Bill" id="Bill" />
                                                                    @error('Bill')
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
                                            <button class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end btn-rounded w-lg" type="submit">Submit </button>
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
        <div class="collapse hide" id="addLookUp">
            <div class="card shadow-none card-body text-muted mb-0 mb-4" style="border: 2px dashed #50a5f1;">
                <form class="needs-validation" action="{{route('CreateLookUp')}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="checkout-tabs">
                        <div class="row">
                            <div class="col-xl-2 col-sm-3 ">
                                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active bg-info" id="v-pills-personal-tab" data-bs-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="true">
                                        <i class="mdi mdi-format-line-weight  d-block check-nav-icon mt-4 mb-2"></i>
                                        <p class="fw-bold mb-4 text-uppercase">Look Up</p>
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
                                                                    <label for="Parent_Name" class="form-label">Main Catagory <i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <div class="input-group">
                                                                        <select class="form-select  form-select-lg @error('Parent_Name') is-invalid @enderror" value="{{ old('Parent_Name') }}" required id="Parent_Name" name="Parent_Name">
                                                                            <option value="None">Main</option>
                                                                            @foreach($mainLookUps as $mainLookUp)
                                                                            <option value="{{ $mainLookUp -> Name}}">{{ $mainLookUp -> Name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('Parent_Name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 position-relative">
                                                                    <label for="Name" class="form-label ">Name<i class="mdi mdi-asterisk text-danger"></i></label>
                                                                    <input type="text" class="form-control form-control-lg @error('Name') is-invalid @enderror" value="{{ old('Name') }}" id="Name" name="Name" required>
                                                                    @error('Name')
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
                                            <button class="btn btn-outline-danger btn-lg waves-effect  waves-light float-end btn-rounded w-lg" type="submit">Submit </button>
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
    @if(Auth::user()->IsExpensive == 1)
    <div class="row">
        <div class="col-md-2 mt-2">
            <h1 class="font-size-24 fw-medium text-dark text-muted">{{ $PageInfo }} Home Expenses</h1>
        </div>
        <div class="col-md-2 mt-3 col-xs-4">
            <div class="mb-3 position-relative ">
                <select class="form-select  form-select-lg @error('Type') is-invalid @enderror" onchange="window.location.href = this.value;">
                    <option>Select Home</option>
                    @foreach($homes as $home)
                    <option value="{{ route($home -> Name) }}" {{ $PageInfo == '$home -> Name' ? 'selected' : '' }}>{{ $home -> Name}}</option>
                    @endforeach
                </select>
                @error('Type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

    </div>


    @endif
    <div class="col-xl-12">
        <div class="row">
            @if(Auth::user()->IsExpensive == 1)
            <div class="col-md-4 mb-2">
                <a href="{{route('DetailsExpense', ['data' => $PageInfo])}}">
                    <div class="card-one mini-stats-wid border border-secondary">
                        <div class="card-body text-center">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h1 class="  display-5 text-danger">{{ $AllHomeExpenses }} <span class="text-success">&#1547;</span></h1>
                                    <p class="my-0 text-dark mt-2 font-size-24 ">All</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @if(Auth::user()->IsExpensive == 1)
            <div class="col-md-4 mb-2">
                <a href="{{route('DetailsExpense', ['data' => $PageInfo])}}">
                    <div class="card-one mini-stats-wid border border-secondary">
                        <div class="card-body text-center">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h1 class=" text-warning display-5 text-">{{ $ThisYearHomeExpenses }} <span class="text-success">&#1547;</span></h1>
                                    <p class="my-0  mt-2 font-size-24 text-dark ">This Year (Yet)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @if(Auth::user()->IsExpensive == 1)
            <div class="col-md-4 mb-2">
                <a href="{{route('DetailsExpense', ['data' => $PageInfo])}}">
                    <div class="card-one mini-stats-wid border border-secondary">
                        <div class="card-body text-center">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h1 class=" text-info display-5 text-"> {{ $ThisMonthHomeExpenses }} <span class="text-success">&#1547;</span></h1>
                                    <p class="my-0 text-dark mt-2 font-size-24">This Month (Yet)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- Form Validation -->
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
<!-- Filepond -->
<script src="{{ URL::asset('/assets/libs/filepond/js/filepond.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/filepond/js/plugins/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/filepond/js/plugins/filepond-plugin-file-validate-type.js') }}"></script>
<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);



    // Get a reference to the file input element
    const inputBill = document.querySelector('input[name="Bill"]');
    // Create a FilePond instance
    const Bill = FilePond.create(inputBill, {
        labelIdle: 'Click to upload Bill <span class="bx bx-upload"></span >',
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        allowFileTypeValidation: true,
        server: {
            url: '{{ route('BillUploadExpense')}}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
        instantUpload: true,
    });
</script>
@endsection