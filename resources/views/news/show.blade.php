@extends('layouts.staff-base')

@section('content')
    <!-- Page Heading -->

    <div class="mb-3 ml-3">
        <a href="{{ route('news.index') }}" class="text-decoration-none text-dark">
            <i class="fas fa-arrow-left"></i> Back to News List
        </a>
    </div>
   
        <!-- News Article Container -->
        <div class="row">
            <div class="col-12">
                <!-- Card for News -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <!-- News Title -->
                        <h2 class="card-title font-weight-bold text-dark mb-2">{{ $news->title }}</h2>

                        <!-- News Author and Date -->
                        <p class="text-muted mb-4">
                            By <strong>{{ $news->users->name }}</strong> | <em>{{ $news->published_date ? date('d-m-Y', strtotime($news->published_date)) : 'Draft' }}</em>
                        </p>

                        <!-- News Image -->
                        <div class="news-image-container mb-4">
                            @if ($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid rounded shadow-sm mb-4"
                                    alt="News Image">
                            @else
                                <img src="https://via.placeholder.com/1200x600" class="img-fluid rounded shadow-sm mb-4"
                                    alt="No Image Available">
                            @endif
                        </div>

                        <!-- News Content -->
                        <div class="news-content text-justify">
                            {!! $news->content !!}
                        </div>

                    </div> <!-- End Card Body -->
                </div> <!-- End Card -->
            </div> <!-- End Column -->
        </div> <!-- End Row -->

@endsection
