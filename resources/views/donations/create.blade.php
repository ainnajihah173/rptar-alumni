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
                <h6 class="m-0 font-weight-bold text-dark">Create Donation</h6>
            </div>

            <div class="card-body">
                <p class="text-muted font-14">
                    Please fill in the form.
                </p>
                <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Donation Title</label>
                                <input type="text" id="example-readonly" class="form-control" name="title" required
                                    placeholder="Donation Title">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Target Amount</label>
                                <input type="number" id="example-readonly" class="form-control" name="target_amount"
                                    required placeholder="0" min="1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Start Date</label>
                                <input type="date" id="example-readonly" class="form-control" name="start_date" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">End Date (Optional)</label>
                                <input type="date" id="example-readonly" class="form-control" name="end_date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="file">Upload File (Optional)</label>
                                <input type="file" name="image_path" id="image" class="custom-file">
                            </div>
                        </div>

                    </div>
                    <!-- end row-->
                    <div class="text-center mt-2">
                        <button type="button" onclick="history.back()" class="btn btn-light mr-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
  
@endsection
