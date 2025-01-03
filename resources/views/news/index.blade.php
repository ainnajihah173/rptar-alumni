@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    @if (auth()->user()->role === 'staff')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-dark">News Content</h6>
                <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Create News
                </a>
            </div>
            <!-- Check if there is any news -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title News</th>
                                <th>Slug</th>
                                <th>Content News</th>
                                <th>Author Name</th>
                                <th>Date Published</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $news)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! Str::limit($news->title, 20) !!}</td>
                                    <td>{{ $news->slug }}</td>
                                    <td>{!! Str::limit($news->content, 100) !!}</td>
                                    <td>{{ $news->users->name }}</td>
                                    <td>{{ $news->published_date ? date('d-m-Y', strtotime($news->published_date)) : 'N/A' }}</td>
                                    <td>
                                        @if ($news->is_active == 1)
                                            <span class="badge bg-success text-white">Published</span>
                                        @else
                                            <span class="badge bg-warning text-white">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit Page-->
                                        <a href="{{ route('news.show', $news->id) }}">
                                            <i class="fas fa-eye text-dark mr-2"></i></a>
                                        <!-- Edit Page-->
                                        @if ($news->is_active == 0)
                                            <a href="{{ route('news.edit', $news->id) }}">
                                                <i class="fas fa-edit mr-2"></i></a>
                                        @endif
                                        <!-- Delete Page-->
                                        <a href="" class="action-icon-danger" data-toggle="modal"
                                            data-target="#bs-danger-modal-sm"> <i class="fas fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                                <!-- Delete modal -->
                                <div class="modal fade" id="bs-danger-modal-sm" tabindex="-1" role="dialog"
                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="font-14" id="mySmallModalLabel">Delete News</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure want to delete this news?</p>
                                            </div><!-- /.modal-body -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light btn-sm"
                                                    data-dismiss="modal">No</button>
                                                <form method="POST" action="{{ route('news.destroy', $news->id) }}">
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
        <div class="custom-container bg-white mx-4 px-5 py-3">

            <!-- Main Heading -->
            <div class="text-center mb-4">
                <h2 class="fw-bold display-5" style="color: #ff6f61;">Latest News
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </h2>
                <p class="text-muted">Stay updated with the latest news and insights.</p>
            </div>

            <!-- Featured News Section -->
            <div class="row mb-2">
                @if ($news->first())
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="card border-0 overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $news->first()->image) }}" class="card-img-top"
                                alt="{{ $news->first()->title }}" style="height: 525px; object-fit: cover;">
                            <div class="card-img-overlay d-flex flex-column justify-content-end bg-dark-gradient p-4">
                                <h2 class="card-title fw-bold text-white mb-2">{{ $news->first()->title }}</h2>
                                <p class="text-white-50 small mb-1">By {{ $news->first()->users->name }} |
                                    {{ $news->first()->created_at->format('M d, Y') }}</p>
                                <p class="card-text text-white-50">{!! Str::limit($news->first()->content, 150) !!}</p>
                                <a href="{{ route('news.show', $news->first()->slug) }}" class="btn btn-danger btn-sm">Read
                                    More...</a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Side News Section -->
                <div class="col-md-4">
                    @foreach ($news->slice(1, 2) as $item)
                        <div class="card mb-4 border-0 shadow-sm">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                alt="{{ $item->title }}" style="height: 80px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2">{{ $item->title }}</h5>
                                <p class="text-muted small mb-1">By {{ $item->users->name }} |
                                    {{ $item->created_at->format('M d, Y') }}</p>
                                <p class="card-text text-muted small">{!! Str::limit($item->content, 80) !!}</p>
                                <a href="{{ route('news.show', $item->slug) }}" class="btn btn-outline-primary btn-sm">Read
                                    More...</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- News Section with Carousel -->
        <div class="custom-container bg-white mx-4 px-5 mt-3 py-2">
            <div class="text-center mb-4 mt-2">
                <h2 class="fw-bold display-5" style="color: #ff6f61;">News Section</h2>
                <p class="text-muted">Stay updated with the latest news and insights.</p>
            </div>
            <div class="position-relative">
                <div id="newsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($news->slice(3)->chunk(3) as $chunk)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="row">
                                    @foreach ($chunk as $item)
                                        <div class="col-md-4 mb-4">
                                            <div class="card border-0 shadow-sm h-100">
                                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                                    alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">{!! Str::limit($item->title, 30) !!}</h5>
                                                    <p class="text-muted small mb-1">By {{ $item->users->name }} |
                                                        {{ $item->created_at->format('M d, Y') }}</p>
                                                    <p class="card-text text-muted">{!! Str::limit($item->content, 100) !!}</p>
                                                    <a href="{{ route('news.show', $item->slug) }}"
                                                        class="btn btn-outline-primary btn-sm">Read More...</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Updated Carousel Controls -->
                    <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- List of Links to Older News -->
            <div class="mt-5">
                <h3 class="fw-bold" style="color: #ff6f61;">Archived News</h3>
                <ul class="list-unstyled">
                    @foreach ($news->where('created_at', '<', now()->subYear()) as $archivedNews)
                        <li>
                            <a href="{{ route('news.show', $archivedNews->slug) }}" class="text-primary">
                                {{ $archivedNews->title }} ({{ $archivedNews->created_at->format('Y') }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <style>
            .custom-container {
                width: auto;
                /* Adjusts width based on content */
                max-width: 100%;
                /* Ensures it doesn't exceed the viewport width */
            }

            .bg-dark-gradient {
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8) 100%);
            }

            .shadow-lg {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .shadow-sm {
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            }

            .btn-light {
                background-color: #fff;
                border-color: #fff;
            }

            .btn-light:hover {
                background-color: #f8f9fa;
                border-color: #f8f9fa;
            }

            .btn-outline-primary {
                border-width: 2px;
            }

            /* Custom styles for carousel controls */
            .carousel-control-prev,
            .carousel-control-next {
                width: 40px;
                height: 40px;
                background-color: rgba(255, 111, 97, 0.8);
                /* Semi-transparent background */
                border-radius: 50%;
                top: 50%;
                transform: translateY(-50%);
                opacity: 0.8;
                transition: opacity 0.3s ease;
            }

            .carousel-control-prev {
                left: -35px;
                /* Adjust position to move it outside the carousel */
            }

            .carousel-control-next {
                right: -35px;
                /* Adjust position to move it outside the carousel */
            }

            .carousel-control-prev:hover,
            .carousel-control-next:hover {
                opacity: 1;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-size: 60%;
                width: 100%;
                height: 100%;
            }

            .carousel-control-prev-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
            }

            .carousel-control-next-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
            }
        </style>
    @endif
@endsection
