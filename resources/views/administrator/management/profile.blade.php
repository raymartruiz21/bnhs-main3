@extends('../layout/app')
@section('content')

<!-- Modal -->
<div class="modal fade" id="endModalOnlineENrollment" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="mt-3 showText"></p>
            <button type="button" class="btn btn-warning btn-sm pl-3 pr-3 btnYes">Yes</button>&nbsp;&nbsp;
            <button type="button" class="btn btn-secondary btn-sm btnClose">Close</button>
        </div>
      </div>
    </div>
</div>

<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="far fa-building"></i>&nbsp;&nbsp;School Info</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <div class="card">
                            <div class="card-header">
                                School Profile
                            </div>
                            <div class="card-body m-3">
                                <form enctype="multipart/form-data" id="schooProfileForm">@csrf
                                    <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="inputSchoolName" class="mb-2">School Name</label>
                                                <input type="text" class="form-control" name="school_name"
                                                    value="{{ $data->school_name ?? '' }}" id="inputSchoolName" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="inputSchoolAddress" class="mb-2">School Address</label>
                                                <input type="text" class="form-control" name="school_address"
                                                    value="{{ $data->school_address ?? '' }}" id="inputSchoolAddress" required>
                                            </div>
                                        </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="inputSchoolIdNo" class="mb-2">School Division</label>
                                                    <input type="text" class="form-control" name="school_division" value="{{ $data->school_division ?? '' }}" id="inputSchoolIdNo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="inputSchoolIdNo" class="mb-2">School Region</label>
                                                    <input type="text" class="form-control" name="school_region" value="{{ $data->school_region ?? '' }}" id="inputSchoolIdNo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="inputSchoolIdNo" class="mb-2">School ID No.</label>
                                                    <input type="number" class="form-control" name="school_id_no" value="{{ $data->school_id_no ?? '' }}" id="inputSchoolIdNo" required>
                                                </div>
                                            </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="btnSaveSP">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="col-md-4">
                        <!-- <div class="row"> -->
                            @if (isset($data))
                            {{empty($data->school_enrollment_url)}}
                            <!-- <div class="col-lg-4"> -->
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <form id="enrollStatusForm">@csrf
                                            <div class="row">
                                                <div class="form-group col-lg-4 col-md-4 col-sm-12 mb-3">
                                                    <label for="selectEnrollmentStatus" class="my-2 text-primary">Enrollment Status</label>
                                                </div>
                                                <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-3">
                                                    <select name="statusEnrollment" id="selectEnrollmentStatus"
                                                        class="form-control" required>
                                                        <option {{ empty($data->school_enrollment_url)?'selected':'' }}
                                                            value="">
                                                        </option>
                                                        <option {{  ($data->school_enrollment_url==true)?'selected':'' }}
                                                            value="yes">
                                                            Ongoing
                                                        </option>
                                                        <option {{ ($data->school_enrollment_url==false)?'selected':'' }}
                                                            value="no">
                                                            Disabled
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <!-- </div> -->
                            @endif
                            {{-- <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('admin.backup.run') }}" class="btn btn-block btn-warning">BACK-UP
                                            DATABASE</a>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('moreJs')
<script src="{{ asset('js/uploadPreview/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('administrator/management/profile.js') }}"></script>
@endsection