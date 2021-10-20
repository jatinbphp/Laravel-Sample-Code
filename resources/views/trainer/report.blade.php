<div class="models-dashboard">
    <div class="row">
        <div class="col s12 xl5">
            <div class="card-with-header">
                <div class="card-header">
                    <h4>{{trans('message.my_models')}}  </h4>
                    <div class="buttons-group">
                        <a onclick="micsoreaza('modelelemicso')"><img src="/img/icon-collapse.png" alt=""></a>
                        <a href="#"><img src="{{asset('img/icon-move.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('img/icon-pin.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="card-body">
                    <hr>
                    <ul class="overflow-y-list my-models modelelemicso" style="height: 320px">
                        @foreach($get_model as $key => $model)
                            <li class="model online-model active-model-info" value="{{$model->id}}">
                                <div class="avatar">
                                    <div class="img">
                                        <img class="responsive-img circle" src="/storage/{{$model->avatar}}" alt="{{$model->name}}">
                                    </div>
                                </div>
                                <div class="model-details">
                                    <h6>{{$model->real_name}}</h6>
                                    <p>{{$model->room_name}}</p>
                                    <div class="progress">
                                        <div class="determinate" style="width: 70%"></div>
                                    </div>
                                </div>
                                <div class="switch-model">
                                    <div class="switch">
                                        <label>
                                            Nu
                                            <input type="checkbox" onclick="curatenie({{$model->id}})" @if(check_curat($tour_id,$model->id)==1) checked @endif >
                                            <span class="lever tooltipped" data-position="top" data-tooltip="CURATENIE"></span>
                                            Da
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <hr/>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col s12 xl7 modelelemicso">
            <div class="card-with-header modelInfo">
                <div class="model-info overflow-y-list online-model" style="height: 409px">
                    <div class="short-info">
                        <div class="avatar">
                            <div class="img">
                                <img class="responsive-img circle avatar-selectat" src="{{asset('img/andreea-ionescu.png')}}" alt="">
                            </div>
                        </div>
                        <div class="model-details">
                            <h6 class="model_name">Ana Popescu</h6>
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
                    </div>

                    <form>
                        @foreach($questions as $question)
                            <div class="input-field">
                                <input placeholder="" id="intrebare-{{$question->id}}" value=""  class="bb22 validate answer_{{$question->id}}" data-model="" data-id="{{$question->id}}" type="text">
                                <label for="intrebare-{{$question->id}}">{{$question->title}}</label>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
