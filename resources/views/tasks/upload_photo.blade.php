<div id="modal-upload_photo" class=" modalx bottom-sheet hidden">
    <div class="modalx-content">
        <h4>{{trans('message.upload_pictures')}}</h4>

            <form action="/upload_photo" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="input-field">
                        <input  id="file" type="file" name="files[]" multiple class="validate">

                    </div>

                    <input type="hidden" value="" id="element_name" name="element_name"/>
                    <input type="hidden" value="" id="task_id_upload" name="task_id_upload"/>
                </div>

                <button class="btn btn-success">{{trans('message.load')}}</button>
            </form>
    </div>
</div>
