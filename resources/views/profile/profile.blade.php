<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
<div class="profile-container">
    <div class="profile-sidebar">
        <div class="profile-header">
        <img src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : asset('default-profile.png') }}" 
        alt="Profile Picture" width="100" height="100">
            <h2>{{ $user->username }}</h2>
            <p><span class="points">{{ $user->points }}</span> points</p>
        </div>
        <nav>
            <ul>
                <li><a href="#" class="active">My Profile</a></li>
                <li><a href="{{ route('report') }}">Report</a></li>
                <li><a href="{{ route('redeem') }}">Redeem Voucher</a></li>
            </ul>
        </nav>
    </div>
    <div class="profile-main">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Update Form -->
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    <!-- Username -->
    <label for="username">Username</label>
    <input 
        type="text" 
        id="username" 
        name="username" 
        value="{{ $user->username }}" 
        required 
        class="form-control"
    >

    <!-- Phone Number -->
    <label for="phoneNumber">Phone Number</label>
    <input 
        type="text" 
        id="phoneNumber" 
        name="phoneNumber" 
        value="{{ $user->phoneNumber }}" 
        required 
        class="form-control"
    >

    <!-- Email -->
    <label for="email">Email</label>
    <input 
        type="email" 
        id="email" 
        name="email" 
        value="{{ $user->email }}" 
        required 
        class="form-control"
    >

    <!-- Password -->
    <label for="password">Password</label>
    <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Leave blank if you don't want to change"
        class="form-control"
    >

    <!-- Save Button -->
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<!-- Profile Picture Update Form -->
<form method="POST" action="{{ route('profile.updatePicture') }}" enctype="multipart/form-data">
    @csrf
    <div class="profile-picture-section">
        <label for="profilePicture">Update Profile Picture:</label>
        <input type="file" name="profilePicture" id="profilePicture" required>
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>
</form>
    </div>
</div>
</html>