@extends('template.master')
@section('title', 'My Profile | Edit Profil')
@section('content')
<!-- Post Content -->
<div class="post-content">
    <div class="post-container">
        <img src="{{asset('assets/images/users/burglar.png')}}" alt="user" class="profile-photo-md pull-left" />
        <div class="post-detail">
            <h4>Edit Profile</h4>
            <form action="/profile/{{$profile->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" value="{{ old('full_name', $profile->full_name)}}" name="full_name" />
                    </div>
                    <div class="form-group">
                    <label for="umur">Age</label>
                    <input type="number" class="form-control" style="width: 90px;" value="{{ old('age', $profile->age)}}" name="age" />
                    </div>
                    <div class="form-group">
                        <select name="gender" id="gender" class="form-control" style="width: 90px;">
                            <option value="" disabled="true" selected="true">Select Gender</option>
                            <option value="Laki-laki">Male</option>
                            <option value="Perempuan">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="mobile_number">Phone Number</label>
                    <input type="number" class="form-control" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $profile->mobile_number)}}" style="width: 220px;">
                    </div>
                    <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" id="location" value="{{ old('location', $profile->location)}}" style="width: 220px;">
                    </div>
                    <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" rows="3">{{old('address',$profile->address)}}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection