@extends('layouts.app')

@section('content')
<div class="comment-input">
  <!-- Compose mail Quill editor -->
  <div class="input-field">
    <span>Comment</span>
    <div class="snow-container mt-1">
      <div class="compose-editor" id="compose-editor">

      </div>
      <div class="compose-quill-toolbar">
        <span class="ql-formats mr-0">
          <button class="ql-bold"></button>
          <button class="ql-italic"></button>
          <button class="ql-underline"></button>
          <button class="ql-link"></button>
          <button class="ql-image"></button>
          <button class="btn btn-small cyan btn-comment  ml-25">Comment</button>
        </span>
      </div>
    </div>
  </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css')}}">
@endpush

@push('js')
<script src="{{ asset('app-assets/vendors/quill/quill.js')}}"></script>
<script type="text/javascript">
  var composeMailEditor = new Quill("#compose-editor", {
      modules: {
          toolbar: ".compose-quill-toolbar"
      },
      placeholder: "Write a Comment... ",
      theme: "snow"
  });
</script>
<script src="{{ asset('js/newsfeed.js')}}"></script>
@endpush
