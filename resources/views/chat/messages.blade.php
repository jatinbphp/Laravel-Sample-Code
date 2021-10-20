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
