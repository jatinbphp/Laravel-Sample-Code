@if(count($costs) > 0)
<tr role="row" class="odd">
    <th class="center">
        <label  class=" k-checkbox-fill">
            <input type="checkbox" class="filled-in main_checkbox" />
            <span class=""></span>
        </label>
    </th>
    <th class="center" >{{trans('message.time')}}</th>
    <th class="center" >{{trans('message.date')}}</th>
    <th class="center" >{{trans('message.price')}}</th>
    <th class="center" >{{trans('message.description')}}</th>
    <th class="center" >{{trans('message.actions')}}</th>
</tr>
@foreach($costs as $cost)
<tr role="row" class="odd">
    <td class="row-counter center"> </td>
    <td class="center" >{{$cost->time}}</td>
    <td class="center">{{ date('d-m-Y',strtotime($cost->date))}}</td>
    <td class="center">{{$cost->price}} {{setting('site.valuta_caserie')}}</td>
    <td class="center">{{$cost->description}}</td>
    <td class="center">
        <a title="{{trans('message.edit')}} {{trans('message.expenses')}}" class="edit-icon edit_button"
        value="{{$cost->id}}"><span><i class="material-icons">edit</i></span></a>
    </td>
</tr>
@endforeach
@endif
