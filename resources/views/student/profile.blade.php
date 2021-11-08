@extends('../layout/app')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="far fa-user"></i>&nbsp;&nbsp;My Profile</p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><b>LRN</b></span>
                                <input type="text" class="form-control" placeholder="Username" value="{{ auth()->user()->roll_no }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                <span class="input-group-text" id="basic-addon1"><b>Status</b></span>
                                <input type="text" class="form-control text-success" placeholder="Username" value="Active" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                        </div>  
                        <div class="card-body">
                            <form id="studentForm">@csrf
                                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <div class="row">
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">First name</label>
                                            <input type="text" class="form-control" name="student_firstname"
                                                value="{{ auth()->user()->student_firstname }}" readonly  >
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Middle name</label>
                                            <input type="text" class="form-control" name="student_middlename"
                                                value="{{ auth()->user()->student_middlename }}" readonly >
                                        </div>
                                        <div class=" form-group col-lg-4 mb-3">
                                            <label class="mb-2">Last name</label>
                                            <input type="text" class="form-control" name="student_lastname"
                                                value="{{ auth()->user()->student_lastname }}" readonly  >
                                        </div>
                                    </div>
        
        
                                    <div class="row">
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Date of Birth</label>
                                            <input type="date" class="form-control" placeholder="DD/MM/YYYY"
                                                name="date_of_birth" value="{{ auth()->user()->date_of_birth }}" readonly >
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Gender</label>
                                            <input type="text" class="form-control" name="gender"
                                                value="{{ auth()->user()->gender }}" readonly >
                                        </div>
        
        
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="student_contact"
                                                onkeypress="return numberOnly(event)"
                                                value="{{ auth()->user()->student_contact }}" readonly>
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="form-group col-lg-3 mb-3">
                                            <label class="mb-2">Region</label>
                                            <input type="text" class="form-control" name="region"
                                                value="{{ auth()->user()->region }}" readonly  >
                                        </div>
                                        <div class="form-group col-lg-3 mb-3">
                                            <label class="mb-2">Province</label>
                                            <input type="text" class="form-control" name="province"
                                                value="{{ auth()->user()->province }}" readonly >
                                        </div>
                                        <div class=" form-group col-lg-3 mb-3">
                                            <label class="mb-2">City</label>
                                            <input type="text" class="form-control" name="city"
                                                value="{{ auth()->user()->city }}" readonly  >
                                        </div>
                                        <div class=" form-group col-lg-3 mb-3">
                                            <label class="mb-2">Barangay</label>
                                            <input type="text" class="form-control" name="barangay"
                                                value="{{ auth()->user()->barangay }}" readonly  >
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="form-group col-lg-8 mb-3">
                                            <label class="mb-2">Mother's name</label>
                                            <input type="text" class="form-control" name="mother_name"
                                                value="{{ auth()->user()->mother_name }}" readonly>
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="mother_contact_no"
                                                value="{{ auth()->user()->mother_contact_no }}"
                                                onkeypress="return numberOnly(event)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8 mb-3">
                                            <label class="mb-2">Father's name</label>
                                            <input type="text" class="form-control" name="father_name"
                                                value="{{ auth()->user()->father_name }}" readonly>
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="father_contact_no"
                                                value="{{ auth()->user()->father_contact_no }}"
                                                onkeypress="return numberOnly(event)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8 mb-3">
                                            <label class="mb-2">Guardian's name</label>
                                            <input type="text" class="form-control" name="guardian_name"
                                                value="{{ auth()->user()->guardian_name }}" readonly>
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="guardian_contact_no"
                                                value="{{ auth()->user()->guardian_contact_no }}"
                                                onkeypress="return numberOnly(event)">
                                        </div>
                                    </div>
                                    {{-- <button type="submit" class="btn btn-round btn-primary float-right btnSave mb-4">
                                        Save
                                    </button> --}}
                            </form>
                        </div><!-- profile-witdget-descipriton -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            Manage Account
                        </div>
                        @if (!empty(auth()->user()->profile_image))
                            <img alt="Profile pictur of {{ auth()->user()->student_firstname }}" src="{{ asset('image/profile/'.auth()->user()->profile_image) }}" class="img- card-img-top">
                            @else
                            <img alt="image" src="{{ asset('image/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                            @endif
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

                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>

                    {{-- upload picture --}}

                    <div class="card mb-3">
                        <div class="card-header">
                            Upload Picture
                        </div>
                        <div class="card-body">
                            <small>* make sure 1x1 picture</small>
                            <form id="uploadImage">@csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" >
                                    {{-- <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label> --}}
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-info btnImageSave text-white">Upload</button>
                                    {{-- <span class="input-group-text" id="inputGroupFileAddon02">Upload</span> --}}
                                    </div>
                                </div>
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
<script src="{{ asset('js/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection