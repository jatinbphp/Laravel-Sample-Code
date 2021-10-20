@if(count($accounts_onn)>0)
<h6 class="mt-10 mb-10">{{trans('message.active_accounts_list')}}</h6>
@foreach($accounts_onn as $account)
<div class="account">
  <div class="img">
    <img class="responsive-img" src="/img/myfreecams-logo.png" alt="">
  </div>
  <div class="user">
    <div class="col s10"> <a href="{{$account->site_link}}" target="_blank"
    class="freemium-link">{{$account->site_name}}</a></div>
    <p>{{trans('message.user')}}: <span>{{$account->username}}</span></p>
    <p>{{trans('message.password')}}: <span>{{$account->password}}</span></p>
    <div class="actions">
      <a href="#" class=" btn purple-btn">Log in</a>
      <a href="#" class="icon-btn  btn purple-btn">
        <img src="/img/icon-pencil.png" alt="">
      </a>
      <a href="video/account/{{$account->id}}" class="icon-btn  btn purple-btn">
        <img src="/img/icon-trash.png" alt="">
      </a>
    </div>
  </div>
</div>
@endforeach
@endif
@if(count($accounts_off)>0)
<h6 class="mt-10 mb-10">{{trans('message.list_of_accounts_disabled')}}</h6>
@foreach($accounts_off as $account)
<div class="account">
  <div class="img">
    <img class="responsive-img" src="/img/myfreecams-logo.png" alt="">
  </div>
  <div class="user">
    <div class="col s10"> <a href="{{$account->site_link}}" target="_blank"
    class="freemium-link">{{$account->site_name}}</a></div>
    <p>{{trans('message.user')}}: <span>{{$account->username}}</span></p>
    <p>{{trans('message.password')}}: <span>{{$account->password}}</span></p>
    <div class="actions">
      <a href="#" class=" btn purple-btn">Log in</a>
      <a href="#" class="icon-btn  btn purple-btn">
        <img src="/img/icon-pencil.png" alt="">
      </a>
      <a href="video/account/{{$account->id}}" class="icon-btn  btn purple-btn">
        Activeaza
      </a>
    </div>
  </div>
</div>
@endforeach
@endif
