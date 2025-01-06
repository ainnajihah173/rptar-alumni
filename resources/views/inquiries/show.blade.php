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
            <h6 class="m-0 font-weight-bold text-dark">Show Inquiry</h6>
        </div>

        <div class="card-body">

            <div class="row justify-content-center align-items-center g-2">
                <!-- Name Field -->
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name"
                            value="{{ $inquiries->user->name }}" readonly>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" name="email"
                            value="{{ $inquiries->user->email }}" readonly>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="email">Contact Number</label>
                        <input type="text" id="email" class="form-control" name="email"
                            value="{{ $inquiries->user->profile->contact_number }}" readonly>
                    </div>
                </div>

                <!-- Category Field -->
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="name">Category</label>
                        @php
                            $displayCategory = 'Unknown';
                            if ($inquiries->category === 'general') {
                                $displayCategory = 'General Inquiries';
                            } elseif ($inquiries->category === 'complaint') {
                                $displayCategory = 'Complaint';
                            } elseif ($inquiries->category === 'others') {
                                $displayCategory = 'Others';
                            }
                        @endphp
                        <input type="text" id="name" class="form-control" name="category"
                            value="{{ $displayCategory }}" readonly>
                    </div>
                </div>

                <!-- Title Field -->
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="title">Issued Date</label>
                        <input type="text" id="title" class="form-control"
                            value="{{ $inquiries->created_at->format('d F Y') }}" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control" value="{{ $inquiries->title }}" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="title">Assign To</label>
                        <input type="text" id="title" class="form-control"
                            value="{{ $inquiries->assignedTo->profile->full_name ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="title">Inquiry Status</label>
                        <input type="text" id="title" class="form-control" value="{{ $inquiries->status }}" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="title">Resolved Date</label>
                        <input type="text" id="title" class="form-control"
                            value="{{ $inquiries->resolved_date ? \Carbon\Carbon::parse($inquiries->resolved_date)->format('d F Y') : 'N/A' }}"
                            readonly>
                    </div>
                </div>
                <!-- File Upload Field -->
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="file">Image</label>
                        @if ($inquiries->image_path)
                            <div class="mt-2">
                                <p><a href="{{ Storage::url($inquiries->image_path) }}" target="_blank"
                                        class="text-primary">View Current File</a></p>
                            </div>
                        @else
                            <p>No Image Provided</p>
                        @endif
                    </div>
                </div>
                <!-- Description Field -->
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description" readonly rows="5">{{ $inquiries->description }}</textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label for="description">Solution</label>
                        <textarea id="description" class="form-control" name="description" readonly rows="5">{{ $inquiries->solution ?? 'No Solution Yet' }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
