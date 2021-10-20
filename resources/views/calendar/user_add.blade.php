<a class="person-info selected persoana-cu-id-{{$user->id}}" style="position: relative">
    <div class="avatar">
        <img class="responsive-img circle" src="/img/andreea-ionescu.png" alt="">
    </div>
    <div class="person-details">
        <h6 >{{$user->real_name}}({{$user->name}}) <i class="material-icons" onclick="sterge_persoana({{$user->id}})" style="position: absolute; right: 6px;top: 10px;color: #e86565;">delete</i></h6>
        <p class="program-selectat"></p>
    </div>
</a>