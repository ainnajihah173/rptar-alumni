@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    @if (auth()->user()->role === 'staff' || auth()->user()->role === 'admin')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">List of Campaigns</h6>
                <a href="{{ route('donations.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Create Campaign
                </a>
            </div>
            <!-- Check if there are any campaigns -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Campaign Title</th>
                                <th>Target Amount</th>
                                <th>Current Amount</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campaigns as $campaign)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! Str::limit($campaign->title, 20) !!}</td>
                                    <td>RM {{ number_format($campaign->target_amount, 2) }}</td>
                                    <td>RM {{ number_format($campaign->current_amount, 2) }}</td>
                                    <td>{{ $campaign->users->profile->full_name }}</td>
                                    <td>
                                        @if ($campaign->status == 'active')
                                            <span class="badge bg-success text-white">Active</span>
                                        @elseif ($campaign->status == 'completed')
                                            <span class="badge bg-info text-white">Completed</span>
                                        @else
                                            <span class="badge bg-warning text-white">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- View Campaign-->
                                        <a href="">
                                            <i class="fas fa-eye text-dark mr-2"></i></a>
                                        <!-- Edit Campaign-->
                                        @if ($campaign->status !== 'completed' && $campaign->status !== 'active')
                                            <a href="">
                                                <i class="fas fa-edit mr-2"></i></a>

                                            <!-- Delete Campaign-->
                                            <a href="" class="action-icon-danger" data-toggle="modal"
                                                data-target="#bs-danger-modal-sm-{{ $campaign->id }}">
                                                <i class="fas fa-trash text-danger"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Delete modal -->
                                <div class="modal fade" id="bs-danger-modal-sm-{{ $campaign->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="font-14" id="mySmallModalLabel">Delete Campaign</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this campaign?</p>
                                            </div><!-- /.modal-body -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light btn-sm"
                                                    data-dismiss="modal">No</button>
                                                <form method="POST" action="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Yes,
                                                        delete</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <h3 class="text-center" style="color: #eb3a2a;">Donations</h3>
            <p class="text-center text-muted">Every contribution counts. Donate today.</p>

            <!-- Nav Tabs -->
            <ul class="nav nav-tabs mb-4" id="donationTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="donation-list-tab" data-bs-toggle="tab"
                        data-bs-target="#donation-list" type="button" role="tab" aria-controls="donation-list"
                        aria-selected="true">
                        Donation List
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="user-donations-tab" data-bs-toggle="tab" data-bs-target="#user-donations"
                        type="button" role="tab" aria-controls="user-donations" aria-selected="false">
                        My Donations
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="donationTabsContent">
                <!-- Donation List Tab -->
                <div class="tab-pane fade show active" id="donation-list" role="tabpanel"
                    aria-labelledby="donation-list-tab">
                    <div class="row gy-4">
                        @foreach ($campaigns as $donation)
                            <div class="col-md-6 col-lg-4">
                                <div class="card shadow-sm border-0 h-100">
                                    <img src="{{ $donation->image_path ? asset('storage/' . $donation->image_path) : asset('assets/images/default-event.jpg') }}"
                                        class="card-img-top" alt="{{ $donation->title }}"
                                        style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark">{{ $donation->title }}</h5>
                                        <p class="card-text text-muted">
                                            {{ Str::limit($donation->description, 100, '...') }}
                                        </p>
                                        <div class="progress mb-3" style="height: 20px;">
                                            @php
                                                $progress =
                                                    $donation->target_amount > 0
                                                        ? ($donation->current_amount / $donation->target_amount) * 100
                                                        : 0;
                                            @endphp
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ number_format($progress, 0) }}%
                                            </div>
                                        </div>
                                        <p class="mb-1">
                                            <strong>Raised:</strong> RM {{ number_format($donation->current_amount, 2) }}
                                        </p>
                                        <p>
                                            <strong>Goal:</strong> RM {{ number_format($donation->target_amount, 2) }}
                                        </p>
                                        <a href="{{ route('donations.edit', $donation->id) }}"
                                            class="btn btn-danger btn-block w-100">
                                            Make Donation
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination Section -->
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $campaigns->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $campaigns->previousPageUrl() }}" tabindex="-1"
                                    aria-disabled="true">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $campaigns->lastPage(); $i++)
                                <li class="page-item {{ $campaigns->currentPage() === $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $campaigns->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $campaigns->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $campaigns->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- User Donations Tab -->
                <div class="tab-pane fade" id="user-donations" role="tabpanel" aria-labelledby="user-donations-tab">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-dark">List of My Donation</h6>
                        </div>
                        <!-- Check if there are any campaigns -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Campaign Title</th>
                                            <th>Target Amount</th>
                                            <th>Current Amount</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($campaigns as $campaign)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{!! Str::limit($campaign->title, 20) !!}</td>
                                                <td>RM {{ number_format($campaign->target_amount, 2) }}</td>
                                                <td>RM {{ number_format($campaign->current_amount, 2) }}</td>
                                                <td>{{ $campaign->users->profile->full_name }}</td>
                                                <td>
                                                    @if ($campaign->status == 'active')
                                                        <span class="badge bg-success text-white">Active</span>
                                                    @elseif ($campaign->status == 'completed')
                                                        <span class="badge bg-info text-white">Completed</span>
                                                    @else
                                                        <span class="badge bg-warning text-white">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- View Campaign-->
                                                    <a href="">
                                                        <i class="fas fa-eye text-dark mr-2"></i></a>
                                                    <!-- Edit Campaign-->
                                                    @if ($campaign->status !== 'completed' && $campaign->status !== 'active')
                                                        <a href="">
                                                            <i class="fas fa-edit mr-2"></i></a>

                                                        <!-- Delete Campaign-->
                                                        <a href="" class="action-icon-danger" data-toggle="modal"
                                                            data-target="#bs-danger-modal-sm-{{ $campaign->id }}">
                                                            <i class="fas fa-trash text-danger"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- Delete modal -->
                                            <div class="modal fade" id="bs-danger-modal-sm-{{ $campaign->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="font-14" id="mySmallModalLabel">Delete Campaign
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this campaign?</p>
                                                        </div><!-- /.modal-body -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light btn-sm"
                                                                data-dismiss="modal">No</button>
                                                            <form method="POST" action="">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">Yes,
                                                                    delete</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .card {
                transition: transform 0.2s, box-shadow 0.2s;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .progress-bar {
                transition: width 0.5s ease-in-out;
            }

            .nav-tabs .nav-link {
                font-weight: 500;
                color: #6c757d;
                border: none;
            }

            .nav-tabs .nav-link.active {
                color: #dc3545;
                border-bottom: 2px solid #dc3545;
            }
        </style>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endif
@endsection
