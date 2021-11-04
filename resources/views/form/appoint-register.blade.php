<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>eBNHS . Appointment</title>

    <link rel="shortcut icon" href="{{ asset('image/logo/bn.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simple-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <style>
        .custom {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p style="font-size: 20px;line-height: 2.3;" class="mt-5">Dear user,</p>
                        <p style="font-size: 20px;line-height: 2.3;" class="mt-5">All of the information you provided will be secure and
                            restricted only to Balaogan National High School. We assure your information provided is protected. This form is for school-related businesses appointment purposes only.</p>
                        <p style="font-size: 20px;line-height: 2.3;" class="mt-4">This online services of the school aim to avoid the
                            crowd at the school premises observing the COVID-19 health protocols.</p>
                        <p style="font-size: 20px;line-height: 2.3;" class="mt-4">Thank you</p>
                        <br><br>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">
                            <h1>Appointment Form</h1>
                            <p class="text-medium-emphasis">Create your Appointment</p>
                            <form action="{{ route('appoint.save') }}" method="POST" autocomplete="off">@csrf
                                <div class="form-group mb-3">
                                    <label class="mb-2">Full name</label>
                                    <input type="text" class="form-control" name="fullname" required autofocus>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-6">
                                        <label class="mb-2">Contact no.</label>
                                        <input type="text" class="form-control"
                                            name="contact_no" required onkeypress="return numberOnly(event)"
                                            maxlength="11">
                                    </div>
                                    <div class="form-group mb-3 col-md-6">
                                        <label class="mb-2">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Select Date</label>
                                    <input class="form-control datepicker" name="set_date" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Purpose</label>
                                    <textarea class="form-control" data-height="80" name="purpose"
                                        required></textarea>
                                </div>
                                <button class="btn btn-info custom">Submit</button>
                                <a href="{{ route('auth.login') }}" class="btn btn-warning custom">Log In</a>
                                <a href="/" class="btn btn-secondary custom">Back to Home</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- coreUI -->
    {{-- <script src="{{ asset('js/coreui/coreui.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/toast/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/appoint.js') }}"></script>
</body>

</html>