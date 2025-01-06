@extends('layouts.staff-base')

@section('content')
    <!-- Page Heading -->
    <div class="mb-3">
        <a href="{{ route('inquiries.index') }}" class="text-decoration-none text-dark">
            <i class="fas fa-arrow-left"></i> Back to Inquiries
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Update Inquiries</h6>
        </div>

        <div class="card-body">
            <p class="text-muted font-14">
                Please ensure all fields are filled in.
            </p>
            <form action="{{ route('inquiries.update', $inquiries->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->

                <!-- Common Fields -->
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">Name</label>
                            <input type="text" id="example-readonly" class="form-control" name="name"
                                value="{{ $inquiries->user->profile->full_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">Contact Number</label>
                            <input type="text" id="example-readonly" class="form-control" name="email"
                                value="{{ $inquiries->user->profile->contact_number }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">Email Address</label>
                            <input type="text" id="example-readonly" class="form-control" name="email"
                                value="{{ $inquiries->user->email }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="status">Category<span class="text-danger">*</span></label>
                            @if (auth()->user()->role === 'user')
                                <select name="category" id="status" class="form-control" required>
                                    <option selected disabled>Please Select...</option>
                                    <option value="general" {{ $inquiries->category == 'general' ? 'selected' : '' }}>
                                        General Inquiries
                                    </option>
                                    <option value="complaint" {{ $inquiries->category == 'complaint' ? 'selected' : '' }}>
                                        Complaint</option>
                                    <option value="others" {{ $inquiries->category == 'others' ? 'selected' : '' }}>
                                        Others</option>
                                </select>
                            @else
                                <input type="text" id="status" class="form-control" name="category"
                                    value="{{ ucfirst($inquiries->category) }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            @if (auth()->user()->role === 'user')
                                <input type="text" id="title" class="form-control" name="title"
                                    value="{{ $inquiries->title }}" required>
                            @else
                                <input type="text" id="title" class="form-control" name="title"
                                    value="{{ $inquiries->title }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="file">Upload File (Optional)</label>
                            <div class="mt-2">
                                @if ($inquiries->image_path)
                                    <div class="">
                                        <p>Current Image: <a href="{{ Storage::url($inquiries->image_path) }}"
                                                target="_blank" class="text-primary">View Current File</a></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="description">Description<span class="text-danger">*</span></label>
                                <textarea id="description" class="form-control" name="description" required rows="4" readonly>{{ $inquiries->description }}</textarea>
                        </div>
                    </div>

                    <!-- Role-Specific Fields -->
                    @if (auth()->user()->role === 'admin')
                        <!-- Admin: Assign to Staff -->
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="staff_id">Assign to Staff<span class="text-danger">*</span></label>
                                <select name="assign_id" id="staff_id" class="form-control" required>
                                    <option selected disabled>Please Select...</option>
                                    @foreach ($staff as $staff)
                                        <option value="{{ $staff->id }}">
                                            {{ $staff->profile->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @elseif(auth()->user()->role === 'staff')
                        <!-- Staff: Resolved Date and Solution -->
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="solution">Solution<span class="text-danger">*</span></label>
                                <textarea id="solution" class="form-control" name="solution" rows="4" required>{{ $inquiries->solution ?? old('solution') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="resolved_date">Resolved Date<span class="text-danger">*</span></label>
                                <input type="date" id="resolved_date" class="form-control" name="resolved_date"
                                    value="{{ $inquiries->resolved_date ?? old('resolved_date') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    @endif
                </div>

                <!-- Submit Buttons -->
                <div class="text-center mt-4">
                    <button type="button" onclick="history.back()" class="btn btn-light mr-3">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
