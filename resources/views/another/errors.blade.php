@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('success'))
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
     <script>
    console.log('hi');
    M.toast({html: "@php echo Session::get('success') ;@endphp " });
    </script>
@endif
@if (Session::has('error'))

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
     <script>
    console.log('hi');
    M.toast({html: "@php echo Session::get('error') ;@endphp " });
    </script>

@endif
