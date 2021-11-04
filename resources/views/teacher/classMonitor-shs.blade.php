@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap.min.css') }}"> --}}
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-md-8">
                        <p style="font-size: 25px;"><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;My Class [ <span class="text-success">{{ Auth::user()->section->section_name }}</span> ]</p>
                    </div>
                    <div class="col-lg-2 col-md-2 my-4">
                        <div class="float-right ">
                            <select class="form-select my-1 mr-sm-2" name="term">
                                <option value="1st">1st Term</option>
                                <option value="2nd">2nd Term</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-body pb-1">
    
                    <div class="table-responsive">
                        <table class="table table-striped" id="myClassTable" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th>LRN</th>
                                    <th>Student name</th>
                                    <th>Gender</th>
                                    <th>Contact No.</th>
                                    <th>Status</th>
                                    <th width="8%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
{{-- <script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script> --}}
<script src="{{ asset('teacher/classMonitor.shs.js') }}"></script>
@endsection