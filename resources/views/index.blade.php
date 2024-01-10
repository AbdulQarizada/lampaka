@extends(Cookie::get('Layout') == 'LayoutSidebar' ? 'Layouts.master' : 'Layouts.master-layouts')
@section('title') Dashboard @endsection
@section('css')
<link href="{{ URL::asset('/assets/css/mystyle/tabstyle.css') }}" rel="stylesheet" type="text/css" />
<!-- tui charts Css -->
<link href="{{ URL::asset('/assets/libs/tui-chart/tui-chart.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@if(Cookie::get('Layout') == 'LayoutNoSidebar')
<div class="row">
    @if(Auth::user()->IsExpensive == 1)
    <h1 class="font-size-24 mt-4 mb-4 fw-medium text-dark text-muted">Qarizada Family</h1>
    @endif
    <div class="col-xl-12">
        <div class="row">
            @if(Auth::user()->IsExpensive == 1)
            <div class="col-md-2 mb-2">
                <a href="{{route('IndexExpenses')}}">
                    <div class="card-one  mini-stats-wid border border-secondary">
                        <div class="card-body text-center">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <i class="mdi mdi-account-child  display-5 "></i>
                                    <p class="my-0 text-dark mt-2 font-size-18">Expenses</p>
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
<div class="row">
    @if(Auth::user()->IsSuperAdmin == 1)
    <h1 class="font-size-24 mt-4 mb-4 fw-medium text-dark text-muted">System Management</h1>
    @endif
    <div class="col-xl-12">
        <div class="row">
            @if(Auth::user()->IsSuperAdmin == 1)
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
        </div>
    </div>
</div>
@endif
@if(Cookie::get('Layout') == 'LayoutSidebar')
@if(Auth::user()->IsQamarCareCard == 1)
<div class="row mb-4">
    <div class="col-xl-4 mb-4">
        <div class="card">
            <h5 class="card-header text-dark bg-secondary bg-soft"></h5>
            <div class="card-body">
                <div class="">
                    <div id="GenderChart" class="apex-charts" dir="ltr"></div>
                    <h5 class=" text-dark text-center">Gender</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 mb-4">
        <div class="card">
            <h5 class="card-header text-dark bg-secondary bg-soft"></h5>
            <div class="card-body">
                <div class="">
                    <div id="TribeChart" class="apex-charts" dir="ltr"></div>
                    <h5 class=" text-dark text-center">Tribes</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header text-dark bg-secondary bg-soft"></h5>
            <div class="card-body">
                <div id="AllInOne" class="apex-charts" dir="ltr"></div>
                <h5 class=" text-dark text-center">Care Cards</h5>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-xl-6">
        <div class="card">
            <h5 class="card-header text-dark bg-secondary bg-soft"></h5>
            <div class="card-body">
                <div class="">
                    <div id="FamilyStatusChart" class="apex-charts" dir="ltr"></div>
                    <h5 class=" text-dark text-center">Family Status</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <h5 class="card-header text-dark bg-secondary bg-soft"></h5>
            <div class="card-body">
                <div class="">
                    <div id="AfghanistanChart"></div>
                    <h5 class=" text-dark text-center">Provincial Care Cards</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-xl-12">
        <div class="card">
            <h5 class="card-header text-dark bg-secondary bg-soft"></h5>
            <div class="card-body">
                <div class="">
                    <div id="DataInsertionChart" class="apex-charts" dir="ltr"></div>
                    <h5 class=" text-dark text-center">Cards Insertion Timeline</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif
@endsection
@apexchartsScripts
@section('script')
<!-- Afghanistan Map -->
<script src="{{ URL::asset('/assets/libs/afghanistanmap/highmaps.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/afghanistanmap/exporting.js') }}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<!-- form advanced init -->
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
<!-- Reporting Charts for Care Card -->
<script>
  
   
</script>
@endsection
