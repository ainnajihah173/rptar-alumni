@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mb-3">Alumni Profile</h1>

    <div class="card shadow mb-4">
        <div class="container-fluid mt-4">
            <div class="row mt-3">
                <!-- Ahmad Firdaus -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm" style="background: linear-gradient(135deg, #d4fc79, #96e6a1);">
                        <div class="card-body mt-4">
                            <img src="{{ asset('assets/images/default-avatar.png') }}"
                                class="rounded-circle img-thumbnail shadow" alt="Profile Image"
                                style="width: 150px; height: 150px;">
                            <h4 class="mt-3 text-primary">Ahmad Firdaus</h4>
                            <p class="text-dark font-italic">Software Engineer</p>
                            <small class="text-dark">"Strive for excellence, live with purpose."</small>
                        </div>
                        <div class="card-footer bg-light text-muted">
                            <a href="#" class="btn btn-primary btn-sm mr-2">
                                <i class="fas fa-envelope"></i> Send Message
                            </a>
                            <a href="{{route('staff.show')}}" class="btn btn-outline-dark btn-sm">
                                <i class="fas fa-user"></i> View Profile
                            </a>
                        </div>
                    </div>
                </div>
            
                <!-- Siti Aisyah -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm" style="background: linear-gradient(135deg, #d4fc79, #96e6a1);">
                        <div class="card-body mt-4">
                            <img src="{{ asset('assets/images/default-avatar.png') }}"
                                class="rounded-circle img-thumbnail shadow" alt="Profile Image"
                                style="width: 150px; height: 150px;">
                            <h4 class="mt-3 text-primary">Siti Aisyah</h4>
                            <p class="text-dark font-italic">Marketing Specialist</p>
                            <small class="text-dark">"Think big, act bigger."</small>
                        </div>
                        <div class="card-footer bg-light text-muted">
                            <a href="#" class="btn btn-primary btn-sm mr-2">
                                <i class="fas fa-envelope"></i> Send Message
                            </a>
                            <a href="#" class="btn btn-outline-dark btn-sm">
                                <i class="fas fa-user"></i> View Profile
                            </a>
                        </div>
                    </div>
                </div>
            
                <!-- Muhammad Zafran -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm" style="background: linear-gradient(135deg, #d4fc79, #96e6a1);">
                        <div class="card-body mt-4">
                            <img src="{{ asset('assets/images/default-avatar.png') }}"
                                class="rounded-circle img-thumbnail shadow" alt="Profile Image"
                                style="width: 150px; height: 150px;">
                            <h4 class="mt-3 text-primary">Muhammad Zafran</h4>
                            <p class="text-dark font-italic">Data Analyst</p>
                            <small class="text-dark">"Turning data into insights."</small>
                        </div>
                        <div class="card-footer bg-light text-muted">
                            <a href="#" class="btn btn-primary btn-sm mr-2">
                                <i class="fas fa-envelope"></i> Send Message
                            </a>
                            <a href="#" class="btn btn-outline-dark btn-sm">
                                <i class="fas fa-user"></i> View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination Section -->
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    @endsection
