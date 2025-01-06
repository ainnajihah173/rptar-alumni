@extends('layouts.staff-base')

@section('content')
    <div class="container-fluid">
        <h3 class="text-center" style="color: #eb3a2a;">Messages</h3>
        <p class="text-center text-muted">Send the message and stay connected.</p>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 col-12 mb-3">
                <button class="btn btn-danger btn-block mb-3" data-toggle="modal" data-target="#newMessageModal">New
                    Message</button>
                <!-- Delete Selected Button -->
                {{-- <button id="deleteSelected" class="btn btn-danger btn-block mb-3" data-toggle="modal"
                    data-target="#deleteConfirmationModal" disabled>
                    <i class="fas fa-trash"></i> Delete Selected
                </button> --}}
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Inbox
                        <span class="badge badge-danger badge-pill">{{$count}}</span>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 col-12">
                <!-- Message List Table -->
                <div class="table-responsive">
                    <table id="data" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr data-message-id="{{ $message->id }}" style="cursor: pointer;">
                                    <td><input type="checkbox" class="select-checkbox" name="selected_ids[]"
                                            value="{{ $message->id }}"></td>
                                    <td>{{ $message->sender->profile->full_name }}</td>
                                    <td>{{ $message->receiver->profile->full_name }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->created_at->format('h:i A') }}</td>
                                    <td>
                                        <!-- View Conversation Icon -->
                                        @if ($message->sender_id !== auth()->user()->id)
                                            <a href="{{ route('message.conversation', $message->id) }}"
                                                class="action-icon-primary mr-2" title="View Conversation">
                                                <i class="fas fa-reply text-primary"></i>
                                            </a>
                                        @endif
                                        <!-- Reply Icon (only if the logged-in user is not the sender) -->
                                        {{-- @if ($message->sender_id !== auth()->user()->id)
                                            <a href="" class="action-icon-primary mr-2" data-toggle="modal"
                                                data-target="#replyModal{{ $message->id }}" title="Reply">
                                                <i class="fas fa-reply text-success"></i>
                                            </a>
                                        @endif --}}

                                        <!-- Delete Icon -->
                                        <a href="" class="action-icon-danger" data-toggle="modal"
                                            data-target="#delete{{ $message->id }}" title="Delete">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete{{ $message->id }}" tabindex="-1" role="dialog"
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
                                                <h5 class="font-weight-bold mb-3">Delete All Conversation</h5>
                                                <p class="text-muted mb-3">This action cannot be undone. Are you sure?</p>
                                            </div>
                                            <!-- Modal Footer -->
                                            <div class="modal-footer justify-content-center py-3 border-0">
                                                <button type="button" class="btn btn-secondary px-4"
                                                    data-dismiss="modal">No, Keep it</button>
                                                <form method="POST" action="{{ route('message.destroy', $message->id) }}"
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
    </div>

    <!-- Compose New Message Modal -->
    <div class="modal fade" id="newMessageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-envelope"></i> New Message
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="sender_id" type="email" class="form-control" value="{{ auth()->user()->email }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <select name="receiver_id" id="receiver_id" class="form-control" required>
                                <option value="">Select Recipient</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->profile->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="subject" type="text" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Message" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-envelope"></i> Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    {{-- <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">
                        <i class="fas fa-trash"></i> Delete Messages
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('message.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Are you sure you want to delete the selected messages?
                        <!-- Hidden input to store selected message IDs -->
                        <input type="hidden" name="selected_ids" id="selected_ids">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
