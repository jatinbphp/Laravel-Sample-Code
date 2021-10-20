@if($notifications ?? '')
@foreach($notifications as $notification)
<li tabindex="0" class="not-id-{{$notification->id}}">
  <a class="grey-text text-darken-2">
    <button data-id="{{$notification->id}}"
    class="check_notification buton-notificari" type="button">
    {{trans('message.i_saw')}}
    </button>
    <span class="material-icons icon-bg-circle cyan small">
      assignment_turned_in
    </span>
    {{$notification->name}}
  </a>
  <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">{{$notification->description}}</time>
</li>
@endforeach
@else
<li>
  <a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle cyan small">notifications_none</span> {{trans('message.you_have_no_new_notifications')}}</a>
</li>
@endif
