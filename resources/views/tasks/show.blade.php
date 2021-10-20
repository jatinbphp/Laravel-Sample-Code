@extends('layouts.app')

@section('content')
@include('tasks.program_photo')
@include('tasks.upload_photo')


<h3>{{trans('message.list_of_tasks_today')}}</h3>

<div id="card-widgets">
   <div class="row">
      <div class="col s12 m6 l4">
         <ul id="task-card" class="collection with-header animate fadeLeft">

            <li class="collection-header cyan">
               @foreach($tasks as $task)

               <h5 class="task-card-title mb-3">{{$task->description}}</h5>
               <p class="task-card-date"> @if($task->hour) {{$task->hour}} @endif</p>

               @if($task->type=='interview')
                  <button class=" btn purple-btn interview_page" id="{{$task->id}}" value="{{$task->element_id}}">{{trans('message.go_to_the_interview')}}</button>
               @endif

               @if($task->type=="photo_program")
                  <button class=" btn purple-btn program_photo" id="{{$task->id}}" value="{{$task->element_id}}">{{trans('message.schedule_the_meeting')}}</button>
               @endif

               @if($task->type=="photo_meeting")
                  ({{$task->element_id}})
                  <button value="{{$task->element_id}}" id="{{$task->id}}" class="btn btn-info upload_photo">{{trans('message.upload_pictures')}}</button>
               @endif
               @endforeach
            </li>

         </ul>
      </div>
   </div>
</div>




<script>
   $(document).ready(function() {

      $('.interview_page').click(function() {
         window.location.href = "/interviews";
      });

      $('.program_photo').click(function() {
         $("#task_id").attr('value', $(this).attr('id'))
         $("#element_id").attr('value', $(this).attr('value'))
         $("#modal-program_photo").toggleClass('hidden');
      });
      $(".upload_photo").click(function() {
         $("#element_name").attr('value', $(this).attr('value'));
         $("#task_id_upload").attr('value', $(this).attr('id'));
         $("#modal-upload_photo").toggleClass('hidden');

      });

   });
</script>
@endsection
