@extends('template.master')

@push('script-head')
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
    <!-- Post Create Box -->
    <form action="/post" method="POST">
      @csrf
      <div class="create-post">
              @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif
          <div class="row">
              <div class="col-md-9 col-sm-9">
                  <div class="form-group">
                    <img src="{{asset('assets/images/users/burglar.png')}}" alt="" class="profile-photo-md" />
                    <textarea name="post_content" id="post_content" rows="2" class="form-control my-editor" placeholder="Write what you post">{!! old('post_content', $post_content ?? '') !!}</textarea>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="tools">
                  <input type="submit" id="btn-ok" class="btn btn-primary pull-right" value="Publish"/>
                </div>
              </div>
          </div>
      </div>
    </form><!-- Post Create Box End-->

    <!-- Post Content -->
    <div class="post-content">
      <div class="post-container">
        <img src="{{asset('assets/images/users/burglar.png')}}" alt="user" class="profile-photo-md pull-left" />
        <div class="post-detail">
          @forelse($post as $p)
          <div class="user-info">
            <h5>{{$p->pembuat->full_name}}</h5>
            <p class="text-muted">Published at {{date('h i A, D', strtotime($p->post_date))}}</p>
          </div>
          <div class="reaction">
            <a class="btn text-green"><i class="icon ion-thumbsup"></i> 0</a>
            <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">Edit</a>
          </div>
          <div class="line-divider"></div>
          <div class="post-text">
            <p>{{$p->post_content}}</p>
          </div>
          <div class="line-divider"></div>
          <div class="post-comment">              
            <img src="{{asset('assets/images/users/burglar.png')}}" alt="" class="profile-photo-sm" />
            <form action="/post/{{$p->id}}" method="post">
              @csrf
              <!-- .img-push is used to add margin to elements next to floating images -->
              <div class="img-push">
                  <div class="input-group">
                      <input type="text" class="form-control form-control-sm" name="isi" placeholder="Post a comment">
                      <span class="input-group-btn">
                          <input type="submit" value="Comment" class="btn btn-sm btn-info btn-flat">
                      </span>
                  </div>
              </div>
            </form>
          </div>
          <div class="line-divider"></div>
          <form action="/post/{{$p->id}}" method="POST" class="mt-1">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-sm btn-danger">
          </form>
          @empty
          <p>Don't have post yet</p>
          @endforelse
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
          <!-- heading modal -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Post</h4>
          </div>
          <!-- body modal -->
          <div class="modal-body">
            <!-- Post Content -->
            <div class="post-content">
              <div class="post-container">
                  <img src="{{asset('assets/images/users/burglar.png')}}" alt="user" class="profile-photo-md pull-left" />
                  <div class="post-detail">
                    @foreach ($post as $pos)
                    <form action="/post/{{$pos->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="card-body">
                          @if (session('success'))
                              <div class="alert alert-success">{{ session('success') }}</div>
                          @endif
                          <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea name="post_content" id="post_content" rows="3">{{old('post_content',$pos->post_content)}}</textarea>
                          </div>
                      </div>
                      <!-- footer modal -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Update</button>
                      </div>
                    </form>
                    @endforeach 
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      padding: '3rem',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'info',
      title: 'Make a wishes'
    })
  </script>
@endpush

@push('script-tiny')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@push('script-tiny')