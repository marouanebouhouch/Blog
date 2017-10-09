@if(session()->has('success') or session()->has('status'))
    <div class="card-panel teal lighten-2 white-text z-depth-3">
        <b>Success : </b>
        {{ session('success') }}
        {{ session('status') }}
    </div>
@endif
@if(count($errors)>0)
    <div class="card-panel white-text red lighten-1 z-depth-3">
        <ul>
            <b>Errors : </b>
        @foreach($errors->all() as $error)
             <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif
