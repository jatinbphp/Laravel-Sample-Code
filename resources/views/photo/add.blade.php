<form action="" method="POST" name="upload-photos-form" id="upload-photos-form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="input-field col s12 k-dropdown">
            <label>{{trans('message.model')}}  <span>*</span></label>
            <select name="models" id="models" class=" browser-default " >
                <option value="">{{trans('message.select')}}</option>
                @foreach($models as $key => $model)
                <option value="{{$model->id }}">{{$model->real_name}} - {{$model->name}}</option>
                @endforeach
            </select>
            <span class="error p-0 k-error" id="models_error"> </span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 k-dropdown">
            <label>{{trans('message.photography_type')}}  <span>*</span></label>
            <select name="type" id="type" class=" browser-default "  >
                <option value="">{{trans('message.select')}}</option>
                <option value="photo_card">{{trans('message.bulletin_picture')}}</option>
                <option value="avatar">{{trans('message.avatar_picture')}}</option>
                <option value="all">{{trans('message.general_pictures')}}</option>
            </select>
            <span class="error p-0 k-error" id="type_error"> </span>
        </div>
    </div>
    <div class="row">
        <div class="input-field k-input-text col s12" >
            <label>{{trans('message.choose_pictures')}}  <span>*</span></label>
            <input type="file" id="files" name="files[]" multiple  class="dropify-event validate k-txt-box"  data-default-file='{{$user->avatar}}' >
            <span class="error p-0 k-error" id="files_error"> </span>
        </div>
        <output id="list"></output>
    </div>
    <div class="row">
        <div class="input-field k-input-text col s12" >
            <label>{{trans('message.directory')}}  <span>*</span></label>
            <input type="text" name="folder" id="folder" class=" validate k-txt-box" />
            <span class="error p-0 k-error" id="folder_error"> </span>
        </div>
    </div>
    <div class="row">
        <div class="modal_button_center">

            <button class="action-btn  btn k-button-fill k-btn-normal k-icon submit-upload_photos" type="submit">
            <img src="{{asset('img/plus-bl.png')}}"> {{trans('message.add')}} {{trans('message.photos')}}
            </button>
        </div>
    </div>
</form>

<script>
  $('.removeimg').click(function (e) {
    $(this).remove();
  });

  function handleFileSelect(evt) {
    var files = evt.target.files;

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML =
          [
            '<img class="removeimg" style="height: 75px; border: 1px solid #000; margin: 5px" src="',
            e.target.result,
            '" title="', escape(theFile.name),
            '"/>'
          ].join('');

          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
