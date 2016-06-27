<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@if (Auth::check())
    <div class="container">
        @foreach ($users as $user)
            <li>{{ $user->name="hola"}}</li><br/>
        @endforeach
    </div>
@else
    <script>
        alert("Debe iniciar sesión primero.");
    </script>

    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> This alert box could indicate a successful or positive action.
    </div>
@endif