@extends('../layout/app')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="far fa-address-card"></i>&nbsp;&nbsp;My Profile</p>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-info">
                        <form id="studentForm">@csrf
                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="mb-2">Employee ID</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ auth()->user()->roll_no }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="mb-2">First name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ auth()->user()->teacher_firstname }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="mb-2">Middle name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ auth()->user()->teacher_middlename }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="mb-2">Last name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ auth()->user()->teacher_lastname }}">
                                </div>
                                <button type="submit" class="btn btn-primary" disabled>Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-info">
                        <div class="card-header">
                            Account
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Username</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->username }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Confirm Password</label>
                                    <input type="password" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block" disabled>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('moreJs')
<script src="{{ asset('student/profile.js') }}"></script>
@endsection