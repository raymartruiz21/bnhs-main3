<div class="card card-info mt-4 shadow">
    <div class="card-body">
        <form id="assignForm">@csrf
            <div class="form-group">
                <div class="select-group">
                    <div class="row justify-content-between">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <select class="form-select" name="subject_id" required>
                                    <option value="">Choose...</option>
                                    @foreach ($subjects as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->subject_code.' > '.$item->descriptive_title }}</option>
                                    @endforeach
                                </select>
                                <select class="form-select" name="teacher_id" required>
                                    <option value="">Choose...</option>
                                    @foreach ($teachers as $item)
                                    <option value="{{ $item->id }}">{{ $item->teacher_name }}</option>
                                    @endforeach
                                </select>
                                @if (empty($activeAY))
                                <p>No active academic year</p>
                                @else
                                <select class="form-select" name="term_assign">
                                    @if ($activeAY->first_term=="Yes")
                                    <option value="1st">1st Term</option>
                                    @endif
                                    @if ($activeAY->second_term=="Yes")
                                    <option value="2nd">2nd Term</option>
                                    @endif
                                </select>
                                @endif
                                <button class="btn btn-block btn-primary assignBtn " type="submit">Save</button>
                                <button class="btn btn-block btn-warning cancelNow" type="button">Cancel</button>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3">
                            <div class="input-group">
                                
                            </div>
                        </div> --}}
                    </div>



                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped" style="font-size: 11px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Subject Teacher</th>
                        <th width="13%">Action</th>
                    </tr>
                </thead>
                <tbody id="tableAssign">
                    <tr>
                        <td colspan="4" class="text-center">No available data</td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- </div> --}}
    </div>
</div>