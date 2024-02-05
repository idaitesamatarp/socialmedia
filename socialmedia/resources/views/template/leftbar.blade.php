<!-- Newsfeed Common Side Bar Left -->
<div class="col-md-3 static">
    <div class="profile-card">
        <img src="{{asset('assets/images/users/burglar.png')}}" alt="user" class="profile-photo" />
        <h5><a href="timeline.html" class="text-white">{{Auth::user()->name}}</a></h5>
        <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
    </div><!--profile card ends-->
    <ul class="nav-news-feed">
      <li><i class="icon ion-ios-paper"></i><div><a href="/post">My Newsfeed</a></div></li>
      <li><i class="icon ion-ios-people"></i><div><a href="/follow">People Nearby</a></div></li>
      <li><i class="icon ion-ios-people-outline"></i><div><a href="/friend">Friends</a></div></li>
      <li><i class="icon ion-images"></i><div><a href="/images">Images</a></div></li>
    </ul><!--news-feed links ends-->
</div>