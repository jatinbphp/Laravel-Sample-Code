@extends("layouts.app")
@section('content')
<div class="col s12 m12 xl6">
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s2">
                    <i class="material-icons medium icon-demo">insert_chart</i>
                </div>
                <div class="col s10">
                    <div class="butonas"><a onclick="selecteaza('pm')"
                            class="btn  gradient-45deg-purple-deep-orange">{{trans('message.start_selection_days_for_the_program')}}</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col selected-program">
    <div class="col s12 m12 xl6">
        <div class="card">
            <div class="card-content">

                <ul class="macarodatapesaptamana_period gradient-45deg-purple-deep-purple class">
                    <li class="smallwidth" style="color: rgba(255, 255, 255, 0.901961);">{{trans('message.date')}}</li>
                    @foreach($program_day as $prog_day)
                    <li style="color: rgba(255, 255, 255, 0.901961);">{{$prog_day}}</li>
                    @endforeach
                </ul>

                @foreach($roles as $role)
                @if($role->name != 'user')
                <ul class="macarodatapesaptamana_period">
                    <li class="smallwidth">{{$role->name}}</li>
                    @foreach($program_day as $prog_day)
                    <li class="selector_{{$role->id}}_{{$prog_day}}">
                        @for($h = 0; $h<=23; $h++) @php if($h <=9 ){ $r='0' .$h; } else { $r=$h; } @endphp <i
                            class="h{{$r}}" onclick="user_info(this)" activ="off"><span
                                class="h-ulica">{{$r}}</span></i>
                            @endfor
                    </li>
                    @endforeach
                </ul>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- tabel exemplu -->

@php
@endphp

<div class="col s12 m12 xl6 hide tabel-programari-multiple">
    <div class="col s12 m12 xl6">
        <div class="card">
            <div class="card-content">
                <div class="text-center calendar-change">
                    <a href="/calendar/{{$prev}}" id="prev" value="{{$prev}}">
                        <span class="new badge gradient-45deg-light-blue-cyan">{{$prev}}</span>
                    </a> - <span
                        class="new badge gradient-45deg-purple-deep-orange gradient-shadow">{{$html_title}}</span> - <a
                        href="/calendar/{{$next}}" id="next" value="{{$next}}"><span
                            class="new badge gradient-45deg-light-blue-cyan">{{$next}}</span></a>
                </div>
                <ul class="macarodatapesaptamana light-blue lighten-2 class">
                    <li>{{trans('message.months')}}</li>
                    <li>{{trans('message.tuesday')}}</li>
                    <li>{{trans('message.wednesday')}}</li>
                    <li>{{trans('message.thursday')}}</li>
                    <li>{{trans('message.friday')}}</li>
                    <li>{{trans('message.saturday')}}</li>
                    <li>{{trans('message.sunday')}}</li>
                </ul>
                <ul class="blablabla">
                    @for($off = 1; $off<$str; $off++) <li>
                        </li>
                        @endfor
                        @for($ziua = 1; $ziua<=$day_count; $ziua++) @php if($ziua <=9){ $r='0' .$ziua; }else { $r=$ziua;
                            } @endphp <li class="calendar_day cd{{$html_title}}-{{$r}}"
                            onclick="adauga_data('cd{{$html_title}}-{{$r}}');" value="{{$html_title}}-{{$r}}">{{$ziua}}
                            </li>
                            @endfor
                </ul>
            </div>
        </div>

        <div class="zilelemele d-none">
            <span class="d-none setari" numaratoare="0" tip="calendar" categorie=""></span>
        </div>
    </div>
    <h4 class="header">{{trans('message.add_staff_in_the_coming_days')}}</h4>
    <ul id="projects-collection" class="collection z-depth-1">
        <li class="collection-item avatar">
            <i class="material-icons cyan circle">card_travel</i>
            <h6 class="collection-header m-0 current_date"></h6>
            <p>{{trans('message.all_jobs_are_completed')}}</p>
        </li>

        <!-- Tipuri angajati -->
        @foreach($roles as $role)
        @if($role->name != 'user')
        <li class="collection-item categorie_{{$role->id}}">
            <div class="row">
                <div class="col">
                    <div class="adaugare-persoana" onclick="adaugare_persona('categorie_{{$role->id}}')">
                        <a class="btn-floating mt-2 btn  mr-1">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                </div>
                <div class="col role_name">
                    <p class="collections-title font-weight-600">{{$role->name}}</p>
                </div>
            </div>

            <div class="row" style="line-height: 57px;border-top: 1px solid #ddd;margin-bottom: 10px;">
            </div>
        </li>
        @endif
        @endforeach


    </ul>
