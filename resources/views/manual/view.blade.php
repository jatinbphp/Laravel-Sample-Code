<div class="card-content">
    <h5 class="mb-2">{{$subchapter->title}}</h5>
    <p class="mb-2">
        <span class="bullet blue"> {{$subchapter->created}}: {{$subchapter->created_at}}</span>
        <span class="bullet green"> {{trans('message.updated')}}: {{$subchapter->updated_at}}</span>
        <span class="bullet red"> {{trans('message.added_by')}}: {{$subchapter->user->name}}</span>
        <span class="bullet orange"> {{trans('message.views')}}: {{$subchapter->views}}</span>
    </p>
    {!! $subchapter->text !!}
</div>
