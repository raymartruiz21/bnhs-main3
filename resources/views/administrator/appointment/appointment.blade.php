@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/fullcalendar/fullcalendar.min.css') }}">
@endsection
@section('content')
@include('administrator/appointment/partial/holidayForm')
@include('administrator/appointment/partial/viewAppointed')
<style>
    .full {
        color: red;
        border: 1px solid red;
        background: black;
    }
</style>
<div class="container-fluid">
    <div class="callout border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <div class="row justify-content-between" style="margin-bottom: -20px;">
            <div class="col-lg-5 col-md-8">
                <p style="font-size: 25px;"><i class="fas fa-file-signature text-dark"></i>&nbsp;&nbsp;Appointment List</p>

            </div>
            <div class="col-lg-2 col-md-2" style="text-align: right">
                {{-- <button class="btn btn-icon icon-left btn-info my-4 float-right text-white" id="btnModalHoliday"><i class="fas fa-plus-circle"></i> Add Holiday</button> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop" id="btnModalHoliday">
                    <i class="fas fa-plus-circle"></i> Add Holiday
                </button>
            </div>
        </div>
    </div>
</div>
<section class="body flex-grow-1 px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="fc-overflow">
                                    <div id="myEvent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableHoliday">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('administrator/appointment/appointment.js') }}"></script>
@endsection