</div>

<!-- tabel exemplu -->

@php
$utilizatori = array();
@endphp


<!-- modal aici -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="input-field">
            <select class="select2-size-sm browser-default persons" name="persons[]" multiple="multiple"
                id="small-select-multi">
                @foreach($users as $user)
                @php
                $utilizatori[$user->id] = array();
                $utilizatori[$user->id]['name'] = $user->name;
                $utilizatori[$user->id]['avatar'] = $user->avatar;

                @endphp
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"
            onclick="adauga_in_tabel()">{{trans('message.add_people')}}</a>
    </div>
</div>
<!-- modal aici -->

<!-- modal ANGAJAT -->
<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="input-field">
            <div class="user-info"></div>
            {{trans('message.add_task')}}
            <form action="/task/add_task_calendar" method="POST">
                @csrf
                <input type="hidden" name="user_id" id="task_user_id" value="" />
                <input type="hidden" name="task_date" id="task_date" value="" />

                <div class="row">
                    <label>{{trans('message.title')}}</label>
                    <input type="text" name="task_description" value="" class="form-control" />
                </div>
                <div class="row">
                    <label>{{trans('message.description')}}</label>
                    <input type="text" name="task_description2" value="" class="form-control" />
                </div>
                <div class="row">
                    <label>{{trans('message.hour')}}</label>
                    <input type="time" name="task_hour" value="" class="form-control" />
                </div>
                <div class="row">
                    <label>{{trans('message.priority')}}</label>
                    <select name="task_priority">
                        @foreach($labels as $label)
                        <option value="{{$label->priority_id}}">{{$label->label_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn info">{{trans('message.add_task')}}</button>
                </div>
            </form>
            {{trans('message.list_of_tasks_today')}}
            <ul id="task_list">
            </ul>
        </div>
    </div>
</div>
<!-- modal ANGAJAT -->


<div id="modal-calendar" class="modalx bottom-sheet modal-custom modal-calendar">
    <div class="modal-header">
        <h4>CALENDAR</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="content">
        <ul class="tabs-calendar nav-tabs">
            <li class="tab"><a class="active" href="#trainer">{{trans('message.trainer')}}</a></li>
            <li class="tab"><a href="#fotograf">{{trans('message.photographer')}}</a></li>
            <li class="tab"><a href="#manager">Manager</a></li>
            <li class="tab"><a href="#tehnic">{{trans('message.technical')}}</a></li>
            <li class="tab"><a href="#social-media">Social Media</a></li>
            <li class="tab"><a href="#trainer-initiere">{{trans('message.initiation_trainer')}}</a></li>
        </ul>
        <div class="content-tabs">
            <div id="trainer" class="">
                <div class="select">
                    <select class="select-person browser-default">
                        <option value="square">{{trans('message.add_the_person')}}</option>
                        <option value="rectangle">Rectangle</option>
                        <option value="rombo">Rombo</option>
                        <option value="romboid">Romboid</option>
                        <option value="trapeze">Trapeze</option>
                        <option value="traible">Triangle</option>
                        <option value="polygon">Polygon</option>
                    </select>
                </div>

                <a href="#" class="person-info selected">
                    <div class="avatar">
                        <img class="responsive-img circle" src="/img/andreea-ionescu.png" alt="">
                    </div>
                    <div class="person-details">
                        <h6>Andreea Ion</h6>
                        <p>8:30 AM - 6:30 PM</p>
                    </div>
                </a>
                <a href="#" class="person-info">
                    <div class="avatar">
                        <img class="responsive-img circle" src="/img/andreea-ionescu.png" alt="">
                    </div>
                    <div class="person-details">
                        <h6>Andreea Ion</h6>
                    </div>
                </a>
                <a href="#" class="person-info">
                    <div class="avatar">
                        <img class="responsive-img circle" src="/img/andreea-ionescu.png" alt="">
                    </div>
                    <div class="person-details">
                        <h6>Andreea Ion</h6>
                    </div>
                </a>
                <a href="#" class="person-info">
                    <div class="avatar">
                        <img class="responsive-img circle" src="/img/andreea-ionescu.png" alt="">
                    </div>
                    <div class="person-details">
                        <h6>Andreea Ion</h6>
                    </div>
                </a>
            </div>
            <div id="fotograf" class="">{{trans('message.photographer')}}</div>
            <div id="manager" class="">Manager</div>
            <div id="tehnic" class="">{{trans('message.technical')}}</div>
            <div id="social-media" class="">Social Media</div>
            <div id="trainer-initiere" class="">{{trans('message.initiation_trainer')}}</div>
        </div>
        <div class="calendar-tabs">
            <div class="col">
                <div class="col-6">

                </div>
                <div class="col-6">
                    <ul class="macarodatapesaptamana light-blue lighten-2 class">
                        <li>{{trans('message.months')}}</li>
                        <li>{{trans('message.tuesday')}}</li>
                        <li>{{trans('message.wednesday')}}</li>
                        <li>{{trans('message.thursday')}}</li>
                        <li>{{trans('message.friday')}}</li>
                        <li>{{trans('message.saturday')}}</li>
                        <li>{{trans('message.sunday')}}</li>
                    </ul>
                    <ul class="blablabla">
                        @for($off = 1; $off<$str; $off++)
                            <li></li>
                        @endfor
                        @for($ziua = 1; $ziua<=$day_count; $ziua++) @php if($ziua <=9){ $r='0' .$ziua; }else { $r=$ziua;
                            } @endphp <li class="calendar_day cd{{$html_title}}-{{$r}}"
                            onclick="adauga_data('cd{{$html_title}}-{{$r}}');" value="{{$html_title}}-{{$r}}">{{$ziua}}
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>



<script>
    var utilizatori = {!!json_encode($utilizatori)!!};
    var programari = {!!json_encode($programari)!!};
    var days = new Array();

    $(document).ready(function(){
        $('.user-absolut').tooltip();

    });
    //ore job
    programari.forEach(function(elm){
        var data = elm.date;
        var end_hour = elm.end_hour;
        var start_hour = elm.start_hour;
        var role = elm.role;
        var user_id = elm.user_id;
        console.log(utilizatori[6]);

        var selector = '.selector_'+role+'_'+data;
        start_hour = parseInt(start_hour[0]+start_hour[1]);
        end_hour = parseInt(end_hour[0]+end_hour[1]);
        var i;
        var subselector;
        var avatar;
        for(i = start_hour; i<=end_hour;i++){
            if(i<10){
               subselector = '.h0'+i;
            } else {
               subselector = '.h'+i;
            }
            $(selector +' '+subselector).addClass('used');
            $(selector +' '+subselector).attr('user', user_id);
            if(i == start_hour){
                if(start_hour<10){
                    avatar = '.h0'+i;
                }else{
                    avatar = '.h'+i;
                }
                $(selector +' '+avatar).append('<img class="user-absolut" src="/storage/'+utilizatori[user_id]['avatar']+'" alt="avatar" data-position="bottom" data-tooltip="'+utilizatori[user_id]['name']+'">');
            }

        }
    });

    function selecteaza(elm) {
        if (elm == 'pm') {
            $('.zilelemele').removeClass('d-none');
            $('.tabel-programari-multiple').removeClass('hide');
            $('.selected-program').addClass('hide');
            $('.butonas').html('<a onclick="selecteaza(\'cl\')" class="btn  gradient-45deg-purple-deep-orange">Revino in zona calendar</a>');
            $('.zilelemele .setari').attr('tip', 'adaugare_multipla');
        } else {
            $('.zilelemele').addClass('d-none');
            $('.tabel-programari-multiple').addClass('hide');
            $('.butonas').html('<a onclick="selecteaza(\'pm\')" class="btn  gradient-45deg-purple-deep-orange">Porneste selectie zile petru program</a>');
            $('.zilelemele .setari').attr('tip', 'calendar');
            $('.selected-program').removeClass('hide');
        }

    }

    function adauga_data(cheie_data) {
        var tip = $('.zilelemele .setari').attr('tip');
        var numaratoare = parseInt($('.zilelemele .setari').attr('numaratoare'));

        if (tip == 'adaugare_multipla') {
            $('.' + cheie_data).attr('onclick', 'sterge_data(\'' + cheie_data.toString() + '\')');
            $('.' + cheie_data).addClass('selectat');
            numaratoare = numaratoare + 1;
            $('.zilelemele .setari').attr('numaratoare', numaratoare);
            $('.' + cheie_data).attr('pozitie', numaratoare);
            var valoare = $('.' + cheie_data).val();
            days.push(cheie_data);
            modificare_data('.current_date', days);
        } else {
            $('#modal1').modal('open');
        }

    }

    function sterge_data(cheie_data) {
        var tip = $('.zilelemele .setari').attr('tip');
        var numaratoare = parseInt($('.zilelemele .setari').attr('numaratoare'));

        if (tip == 'adaugare_multipla') {
            $('.' + cheie_data).attr('onclick', 'adauga_data(\'' + cheie_data.toString() + '\')');
            $('.' + cheie_data).removeClass('selectat');
            var days_nr = days.indexOf(cheie_data);
            days.splice(days_nr, 1);
            numaratoare = numaratoare - 1;
            console.log(days);
            $('.zilelemele .setari').attr('numaratoare', numaratoare);
            $('.' + cheie_data).attr('pozitie', '');
            modificare_data('.current_date', days);
        } else {
            $('#modal1').modal('open');
        }

    }

    function modificare_data(elm, days) {
        $(elm).html('');
        days.forEach(function(day) {
            $(elm).append(day.replace('cd', ' '));
        })
    }

    function adaugare_persona(selector) {
        $('#modal1').modal('open');
        $('.zilelemele .setari').attr('categorie', selector);
    }

    function adauga_in_tabel() {
        var persons = $('.modal .persons').val();
        persons.forEach(function(person) {
            realizare_element(person);
        });
    }

    function realizare_element(person) {
        var categorie = $('.zilelemele .setari').attr('categorie');
        var timer1 = '<input type="time" class="start_date" timestep="600" value=""/>'
        var timer2 = '<input type="time" class="end_date" onfocusout="save_on_database(\'' + person + '\',\'' + categorie + '\' )" timestep="600"value=""/>'
        $('.row' + person + '').remove();
        $('.' + categorie).append('<div class="row row' + person + '" style="line-height: 57px;border-top: 1px solid #ddd;margin-bottom: 10px;"><div class="col s1"><a class="btn-floating mb-1 " onclick="$(\'.row' + person + '\').remove();"><i class="material-icons">clear</i></a></div><div class="col s2"><p class="collections-content">' + utilizatori[person]['name'] + '</p></div><div class="col s4">' + timer1 + ' </div><div class="col s4">' + timer2 + ' </div></div>');;
    }

    function save_on_database(elem, elem1) {
        var timer1 = $(".row" + elem + " .start_date").val();
        var timer2 = $(".row" + elem + " .end_date").val();

        if (timer1) {
            if (timer2) {

                $.ajax({
                        method: "GET",
                        url: "/add_program/" + days + '/' + elem + '/' + elem1 + '/' + timer1 + '/' + timer2,
                    })
                    .done(function(msg) {
                        console.log(msg);

                    });
            } else
                alert('te rog sa completezi a doua data');

        } else

            alert('te rog sa completezi prima data');


    }
    function user_info(elm){
        var user = $(elm).attr('user');
        var activ = $(elm).attr('activ');
        var date=$(elm).parent().attr('class');
        var url="/task/get_daily_user_task/" + date + "/" +user;
            $.ajax({
                url: url,
                method: "get"
          }).done(function(response) {

            // user && activ == 'off'
                if(!$('#modal2').isShownuser){
                    $(elm).attr('activ', 'on');
                    $("#task_user_id").attr('value',user);
                    $("#task_date").attr('value',date);
                    $("#task_list").html('')
                    response.forEach(function(elem){
                        if(elem['hour']=='null')
                        var hour=" "
                        else
                        var hour=elem['hour'];
                        $("#task_list").append('<li>'+elem['description']+'  '+hour+'</li>');

                    });
                    $('#modal2').modal('open');
                }
            });
    }
    function stergere(elm) {

    }
</script>
<style>
    .test {
        width: 100%;
        border: 1px solid black;

    }

    .test2 {
        width: 33, 33%;
        display: inline-block;
        border: 1px solid black;
    }

    .selected-program .card-content {
        overflow-x: scroll;
    }

    .macarodatapesaptamana_period {
        margin: 0;
        padding: 10px 0;
        background-color: #daede7;
        width: max-content;
        display: block;
    }

    .macarodatapesaptamana_period:last-child {
        overflow: hidden;
    }

    .macarodatapesaptamana_period li {
        display: inline-block;
        width: 350px;
        color: #666;
        text-align: center;
        position: relative;
    }

    .macarodatapesaptamana_period li:not(:first-child)::after {
        content: "";
        width: 4px;
        height: 69px;
        position: absolute;
        right: -2px;
        background: rgba(232, 59, 59, 0.8);
    }

    .macarodatapesaptamana_period li i {
        width: 4.1%;
        display: inline-block;
        height: 50px;
        background: #fff;
        border-right: 1px solid #ffd3d3;
        margin-right: -0.22px;
        margin-left: -3.7px;
        margin-bottom: -7px;
    }

    .macarodatapesaptamana {
        margin: 0;
        padding: 10px 0;
        background-color: #3cf6b9;
    }

    .macarodatapesaptamana li {
        display: inline-block;
        width: 13.6%;
        color: #666;
        text-align: center;
    }

    .blablabla {
        padding: 10px 0;
        background: #eee;
        margin: 0;
    }

    .blablabla li {
        list-style-type: none;
        display: inline-block;
        width: 13.6%;
        text-align: center;
        margin-bottom: 5px;
        font-size: 12px;
        color: #777;
        cursor: pointer;
    }

    .blablabla li .active {
        padding: 5px;
        background: #1abc9c;
        color: white !important
    }

    .selectat {
        background: -webkit-linear-gradient(45deg, #7b1fa2, #7c4dff);
        background: linear-gradient(45deg, #7b1fa2, #7c4dff);
        color: #fff !important;
        font-weight: bold;
        cursor: no-drop !important;
    }

    .used {
        background: linear-gradient(45deg, #ff5252, #f48fb1) !important;
        position: relative;
    }

    .user-absolut {
        position: absolute;
        width: 30px;
        height: 30px;
        border-radius: 10px;
        z-index: 9;
        cursor: pointer;
    }

    .h-ulica.h-ulica {
        font-size: 8px;
        font-weight: 300;
        position: absolute;
        top: -10px;
        margin-left: -5px;
    }

    .smallwidth {
        max-width: 120px;
    }
</style>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/ionRangeSlider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/ionRangeSlider/css/ion.rangeSlider.skinFlat.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css')}}" type="text/css">
@endpush
@push('js')
    <script src="{{asset('app-assets/vendors/ionRangeSlider/js/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('app-assets/vendors/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/materialize.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/ui-chips.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/advance-ui-modals.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/form-select2.js')}}"></script>
@endpush
