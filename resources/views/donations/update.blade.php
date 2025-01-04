@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <div class="mb-3">
        <a href="{{ route('donations.index') }}" class="text-decoration-none text-dark">
            <i class="fas fa-arrow-left"></i> Back to Donations List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Make Donation</h6>
        </div>

        <div class="card-body">
            <!-- Campaign Preview Section -->
            <div class="campaign-preview mb-4 p-4 border rounded bg-light">
                <h5 class="font-weight-bold text-dark mb-3">Campaign Preview</h5>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $campaigns->image_path) }}" alt="Campaign Image"
                            class="img-fluid rounded shadow-sm">
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-dark">{{ $campaigns->title }}</h4>
                        <p class="text-muted">{{ $campaigns->description }}</p>
                        <div class="progress mb-3" style="height: 20px;">
                            @php
                                $progress = ($campaigns->current_amount / $campaigns->target_amount) * 100;
                            @endphp
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;"
                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                {{ number_format($progress, 0) }}%
                            </div>
                        </div>
                        <p class="mb-1">
                            <strong>Raised:</strong> RM {{ number_format($campaigns->current_amount, 2) }}
                        </p>
                        <p>
                            <strong>Target Amount:</strong> RM {{ number_format($campaigns->target_amount, 2) }}
                        </p>
                    </div>
                </div>
            </div>

            <p class="text-muted font-14 mb-4">
                Please fill in the form below to make your donation. Your support makes a difference!
            </p>

            <!-- Donation Form -->
            <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="campaign_id" value="{{ $campaigns->id }}">

                <div class="row justify-content-center align-items-center g-2">
                    <!-- Donation Amount -->
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Donor's Name</label>
                            <input type="text" class="form-control" name="full_name" readonly value="{{ $users->profile->full_name }}">
                        </div>
                    </div>
                    <!-- Donation Amount -->
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Donor's Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" readonly value="{{ $users->profile->contact_number }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Donor's Email</label>
                            <input type="text" class="form-control" name="email" readonly value="{{ $users->email }}">
                        </div>
                    </div>
                    <!-- Donation Amount -->
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Donation Amount (RM)</label>
                            <input type="number" id="amount" class="form-control" name="amount" required
                                placeholder="Enter amount" min="1">
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                    <!-- Is Anonymous -->
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="is_anonymous" class="form-label">Donate Anonymously</label>
                            <div class="form-check">
                                <input type="checkbox" id="is_anonymous" class="form-check-input" name="is_anonymous">
                                <label for="is_anonymous" class="form-check-label">Yes, donate anonymously</label>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <!-- Form Actions -->
                <div class="text-center mt-4">
                    <button type="button" onclick="history.back()" class="btn btn-light mr-3">Cancel</button>
                    <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .campaign-preview {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
        }

        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-light {
            border-radius: 8px;
            padding: 10px 20px;
        }
    </style>
@endsection
