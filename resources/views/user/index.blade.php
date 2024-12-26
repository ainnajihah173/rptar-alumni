@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mb-3">List of Users</h1>

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

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel"><i class="fas fa-check-circle"></i> Success</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <p>{!! session('modal') !!}</p>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Manage Users</h6>
            <a href="" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#create-modal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Create Users
            </a>
        </div>
        <!-- Check if there is any news -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $users)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->role }}</td>
                                <td>
                                    <!-- Show Page-->
                                    @if($users->role === 'user')
                                    <a href="">
                                        <i class="fas fa-eye text-dark mr-2"></i></a>
                                    @endif
                                    <!-- Edit Page-->
                                    @if($users->role === 'staff' || $users->role === 'admin' )
                                    <a href="" data-toggle="modal" data-target="#edit-modal{{ $users->id }}">
                                        <i class="fas fa-edit mr-2"></i></a>
                                    @endif
                                    <!-- Delete Page -->
                                    <a href="#" class="action-icon-danger" data-toggle="modal"
                                        data-target="#delete-modal{{ $users->id }}">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Create User Modal -->
                            <div class="modal fade" id="create-modal" tabindex="-1" role="dialog"
                                aria-labelledby="createUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg rounded-lg">
                                        <!-- Close Button -->
                                        <button type="button" class="close position-absolute" data-dismiss="modal"
                                            aria-label="Close" style="top: 15px; right: 20px; font-size: 1.5rem;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <!-- Modal Header -->
                                        <div
                                            class="modal-header border-0 text-center pt-4 d-flex flex-column align-items-center">
                                            <h4 class="modal-title font-weight-bold" id="createUserModalLabel">Create New
                                                User</h4>
                                        </div>
                                        <!-- Modal Body -->
                                        <form method="POST" action="{{ route('user.store') }}">
                                            @csrf
                                            <div class="modal-body px-5 py-2">
                                                <div class="form-row">
                                                    <!-- User Name -->
                                                    <div class="form-group col-md-12">
                                                        <label for="userName" class="font-weight-bold">Name</label>
                                                        <input type="text" id="userName" class="form-control"
                                                            name="name" placeholder="John Smith" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <!-- Email -->
                                                    <div class="form-group col-md-12">
                                                        <label for="userEmail" class="font-weight-bold">Email</label>
                                                        <input type="email" id="userEmail" class="form-control"
                                                            name="email" placeholder="example@gmail.com" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <!-- Role -->
                                                    <div class="form-group col-md-12">
                                                        <label for="userRole" class="font-weight-bold">Role</label>
                                                        <select name="role" id="userRole" class="form-control" required>
                                                            <option selected disabled>Please Select...</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="staff">Staff</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <!-- Password -->
                                                    <div class="form-group col-md-12">
                                                        <label for="userPassword"
                                                            class="font-weight-bold">Password</label>
                                                        <input type="password" id="userPassword" class="form-control"
                                                            name="password" placeholder="Enter Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Footer -->
                                            <div class="modal-footer border-0 d-flex justify-content-center py-3">
                                                <button type="button" class="btn btn-secondary px-4 mr-4"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary px-4">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit-modal{{ $users->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="createUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg rounded-lg">
                                        <!-- Close Button -->
                                        <button type="button" class="close position-absolute" data-dismiss="modal"
                                            aria-label="Close" style="top: 15px; right: 20px; font-size: 1.5rem;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <!-- Modal Header -->
                                        <div
                                            class="modal-header border-0 text-center pt-4 d-flex flex-column align-items-center">
                                            <h4 class="modal-title font-weight-bold" id="createUserModalLabel">Update New
                                                User</h4>
                                        </div>
                                        <!-- Modal Body -->
                                        <form method="POST" action="{{ route('user.update', $users->id) }}">
                                            @csrf
                                            <div class="modal-body px-5 py-2">
                                                <div class="form-row">
                                                    <!-- User Name -->
                                                    <div class="form-group col-md-12">
                                                        <label for="userName" class="font-weight-bold">Name</label>
                                                        <input type="text" id="userName" class="form-control"
                                                            name="name" placeholder="John Smith" required
                                                            value="{{ $users->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <!-- Email -->
                                                    <div class="form-group col-md-12">
                                                        <label for="userEmail" class="font-weight-bold">Email</label>
                                                        <input type="email" id="userEmail" class="form-control"
                                                            name="email" placeholder="example@gmail.com" required
                                                            value="{{ $users->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <!-- Role -->
                                                    <div class="form-group col-md-12">
                                                        <label for="userRole" class="font-weight-bold">Role</label>
                                                        <select name="role" id="userRole" class="form-control"
                                                            required>
                                                            <option disabled>Please Select...</option>
                                                            <option value="admin"
                                                                {{ $users->role == 'admin' ? 'selected' : '' }}>Admin
                                                            </option>
                                                            <option value="staff"
                                                                {{ $users->role == 'staff' ? 'selected' : '' }}>Staff
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Modal Footer -->
                                            <div class="modal-footer border-0 d-flex justify-content-center py-3">
                                                <button type="button" class="btn btn-secondary px-4 mr-4"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary px-4">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete-modal{{ $users->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content border-0 rounded-lg shadow">
                                        <!-- Close Button -->
                                        <button type="button" class="close position-absolute text-dark"
                                            data-dismiss="modal" aria-label="Close"
                                            style="top: 15px; right: 15px; font-size: 1.5rem;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <!-- Centered Warning Icon -->
                                        <div class="text-center pt-4">
                                            <div class="rounded-circle bg-danger d-inline-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px;">
                                                <i class="fas fa-exclamation-triangle text-white"
                                                    style="font-size: 30px;"></i>
                                            </div>
                                        </div>
                                        <!-- Modal Body -->
                                        <div class="modal-body text-center pt-3 pb-0">
                                            <h5 class="font-weight-bold mb-3">Delete User</h5>
                                            <p class="text-muted mb-3">This action cannot be undone. Are you sure you?</p>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer justify-content-center py-3 border-0">
                                            <button type="button" class="btn btn-secondary px-4"
                                                data-dismiss="modal">No, Keep it</button>
                                            <form method="POST" action="{{ route('user.destroy', $users->id) }}"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-4">Yes, Delete!</button>
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
