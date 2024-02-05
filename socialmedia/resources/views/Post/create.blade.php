@extends('template.master')

@push('script-head')
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')

<!-- Post Create Box -->
<div class="create-post">
    <div class="row">
        <div class="col-md-7 col-sm-7">
      <div class="form-group">
        <img src="{{asset('assets/images/users/burglar.png')}}" alt="" class="profile-photo-md" />
        <textarea name="post_content" id="post_content" rows="2" class="form-control my-editor" placeholder="Write what you post">{!! old('post_content', $post_content ?? '') !!}</textarea>
      </div>
    </div>
        <div class="col-md-5 col-sm-5">
      <div class="tools">
        <ul class="publishing-tools list-inline">
          <li><a href="#"><i class="ion-compose"></i></a></li>
          <li><a href="#"><i class="ion-images"></i></a></li>
        </ul>
        <button class="btn btn-primary pull-right">Publish</button>
      </div>
    </div>
    </div>
</div><!-- Post Create Box End-->
@endsection

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
