@extends('layouts.staff-base')
@section('content')
<div class="container bg-white p-3" style="max-width: 1100px; height: 500px;">
    <div class="row h-100">
        <!-- User List Section -->
        <div class="col-md-4 d-flex flex-column border-right pr-3" style="overflow-y: auto;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="font-weight-bold">Messages</h5>
            </div>
            <!-- Search Bar -->
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search users...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- User List -->
            <ul class="list-group list-group-flush user-list">
                <li class="list-group-item d-flex align-items-center">
                    <img src="{{asset('assets/images/default-avatar.png')}}" alt="User Avatar" class="rounded-circle mr-3" style="width: 40px; height: 40px;">
                    <div>
                        <h6 class="mb-0">John Doe</h6>
                        <small class="bg-danger text-white px-2 py-1 rounded">Online</small>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <img src="{{asset('assets/images/default-avatar.png')}}" alt="User Avatar" class="rounded-circle mr-3" style="width: 40px; height: 40px;">
                    <div>
                        <h6 class="mb-0">Jane Smith</h6>
                        <small class="bg-danger text-white px-2 py-1 rounded">Offline</small>
                    </div>
                </li>
                <!-- Add more users as needed -->
            </ul>
        </div>

        <!-- Message Platform Section -->
        <div class="col-md-8 d-flex flex-column">
            <!-- Chat Header -->
            <div class="d-flex align-items-center mb-3">
                <img src="{{asset('assets/images/default-avatar.png')}}" alt="User Avatar" class="rounded-circle mr-3" style="width: 50px; height: 50px;">
                <div>
                    <h5 class="mb-0">John Doe</h5>
                    <small class="text-muted">Last seen 2 minutes ago</small>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="chat-box border rounded p-3 mb-3 flex-grow-1" style="overflow-y: auto; background-color: #f9f9f9;">
                <div class="message mb-3">
                    <div class="d-flex">
                        <img src="{{asset('assets/images/default-avatar.png')}}" alt="User Avatar" class="rounded-circle mr-2" style="width: 40px; height: 40px;">
                        <div class="bg-primary text-white rounded p-2">
                            <p class="mb-0">Hello! How can I help you today?</p>
                        </div>
                    </div>
                    <small class="text-muted ml-5">10:30 AM</small>
                </div>
                <div class="message mb-3 text-right">
                    <div class="d-flex justify-content-end">
                        <div class="bg-secondary text-white rounded p-2">
                            <p class="mb-0">I have a question about my order.</p>
                        </div>
                        <img src="{{asset('assets/images/default-avatar.png')}}" alt="User Avatar" class="rounded-circle ml-2" style="width: 40px; height: 40px;">
                    </div>
                    <small class="text-muted mr-5">10:31 AM</small>
                </div>
                <!-- Add more messages as needed -->
            </div>

            <!-- Message Input -->
            <form class="d-flex">
                <input type="text" class="form-control mr-2" placeholder="Type a message...">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
.user-list .list-group-item {
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.user-list .list-group-item:hover {
    background-color: #f1f1f1;
}
.chat-box::-webkit-scrollbar {
    width: 5px;
}
.chat-box::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 10px;
}
.chat-box::-webkit-scrollbar-thumb:hover {
    background-color: #aaa;
}
</style>
@endsection