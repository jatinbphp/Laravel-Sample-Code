<div class="chat-deschis gradient-45deg-indigo-purple animated bounceInLeft" data-user="{{$receiver->id}}"
     id="chatWindow_{{$receiver->id}}" style="{{$right?'right:'.$right.'px':''}}" data-update="{{route('chat.update',['receiver'=>$receiver->id])}}">
    <div class="raspuns-chat animated fadeInUp">
        <div class="chat-header">
            <div class="user-section">
                <div class="row valign-wrapper">
                    <div class="col s12 media-image online pr-0 chat-room-header">
                        <div class="usr-top-chat-block">
                            <div class="user-img-chat">
                                <img src="{{$receiver->avatar}}" alt="" class="circle z-depth-2 responsive-img">
                            </div>
                            <div class="user-chat-room-name">
                                <p class="m-0 blue-grey-text text-darken-4 font-weight-700">{{$receiver->name}}</p>
                                {{--<p class="m-0 blue-grey-text text-darken-4 font-weight-700">{{$receiver->id}}</p>--}}
                            </div>
                        </div>
                        <div class="close-chat-room">
                            <span style="cursor: pointer" class="closeChatWindow pill"><img src="{{asset('img/icon-close.png')}}" alt=""></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mesaje-chat">
            @foreach($messages as $message)
                @if (trim($message->text))
                    <div class="row">
                        @if ($message->user_id === $user->id)
                            <div class="to to-block-msg">
                                <p>{{ $user->name}}</p>
                                <span title="Trimis: {{$message->created_at}}"> {!! $message->text !!}</span>
                            </div>
                        @else
                            <div class="from from-block-msg">
                                <p>{{$receiver->name}}</p>
                                <span title="Trimis: {{$message->created_at}}"> {!! $message->text !!}</span>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
        <div class="file-chat"></div>

        <div class="trimite-chat ">
            <label class="upload upload-photo-block" title="Trimite fisiere">
                <i class="material-icons">cloud_upload</i>
            </label>
            <div class="chatFrom" data-action="{{route('chat.send')}}">
                <div class="input-field k-input-text mb-0">
                    <input type="hidden" class="receiver_id " name="receiver_id" value="{{$receiver->id}}">
                    <input type="text" name="text" value="" class="message text k-txt-box" autofocus autocomplete="off"/>
                </div>
                <div class="pabs">
                    <i class="material-icons">send</i>
                </div>
            </div>
        </div>
    </div>
</div>
