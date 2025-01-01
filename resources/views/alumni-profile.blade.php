@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Alumni Profiles</h1>
    </div>

    <!-- Alumni Cards Section -->
    <div class="row">
        <!-- Ahmad Firdaus -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow h-100 text-center" style="background: linear-gradient(145deg, #7bb6cd, #f0fff0);">
                <div class="card-body">
                    <img src="{{ asset('assets/images/default-avatar.png') }}" alt="Profile Image" 
                        class="rounded-circle img-thumbnail shadow-sm mb-3" 
                        style="width: 100px; height: 100px;">
                    <h5 class="text-primary">Ahmad Firdaus</h5>
                    <p class="text-muted mb-1">Software Engineer</p>
                    <small class="d-block text-secondary mb-3">"Strive for excellence, live with purpose."</small>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="https://www.linkedin.com/in/ahmadfirdaus" target="_blank" class="btn btn-secondary btn-sm rounded-circle mr-1">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.facebook.com/ahmadfirdaus" target="_blank" class="btn btn-primary btn-sm rounded-circle mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/ahmadfirdaus" target="_blank" class="btn btn-danger btn-sm rounded-circle">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="card-footer border-0 bg-light">
                    <a href="#" class="btn btn-primary btn-sm w-45">
                        <i class="fas fa-envelope"></i> Message
                    </a>
                    <a href="{{ route('staff.show') }}" class="btn btn-outline-dark btn-sm w-45">
                        <i class="fas fa-user"></i> View Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Repeat for Siti Aisyah and Muhammad Zafran -->
        <!-- Example for Siti Aisyah -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow h-100 text-center" style="background: linear-gradient(145deg, #7bb6cd, #f0fff0);">
                <div class="card-body">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                    class="rounded-circle img-thumbnail shadow-sm mb-3" style="width: 100px; height: 100px;" />
                    <h5 class="text-primary">Siti Aisyah</h5>
                    <p class="text-muted mb-1">Marketing Specialist</p>
                    <small class="d-block text-secondary mb-3">"Think big, act bigger."</small>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="https://www.linkedin.com/in/sitiaisyah" target="_blank" class="btn btn-secondary btn-sm rounded-circle mr-1">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.facebook.com/sitiaisyah" target="_blank" class="btn btn-primary btn-sm rounded-circle mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/sitiaisyah" target="_blank" class="btn btn-danger btn-sm rounded-circle">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="card-footer border-0 bg-light">
                    <a href="#" class="btn btn-primary btn-sm w-45">
                        <i class="fas fa-envelope"></i> Message
                    </a>
                    <a href="#" class="btn btn-outline-dark btn-sm w-45">
                        <i class="fas fa-user"></i> View Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Example for Muhammad Zafran -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow h-100 text-center" style="background: linear-gradient(145deg, #7bb6cd, #f0fff0);">
                <div class="card-body">
                    <img src="{{ asset('assets/images/default-avatar.png') }}" alt="Profile Image" 
                        class="rounded-circle img-thumbnail shadow-sm mb-3" 
                        style="width: 100px; height: 100px;">
                    <h5 class="text-primary">Muhammad Zafran</h5>
                    <p class="text-muted mb-1">Data Analyst</p>
                    <small class="d-block text-secondary mb-3">"Turning data into insights."</small>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="https://www.linkedin.com/in/muhammadzafran" target="_blank" class="btn btn-secondary btn-sm rounded-circle mr-1">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://www.facebook.com/muhammadzafran" target="_blank" class="btn btn-primary btn-sm rounded-circle mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/muhammadzafran" target="_blank" class="btn btn-danger btn-sm rounded-circle">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="card-footer border-0 bg-light">
                    <a href="#" class="btn btn-primary btn-sm w-45">
                        <i class="fas fa-envelope"></i> Message
                    </a>
                    <a href="#" class="btn btn-outline-dark btn-sm w-45">
                        <i class="fas fa-user"></i> View Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination Section -->
    <nav aria-label="Page navigation">
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
@endsection
