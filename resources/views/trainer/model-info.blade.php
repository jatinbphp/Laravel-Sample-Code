<div class="short-info">
    <div class="avatar k-avatar-sk">
        <div class="img">
            <img class="responsive-img circle avatar-selectat " src="{{$modelUser->avatar}}" alt="">
        </div>
    </div>
    <div class="model-details">
        <h6 class="model_name">{{$modelUser->real_name}}</h6>
        <div class="on-off">
            <div class="online">
                <p>ONLINE: 05:10</p>
                <div class="progress">
                    <div class="determinate" style="width: 60%"></div>
                </div>
            </div>
            <div class="offline">
                <p>OFFLINE: 00:10</p>
                <div class="progress">
                    <div class="determinate" style="width: 10%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-switch-for-user">
        <div   class="switch k-switch k-switch-green">
            <label>
                <input type="checkbox"   onclick="curatenie({{$model->id}})" @if(check_curat($tourId,$model->id)==1) checked @endif >
                <span class="lever tooltipped" data-position="top" data-tooltip="{{trans('message.cleaning')}}"></span>
            </label>
        </div>
    </div>
</div>
<form>
    <div class="row">
        @foreach($questions as $question)
        <div class="col s6">
            <div class="input-field k-input-text">
                <label for="intrebare-{{$question->id}}">{{ ucfirst($question->title) }}</label>
                <input placeholder="" id="intrebare-{{$question->id}}" value="{{isset($answers[$question->id]) ? $answers[$question->id]:''}}"  class="bb22 validate k-txt-box answer_{{$question->id}} m-0" data-model="{{$modelUser->id}}" data-id="{{$question->id}}" type="text">
            </div>
        </div>
        @endforeach
    </div>
</form>
<div class="model-info online-model" >
</div>
