<form class="form_comment" method="POST"
	id="form_comment" name="form_comment" enctype="multipart/form-data">
	@csrf
	<input type="hidden" class="commentId" name="comment_id" value="{{$commentId}}">
	<input type="hidden" class="newsFeedId" name="new_feed_id" value="{{$newsFeedId}}">
	<input type="hidden" class="typeId" name="type" value="{{$type}}">
	<input type="hidden" class="randNo" name="rand_no" value="{{$randNo}}">

	<div class="comment-input sub-comment-editor">
      <div class="input-field">
        <div class="snow-container mt-1">
          <div class="composeEditor{{$randNo}}">
          </div>
          <div class="composeToolbar{{$randNo}}">
            <span class="ql-formats mr-0">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
                <div class="post-files">
	                <div class="file-field">
	                    <div class="btn">
	                        <svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg>
	                        <input type="file" name="image" accept="image/*">
	                    </div>
	                    <div class="file-path-wrapper">
	                        <input class="file-path validate" type="text" value="{{trans('message.photo')}}">
	                    </div>
	                </div>
	                <a href="#" class="add-post btnReportComment" data-rand="{{$randNo}}">
                        <img src="{{ asset('img/send.png')}}" alt="">
                    </a>
	            </div>
            </span>
          </div>
        </div>
      </div>
    </div>

    <textarea class="comment-container hidden comment_textarea{{$randNo}}" name="comment" placeholder="{{trans('message.add_a_comment')}}...">

	</textarea>
	<span class="error" id="comment_error"></span>
</form>

<script type="text/javascript">
	$(document).ready(function() {

	    var composeMailEditor{{$randNo}} = new Quill(".composeEditor{{$randNo}}", {
	        modules: {
	            toolbar: ".composeToolbar{{$randNo}}"
	        },
	        placeholder: "Write a Comment... ",
	        theme: "snow"
	    });
	});
</script>
