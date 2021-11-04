@extends('../layout/app')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Manage Profile</p>
            </div>
            
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTable">
                                        <tr>
                                            <td colspan="4" class="text-center">No available data</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" id="userForm">@csrf
                                <input type="hidden" name="id">
                                <div class="form-group mb-3">
                                    <label class="mb-2">Fullname</label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Username</label>
                                    <input type="text" name="username" required class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Password</label>
                                    <input type="password" name="password" required class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Confirm Password</label>
                                    <input type="password" name="confirmPassword" required class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btnSaveUser">Submit</button>
                                <button type="button" class="btn btn-warning cancelUser">Cancel</button>
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
<script src="{{ asset('administrator/management/user.js') }}"></script>
@endsection