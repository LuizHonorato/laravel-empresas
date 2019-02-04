@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                <a class="nav-link" id="v-pills-companie-tab" data-toggle="pill" href="#v-pills-companie" role="tab" aria-controls="v-pills-home" aria-selected="true">Empresas</a>
                <a class="nav-link" id="v-pills-employee-tab" data-toggle="pill" href="#v-pills-employee" role="tab" aria-controls="v-pills-profile" aria-selected="false">Funcionários</a>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">@include('dashboard.dashboard')</div>
                <div class="tab-pane fade show" id="v-pills-companie" role="tabpanel" aria-labelledby="v-pills-companie-tab">@include('companies.index')</div>
                <div class="tab-pane fade" id="v-pills-employee" role="tabpanel" aria-labelledby="v-pills-employee-tab">@include('employee.create')</div>
            </div>
        </div>
    </div>
</div>
@endsection
