<select class="select-person browser-default" onchange="adauga_persoana()">
    <option value="square">Adauga persoana</option>
    @foreach ($checks as $user)
        <option value="{{$user->id}}">{{$user->real_name}}({{$user->name}})</option>
    @endforeach
</select>
