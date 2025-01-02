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
            <h6 class="m-0 font-weight-bold text-dark">Create Inquiries</h6>
        </div>

        <div class="card-body">
            <p class="text-muted font-14">
                Please ensure all fields are filled in
            </p>
            <form action="{{ route('inquiries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">Name</label>
                            <input type="text" id="example-readonly" class="form-control" name="name" value="{{ $users->name}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">Email</label>
                            <input type="text" id="example-readonly" class="form-control" name="email" value="{{ $users->email }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="status">Category<span class="text-danger">*</span></label>
                            <select name="category" id="status" class="form-control" required>
                                <option selected disabled>Please Select...</option>
                                <option value="general">General</option>
                                <option value="complaint">Complaint</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div> 
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" id="title" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="description">Description<span class="text-danger">*</span></label>
                            <textarea id="description" class="form-control" name="description" required rows="5"></textarea>
                        </div>
                    </div>      
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="file">Upload File (Optional)</label>
                            <input type="file" id="file" class="custom-file" name="image_path">
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
