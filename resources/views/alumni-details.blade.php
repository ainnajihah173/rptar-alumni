@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <div class="mb-4">
        <a href="{{ route('staff.index') }}" class="text-decoration-none text-dark">
            <i class="fas fa-arrow-left"></i> Back to Alumni Profile List
        </a>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="container-fluid mt-2">
            <div class="row align-items-stretch">
                <!-- Profile Card -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm" style="background: linear-gradient(135deg, #d4fc79, #96e6a1);">
                        <div class="card-body mt-4">
                            <img src="{{ asset('assets/images/default-avatar.png') }}"
                                class="rounded-circle img-thumbnail shadow" alt="Profile Image"
                                style="width: 150px; height: 150px;">
                            <h4 class="mt-3 text-primary">Ahmad Firdaus</h4>
                            <p class="text-muted font-italic">Alumni of RPTAR</p>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="https://www.linkedin.com/in/ahmadfirdaus"
                                    class="btn btn-secondary btn-sm mx-1" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://www.facebook.com/ahmadfirdaus" class="btn btn-primary btn-sm mx-1"
                                    target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/ahmadfirdaus" class="btn btn-danger btn-sm mx-1"
                                    target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-muted">
                            <small>"Strive for excellence, live with purpose."</small>
                        </div>
                    </div>
                </div>

                <!-- Alumni Details -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm text-dark" style="background: linear-gradient(135deg, #d4fc79, #96e6a1);">
                        <div class="card-body">
                            <h4 class="text-primary mb-4"><i class="fas fa-info-circle"></i> Alumni Profile Details</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <p><strong>Full Name:</strong> Ahmad Firdaus</p>
                                    <p><strong>Email:</strong> ahmad.firdaus@example.com</p>
                                    <p><strong>Phone:</strong> +60 12-345 6789</p>
                                    <p><strong>Graduation Year:</strong> 2019</p>
                                    <p><strong>Job:</strong> Software Engineering</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p><strong>DOB:</strong> 13 September 1995</p>
                                    <p><strong>Company:</strong> TechSolutions MY</p>
                                    <p><strong>Gender:</strong> Male</p>
                                    <p><strong>Hometown:</strong> Johor Bahru, Johor</p>
                                    <p><strong>Country:</strong> Malaysia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
