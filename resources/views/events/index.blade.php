@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mb-3">List of Events</h1>

    @if ($message = session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="text-black mb-0">{{ session()->get('success') }}</p>
        </div>

        <!-- Add the following JavaScript to auto-dismiss the alert after 3 seconds -->
        <script>
            setTimeout(function() {
                $('.alert').alert('close');
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>
    @elseif($message = session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="text-black mb-0">{{ session()->get('error') }}</p>
        </div>

        <!-- Add the following JavaScript to auto-dismiss the alert after 3 seconds -->
        <script>
            setTimeout(function() {
                $('.alert').alert('close');
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Manage Events Content</h6>
            @if (auth()->user()->role === 'staff')
                <a href="{{ route('events.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Create Events
                </a>
            @endif
        </div>
        <!-- Check if there is any news -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Event Name</th>
                            <th>Event Description</th>
                            <th>Event Details</th> <!-- Date, Time, Location --->
                            <th>Organizer Details</th>
                            <th>Event Active</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $events)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $events->name }}</td>
                                <td>{{ $events->description }}</td>
                                <td><i class="fas fa-calendar-alt"> </i> : {{ $events->start_date }} @if ($events->end_date)
                                        to {{ $events->end_date }}
                                    @endif <br>
                                    <i class="fas fa-clock"> </i> : {{ date('H:i', strtotime($events->start_time)) }} -
                                    {{ date('H:i', strtotime($events->end_time)) }}<br>
                                    <i class="fas fa-map-marker-alt"> </i> : {{ $events->location }}
                                </td>
                                <td>
                                    Organized By : {{ $events->organizers->organizer_name }}<br>
                                    Email : {{ $events->organizers->organizer_email }}
                                </td>
                                <td>{{ $events->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    @if ($events->status === 'pending')
                                        <span class="badge bg-warning text-white">Pending</span>
                                    @elseif($events->status === 'approved')
                                        <span class="badge bg-success text-white">Approved</span>
                                    @else
                                        <span class="badge bg-danger text-white">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Approve Reject -->
                                    @if (auth()->user()->role === 'admin' && $events->status === 'pending')
                                        <a href="{{ route('events.approve', $events->id) }}">
                                            <i class="fas fa-check-circle text-success mr-2"></i></a>
                                        <a href="{{ route('events.reject', $events->id) }}">
                                            <i class="fas fa-times-circle text-danger mr-2"></i></a>
                                    @endif
                                    <!-- Show Page-->
                                    <a href="{{ route('events.show', $events->id) }}">
                                        <i class="fas fa-eye text-dark mr-2"></i></a>
                                    <!-- Edit Page-->
                                    @if (auth()->user()->role === 'staff' && in_array($events->status, ['pending', 'rejected']))
                                        <a href="{{ route('events.edit', $events->id) }}">
                                            <i class="fas fa-edit mr-2"></i></a>

                                        <!-- Delete Page -->
                                        <a href="#" class="action-icon-danger" data-toggle="modal"
                                            data-target="#delete-modal">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel"><i
                                                    class="fas fa-exclamation-triangle"></i> Delete Event</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body text-center">
                                            <p class="mb-0">Are you sure you want to delete this event?</p>
                                            <small class="text-muted">This action cannot be undone.</small>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('events.destroy', $events->id) }}"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
