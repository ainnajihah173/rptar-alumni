@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <div class="mb-3">
        <a href="{{ route('news.index') }}" class="text-decoration-none text-dark">
            <i class="fas fa-arrow-left"></i> Back to News List
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Update News</h6>
        </div>

        <div class="card-body">
            <p class="text-muted font-14">
                Please fill in the form.
            </p>
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">News Title</label>
                            <input type="text" id="example-readonly" class="form-control" name="title" required
                                value="{{ $news->title }}" placeholder="News Headline">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">Slug</label>
                            <input type="text" id="example-readonly" class="form-control" name="slug" required
                                value="{{ $news->slug }}" placeholder="eg: news-headline">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="example-readonly">Author</label>
                            <input type="text" class="form-control" value="{{ $news->users->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="is_active" id="status" class="form-control">
                                <option selected disabled>Please Select...</option>
                                <option value="0" {{ old('is_active', $news->is_active) == 0 ? 'selected' : '' }}>Draft
                                </option>
                                <option value="1" {{ old('is_active', $news->is_active) == 1 ? 'selected' : '' }}>
                                    Publish</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="file">Upload File</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if ($news->image)
                                <!-- Check if there's an existing image -->
                                <div class="mt-2">
                                    <p>Current Image:</p>
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" class="img-thumbnail"
                                        width="150">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="example-readonly">News Content</label>
                            <textarea class="form-control" id="editor" name="content">{!! $news->content !!}</textarea>
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
