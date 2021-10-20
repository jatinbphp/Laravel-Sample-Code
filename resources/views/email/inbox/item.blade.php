<div class="email-brief-info collection-item animate fadeUp delay-1 emailItem{{$email['message_id']}}">
  <div class="list-left">
    <label>
      <input name="email_chk" type="checkbox" id="chk_{{$email['message_id']}}" value="{{$email['message_id']}}" class="emailIds" />
      <span>
      </span>
    </label>
    <div class="favorite">
      <i class="material-icons">
      star_border
      </i>
    </div>
    <div class="email-label">
      <i class="material-icons">
      label_outline
      </i>
    </div>
  </div>
  <a class="list-content emailContent" href="#" data-id="{{$email['message_id']}}" data-type="{{$type}}">
    <div class="list-title-area">
      <div class="user-media">
        <img src="{{ asset('app-assets/images/user/2.jpg')}}" alt=""
        class="circle z-depth-2 responsive-img avtar">
          <div class="list-title">
            {{$email["from"]}}
          </div>
        </img>
      </div>
    </div>
    <div class="list-desc">
      {!! $email["snippet"] !!}
    </div>
  </a>
  <div class="list-right">
    <div class="list-date">
      {{$email['date']}}
    </div>
  </div>
</div>
