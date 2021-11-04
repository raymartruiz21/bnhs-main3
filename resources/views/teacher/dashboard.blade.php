@extends('../layout/app')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card mb-3"
                style="background-image: url('assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg');">
                    <div class="card-body">
                        <h2>Welcome, {{ Auth::user()->fullname }}!</h2>
                        <p class="lead">You almost arrived, complete the information about your account.</p>
                        <div class="mt-4">
                            <a href="{{ route('teacher.profile') }}" class="btn btn-outline-white btn-lg btn-icon icon-left">
                                <i class="far fa-user text-info"></i>&nbsp;&nbsp; Setup Profile</a>
                        </div>
                    </div>
                </div>
                @if ( Auth::user()->chairman()->where('school_year_id', session('sessionAY')->id)->exists())
                    <div class="row dashMonitor"></div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        @foreach ($sectionAvail as $item)
                        <div class="col-lg-4 col-md-4">
                            <div class="card ">
                                <div class="card-body">
                                    @if ($sectionAvail->count()!=0)
                                    <h4 class="lead"><b>My Load Section</b></h4>
                                    @endif
                                    <hr>
                                    <h4 class="lead ">{{ $item->section_name }}</h4>
                                    <button class="btn btn-info text-white btn-block"><i class="fas fa-eye"></i> View Student</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- col-lg-6 -->
                </div>
            </div>
        </div>
    </div><!--section-body-->
</section>
@endsection
@section('moreJs')
@if (Auth::user()->chairman()->where('school_year_id', session('sessionAY')->id)->exists())
    @if (Auth::user()->chairman->grade_level>10)
        <script src="{{ asset('teacher/chairman/dashMonitor.shs.js') }}"></script>
    @else
        <script src="{{ asset('teacher/chairman/dashMonitor.js') }}"></script>
    @endif
@endif
@endsection