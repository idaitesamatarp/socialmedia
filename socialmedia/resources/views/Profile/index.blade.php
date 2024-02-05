@extends('timeline.master')
@section('title', 'My Profile | This is My Coolest Profile')
@section('content')

<!-- Timeline -->
<div class="timeline">
  <div class="timeline-cover">

    <!--Timeline Menu for Large Screens-->
    <div class="timeline-nav-bar hidden-sm hidden-xs">
      <div class="row">
        <div class="col-md-3">
          <div class="profile-info">
            <img src="{{asset('assets/images/users/burglar.png')}}" alt="" class="img-responsive profile-photo" />
            <h3>{{$profile->full_name}}</h3>
          </div>
        </div>
        <div class="col-md-9">
          <ul class="list-inline profile-menu">
            <li><a href="/profile/{{$profile->id}}">About Me</a></li>
          </ul>
          <ul class="list-inline follow-me">
            <li>1,299 people following her</li>
            <li><a class="btn-sm btn-primary" style="text-decoration: none;" href="/profile/{{$profile->id}}/edit">Edit Profile</a></li>
          </ul>
        </div>
      </div>
    </div><!--Timeline Menu for Large Screens End-->
  </div>

  <div id="page-contents">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">

        <!-- About
        ================================================= -->
        <div class="about-profile">
          <div class="about-content-block">
              <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Personal Information</h4>
              <p>Nama aku {{$profile->full_name}}, umur aku {{$profile->age}} tahun. Aku adalah seorang {{$profile->gender}}</p>
          </div>
          <div class="about-content-block">
              <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
              <p>{{$profile->location}}</p>
          </div>
          <div class="about-content-block">
              <h4 class="grey"><i class="ion-ios-home-outline icon-in-title"></i>Address</h4>
              <p>{{$profile->address}}</p>
          </div>
          <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-telephone-outline icon-in-title"></i>Phone Number</h4>
              <p>{{$profile->mobile_number}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection