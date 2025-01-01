@extends('layouts.staff-base')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .profile-header {
            background: linear-gradient(to right, #e3f2fd, #ede7f6);
            border-radius: 8px;
            padding: 40px;
            position: relative;
            margin-bottom: 30px;
        }

        .profile-header .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #fff;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .profile-header h2 {
            margin-left: 150px;
            font-size: 24px;
            font-weight: bold;
        }

        .profile-header p {
            margin-left: 150px;
            color: #6c757d;
        }

        .save-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: #004085;
            color: #fff;
            border-radius: 8px;
            border: none;
            padding: 8px 20px;
        }

        .form-control {
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .upload-btn {
            background-color: #dee2e6;
            border: none;
            color: #6c757d;
            padding: 6px 15px;
            border-radius: 8px;
        }

        .delete-btn {
            background-color: #e3342f;
            border: none;
            color: #fff;
            padding: 6px 15px;
            border-radius: 8px;
            margin-left: 10px;
        }
    </style>

    <div class="container mt-5">
        <!-- Profile Header -->
        <div class="profile-header">
            <img src="https://via.placeholder.com/120" alt="Profile" class="profile-image">
            <button class="save-btn">Save</button>
            <h2>Alumni Profile</h2>
            <p>Update your details for Rumah Penyayang Tun Abdul Razak</p>
        </div>

        <!-- Profile Form -->
        <form>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label for="year">Year of Graduation</label>
                <input type="text" class="form-control" id="year" placeholder="E.g., 2010">
            </div>
            <div class="form-group">
                <label for="occupation">Current Occupation</label>
                <input type="text" class="form-control" id="occupation" placeholder="Your current job or field">
            </div>
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" id="contact" placeholder="Your phone number">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Your email address">
            </div>
            <div class="form-group">
                <label>Your Photo</label>
                <div class="d-flex align-items-center">
                    <button type="button" class="upload-btn">Update</button>
                    <button type="button" class="delete-btn">Delete</button>
                </div>
            </div>
            <div class="form-group">
                <label for="bio">Your Bio</label>
                <textarea class="form-control" id="bio" rows="3" placeholder="Add a short bio..."></textarea>
            </div>
            <div class="form-group">
                <label for="address">Current Address</label>
                <textarea class="form-control" id="address" rows="3" placeholder="Your current residential address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
        </form>
    </div>
@endsection
