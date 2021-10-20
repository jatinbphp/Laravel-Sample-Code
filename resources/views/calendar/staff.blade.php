@extends("layouts.app")
@section('content')
{{-- //@dd($programari) --}}
<div class="col s12">
    <div class="card">
      <div class="card-content">
        <h4 class="card-title">
          Calendar Staff
        </h4>
        <div class="row">
          <div class="col m3 s12">
            <div id='external-events'>
              <h5>Evenimente Rapide</h5>
              <div class="fc-events-container mb-5">
                <div class='fc-event' data-color='#009688'>Update sistem</div>
                <div class='fc-event' data-color='#4CAF50'>Sedinta</div>
                <p>
                  <label>
                    <input type="checkbox" id="drop-remove" />
                    <span>Ascunde dupa plasare</span>
                  </label>
                </p>
              </div>
            </div>
          </div>
          <div class="col m9 s12">
            <div id='fc-external-drag'></div>
          </div>
        </div>
      </div>
    </div>
  </div>



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
        <ul class="tabs-calendar nav-tabs overflow-y-list">
            @foreach ($roles as $rol)
        <li class="tab tab-{{$rol->id}}"> <a onclick="actveaza_tab({{$rol->id}})">{{$rol->display_name}}</a></li>
            @endforeach
        </ul>
        <div class="content-tabs overflow-y-list">
            <div id="trainer" class="">
                <div class="select select-persoana">
                    *Selecteaza tab inainte
                </div>
                <div class="data-users" data-persoane="[null]" data-zile="[null]">

                </div>

            </div>

        </div>
        <div class="calendar-tabs">
            <div class="row">
                <div class="col s6">
                    <div class="ore" style="display:none" dela_h="01" dela_min="00" dela_t="AM" pala_h="12" pala_min="59" pala_t="PM"></div>
                    <div class="ora-afisata delah" >
                        <div class="coloana1 w33" onscroll="cevanou('')">
                            <div class="inainte2" onclick="click_change('sus', 'h', '.delah .coloana1 .acum', 'dela_h')"><i class="material-icons">arrow_drop_up</i></div>
                            <div class="inainte" onclick="click_change('sus', 'h', '.delah .coloana1 .acum', 'dela_h')"></div>
                            <div class="acum"></div>
                            <div class="dupa" onclick="click_change('j', 'h', '.delah .coloana1 .acum', 'dela_h')"></div>
                            <div class="dupa2" onclick="click_change('j', 'h', '.delah .coloana1 .acum', 'dela_h')"><i class="material-icons">arrow_drop_down</i></div>
                        </div>
                        <div class="coloana2 w33">
                            <div class="inainte2" onclick="click_change('sus', 'min', '.delah .coloana2 .acum', 'dela_min')"><i class="material-icons">arrow_drop_up</i></div>
                            <div class="inainte" onclick="click_change('sus', 'min', '.delah .coloana2 .acum', 'dela_min')"></div>
                            <div class="acum"></div>
                            <div class="dupa"  onclick="click_change('j', 'min', '.delah .coloana2 .acum', 'dela_min')"></div>
                            <div class="dupa2"  onclick="click_change('j', 'min', '.delah .coloana2 .acum', 'dela_min')"><i class="material-icons">arrow_drop_down</i></div>
                        </div>
                        <div class="coloana3 w33">
                            <div class="inainte2"></div>
                            <div class="inainte"></div>
                            <div class="acum"></div>
                            <div class="dupa" onclick="change_t('.delah .coloana3 .acum', 'dela_t')"></div>
                            <div class="dupa2" onclick="change_t('.delah .coloana3 .acum', 'dela_t')"><i class="material-icons">arrow_drop_down</i></div>
                        </div>
                    </div>
                    <div class="ora-afisata palah">
                        <div class="coloana1 w33">
                            <div class="inainte2" onclick="click_change('sus', 'h', '.palah .coloana1 .acum', 'pala_h')"><i class="material-icons">arrow_drop_up</i></div>
                            <div class="inainte"  onclick="click_change('sus', 'h', '.palah .coloana1 .acum', 'pala_h')"></div>
                            <div class="acum"></div>
                            <div class="dupa"  onclick="click_change('j', 'h', '.palah .coloana1 .acum', 'pala_h')"></div>
                            <div class="dupa2" onclick="click_change('j', 'h', '.palah .coloana1 .acum', 'pala_h')"><i class="material-icons">arrow_drop_down</i></div>
                        </div>
                        <div class="coloana2 w33">
                            <div class="inainte2" onclick="click_change('sus', 'min', '.palah .coloana1 .acum', 'pala_min')"><i class="material-icons">arrow_drop_up</i></div>
                            <div class="inainte"  onclick="click_change('sus', 'min', '.palah .coloana1 .acum', 'pala_min')"></div>
                            <div class="acum"></div>
                            <div class="dupa"   onclick="click_change('j', 'min', '.palah .coloana1 .acum', 'pala_min')"></div>
                            <div class="dupa2"  onclick="click_change('j', 'min', '.palah .coloana1 .acum', 'pala_min')"><i class="material-icons">arrow_drop_down</i></div>
                        </div>
                        <div class="coloana3 w33">
                            <div class="inainte2"></div>
                            <div class="inainte"></div>
                            <div class="acum"></div>
                            <div class="dupa" onclick="change_t('.palah .coloana3 .acum', 'pala_t')"></div>
                            <div class="dupa2" onclick="change_t('.palah .coloana3 .acum', 'pala_t')"><i class="material-icons">arrow_drop_down</i></div>
                        </div>
                    </div>

                </div>
                <div class="col s6">
                    <div class="row mt-4">
                        <div class="col s8">
                            <div class="data-ym">
                                {{$ym}}
                            </div>
                        </div>
                        <div class="col s4">
                            <div class="nextprev-date">
                                <a href="/calendar-staff/{{$prev}}"><i class="material-icons">navigate_before</i></a> <a href="/calendar-staff/{{$next}}"><i class="material-icons">navigate_next</i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="blablabla">
                        <li>L</li>
                        <li>Ma</li>
                        <li>Mi</li>
                        <li>J</li>
                        <li>V</li>
                        <li>S</li>
                        <li>D</li>
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

<div class="zilelemele d-none">
    <span class="d-none setari" numaratoare="0" tip="calendar" categorie=""></span>
</div>

<script>
    function adauga_data(cheie_data) {

        $('.' + cheie_data).attr('onclick', 'sterge_data(\'' + cheie_data.toString() + '\')');
        $('.' + cheie_data).addClass('selectat');
        var valoare = $('.' + cheie_data).val();

        var date_vechi = $('.data-users').data('zile');

        date_vechi.push(valoare);
        $('.data-users').data('zile', date_vechi);
        console.log(date_vechi);

    }

    function sterge_data(cheie_data) {

        $('.' + cheie_data).attr('onclick', 'adauga_data(\'' + cheie_data.toString() + '\')');
        $('.' + cheie_data).removeClass('selectat');
        var valoare = $('.' + cheie_data).val();

        var date_vechi = $('.data-users').data('zile');


        const index = date_vechi.indexOf(valoare);
        if (index > -1) {
            date_vechi.splice(index, 1);
        }
        $('.data-users').data('zile', date_vechi);
        console.log(date_vechi);

    }

    function verificari_ora( sus,tip, valoare){
        valoare = parseInt(valoare);
        if(sus == 'sus'){
            if(tip == 'h'){
                if(valoare == '12'){
                    valoare = 1;
                }else{
                    valoare++;
                }
            }else{
                if(valoare == '59'){
                    valoare = 0;
                }else{
                    valoare++;
                }
            }
        } else{
            if(tip == 'h'){
                if(valoare == '1'){
                    valoare = 12;
                }else{
                    valoare--;
                }
            }else{
                if(valoare == '0'){
                    valoare = 59;
                }else{
                    valoare--;
                }
            }
        }
        if(valoare < 10){
            valoare = "0"+valoare;
        }
        return valoare;
    }
    function verificari_t(valoare){
        if(valoare == 'AM'){
            valoare = 'PM';
        } else {
            valoare = 'AM'
        }
        return valoare;
    }
    function change_t(css, atr){
        var valoare = $(css).text();
        $('.ore').attr(atr,verificari_t(valoare));
        ora();
        avem_ora();
    }
    function click_change(sus, tip, css, atr){
        var valoare = $(css).text();
        $('.ore').attr(atr,verificari_ora( sus,tip, valoare));
        ora();
        avem_ora();
    }
    function avem_ora(){
        var ora =  $('.ore').attr('dela_h')+':'+$('.ore').attr('dela_min')+'-'+$('.ore').attr('dela_t')+' pana la '+$('.ore').attr('pala_h')+':'+$('.ore').attr('pala_min')+'-'+$('.ore').attr('pala_t');
        $('.program-selectat').html(ora);
    }
    function ora(){
        //centru
       $('.delah .coloana1 .acum').html($('.ore').attr('dela_h'));
       $('.delah .coloana2 .acum').html($('.ore').attr('dela_min'));
       $('.delah .coloana3 .acum').html($('.ore').attr('dela_t'));

       $('.palah .coloana1 .acum').html($('.ore').attr('pala_h'));
       $('.palah .coloana2 .acum').html($('.ore').attr('pala_min'));
       $('.palah .coloana3 .acum').html($('.ore').attr('pala_t'));

       //sus
       $('.delah .coloana1 .inainte').html(verificari_ora('sus', 'h',$('.ore').attr('dela_h')));
       $('.delah .coloana2 .inainte').html(verificari_ora('sus', 'min',$('.ore').attr('dela_min')));
       $('.delah .coloana3 .inainte').html('');

       $('.palah .coloana1 .inainte').html(verificari_ora('sus', 'h',$('.ore').attr('pala_h')));
       $('.palah .coloana2 .inainte').html(verificari_ora('sus', 'min',$('.ore').attr('pala_min')));
       $('.palah .coloana3 .inainte').html('');
       //jos
       $('.delah .coloana1 .dupa').html(verificari_ora('j', 'h',$('.ore').attr('dela_h')));
       $('.delah .coloana2 .dupa').html(verificari_ora('j', 'm',$('.ore').attr('dela_min')));
       $('.delah .coloana3 .dupa').html(verificari_t($('.ore').attr('dela_t')));

       $('.palah .coloana1 .dupa').html(verificari_ora('j', 'h',$('.ore').attr('pala_h')));
       $('.palah .coloana2 .dupa').html(verificari_ora('j', 'm',$('.ore').attr('pala_min')));
       $('.palah .coloana3 .dupa').html(verificari_t($('.ore').attr('pala_t')));

    }
    ora();
    $('.modal-calendar .close-modal').click(function(){
        $('.modal-calendar').hide();
    });

    function actveaza_tab(id){
        var url = "/calendar-staff/users/"+id;
        $.ajax({
            url: url,
            method: "get"
        }).done(function(response) {
            $('.select-persoana').html(response);
            $('.tabs-calendar .tab a').removeClass('active');
            $('.tabs-calendar .tab-'+id+ ' a').addClass('active');
        })
    }
    function adauga_persoana_html(id){
        var url = "/calendar-staff/user/"+id;
        $.ajax({
            url: url,
            method: "get"
        }).done(function(response) {
            $('.data-users').prepend(response);
        })
    }
    function adauga_persoana(){
        var date_vechi = $('.data-users').data('persoane');
        var valoare_noua = $('.select-person').val();
        date_vechi.push(valoare_noua);
        adauga_persoana_html(valoare_noua);
        $('.data-users').data('persoane', date_vechi);
        console.log(date_vechi);
    }
    function sterge_persoana(id){
        var date_vechi = $('.data-users').data('persoane');

        const index = date_vechi.indexOf(id);
        if (index > -1) {
            date_vechi.splice(index, 1);
        }
        $('.data-users').data('persoane', date_vechi);
        console.log(date_vechi);
        $('.persoana-cu-id-'+id).remove();
    }

    $(document).ready(function () {
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;
        var containerEl = document.getElementById('external-events');
        var calendarEl = document.getElementById('fc-external-drag');
        var checkbox = document.getElementById('drop-remove');


        // initialize the calendar
        // -----------------------------------------------------------------
        var calendar = new Calendar(calendarEl, {
            header: {
            left: 'prev,next today',
            center: 'title',
            right: "dayGridMonth,timeGridWeek,timeGridDay"
            },
            editable: true,
            plugins: ["dayGrid", "timeGrid", "interaction"],
            droppable: true, // this allows things to be dropped onto the calendar
            defaultDate: '{{$ym}}-01',
            resources: [
                { id: 'a', title: 'Room A' },
                { id: 'b', title: 'Room B' }
            ],
            events: [
                @php
                    foreach($programari as $programare){
                        $end = $programare['date'];
                        if($programare['twodays']==1){
                            $end =  date('Y-m-d', strtotime($end . ' +1 day'));
                        }
                        echo "
                            {
                                id: ".$programare['id'].",
                                title: '".get_user($programare['user_id'], 'name')."',
                                start: '".$programare['date']."T".$programare['start_hour']."',
                                end: '".$end."T".$programare['end_hour  ']."',
                                color: '#00bcd4'
                            },
                        ";
                    }
                @endphp

            ],
            drop: function (info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
            }
        });
        calendar.render();
        //   var colorData;
        $('#external-events .fc-event').each(function () {
            // Different colors for events
            $(this).css({ 'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color') });
        });
        var colorData;
        $('#external-events .fc-event').mousemove(function () {
            colorData = $(this).data('color');
        })
        // Draggable event init
        new Draggable(containerEl, {
            itemSelector: '.fc-event',
            eventData: function (eventEl) {
            return {
                title: eventEl.innerText,
                color: colorData
            };
            }
        });
    });
</script>
<style>

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
