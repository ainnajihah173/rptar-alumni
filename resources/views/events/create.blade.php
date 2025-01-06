@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <div class="mb-3">
        <a href="{{ route('events.index') }}" class="text-decoration-none text-dark">
            <i class="fas fa-arrow-left"></i> Back to Events List
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Create Events</h6>
        </div>

        <div class="card-body">
            <!-- Progress Bar -->
            <div class="progress mb-4">
                <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <!-- Step Indicators -->
            <div class="row text-center mb-4">
                <div class="col step">
                    <i class="fas fa-calendar-alt step-icon" id="step-1-icon"></i>
                    <p>Event Details</p>
                </div>
                <div class="col step">
                    <i class="fas fa-calendar-plus step-icon" id="step-2-icon"></i>
                    <p>Additional Details</p>
                </div>
                <div class="col step">
                    <i class="fas fa-user step-icon" id="step-3-icon"></i>
                    <p>Organizer Details</p>
                </div>
            </div>

            <!-- Multi-Step Form -->
            <form id="multi-step-form" method="POST" enctype="multipart/form-data" action="{{ route('events.store') }}">
                @csrf
                <!-- Step 1 -->
                <div id="step-1" class="step-content">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Name<span class="text-danger">*</span></label>
                                <input type="text" id="example-readonly" class="form-control" name="name" required
                                    placeholder="Event Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Created By</label>
                                <input type="text" id="example-readonly" class="form-control" name="user_id" readonly
                                    placeholder="Staff Name" value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="3" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Location<span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="3" name="location" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Start Date<span class="text-danger">*</span></label>
                                <input type="date" id="example-readonly" class="form-control" name="start_date" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event End Date<span class="text-danger">*</span></label>
                                <input type="date" id="example-readonly" class="form-control" name="end_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>

                <!-- Step 2: Additional Details -->
                <div id="step-2" class="step-content d-none">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Start Time<span class="text-danger">*</span></label>
                                <input type="time" id="example-readonly" class="form-control" name="start_time" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event End Time<span class="text-danger">*</span></label>
                                <input type="time" id="example-readonly" class="form-control" name="end_time"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Image<span class="text-danger">*</span></label>
                                <input type="file" id="example-readonly" class="custom-file" name="image_path"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="example-readonly">Event Capacity<span class="text-danger">*</span></label>
                                <input type="number" id="example-readonly" class="form-control" name="capacity"
                                    required placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="button" class="btn btn-secondary prev-btn mr-3">Back</button>
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>
                </div>

                <!-- Step 3: Organizer Details -->
                <div id="step-3" class="step-content d-none">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-lg-6">
                            <!-- Organizer Name Dropdown -->
                            <div class="form-group mb-3">
                                <label for="organizer" class="form-label">Organizer Name</label>
                                <select id="organizer-select" name="organizer_id" class="form-control" required>
                                    <option value="" disabled selected>Select Organizer</option>
                                    @foreach ($organizers as $organizer)
                                        <option value="{{ $organizer->id }}"
                                            data-contact="{{ $organizer->organizer_contact ?? '' }}"
                                            data-email="{{ $organizer->organizer_email ?? '' }}">
                                            {{ $organizer->organizer_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="organizer-contact">Contact Number<span class="text-danger">*</span></label>
                                <input type="text" id="organizer-contact" class="form-control"
                                    name="organizer_contact" required placeholder="Contact Number" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="organizer-email">Email<span class="text-danger">*</span></label>
                                <input type="email" id="organizer-email" class="form-control" name="organizer_email"
                                    required placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="button" class="btn btn-secondary prev-btn mr-3">Back</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript for Organizer Dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const organizerSelect = document.getElementById('organizer-select');
            const organizerContact = document.getElementById('organizer-contact');
            const organizerEmail = document.getElementById('organizer-email');

            if (organizerSelect) {
                organizerSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    if (selectedOption.value) {
                        organizerContact.value = selectedOption.getAttribute('data-contact') || '';
                        organizerEmail.value = selectedOption.getAttribute('data-email') || '';
                    } else {
                        organizerContact.value = '';
                        organizerEmail.value = '';
                    }
                });
            }
        });
    </script>
@endsection
