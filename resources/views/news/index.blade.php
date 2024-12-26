@extends('layouts.staff-base')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mb-3">List of News</h1>

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
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Manage News Content</h6>
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

                                    @if ($news->is_active == 1)
                                        <td>{{ $news->updated_at->format('d-m-Y') }}</td>
                                    @else
                                        <td>None</td>
                                    @endif

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
                                            data-target="#bs-danger-modal-sm"> <i
                                                class="fas fa-trash text-danger"></i></a>
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
@endsection
