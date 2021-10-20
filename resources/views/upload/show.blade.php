<div class="dropify-gallery-dashboard">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <form method="POST" enctype="multipart/form-data" id="gallery-form-files" name="gallery-form-files">
                    @csrf
                    <input type="file" id="gallery-files" name="files[]" class="dropify-gallery-dashboard fileUpload "
                    data-allowed-file-extensions="png jpeg jpg" multiple="true" />
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col s12 m6">
                <ul class="files show_my_file">
                    @include("upload.list",['files' => $files])
                </ul>
            </div>
        </div>
    </div>
