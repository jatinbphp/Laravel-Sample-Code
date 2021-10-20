<div class="card-inner-continer">
    <form id="form-usermeta" name="form-usermeta">
      <!--   <div class="input-field col s2 p-cus w-auto-width right">
            <div class="add-row-button">
                <a href="#" class="scheduleAddRow">+</a>
            </div>
        </div> -->

        <div class="rulesData addmore-schedule">
        </div>

        <div class="row">
            <div class="input-field col s12">
                <button class="action-btn  btn k-button-fill k-btn-normal k-btn-icon k-icon right btnMetaUserSave" name="action" type="button" data-id="{{$secretId}}"><img src="{{asset('img/plus-bl.png')}}"> {{trans('message.submit')}}  </button>
            </div>
        </div>
    </form>
</div>
<script id="schedule-addmore" type="text/template">
@include('userfeed.metalist')
</script>
