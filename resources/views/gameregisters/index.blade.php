@extends('layouts.app')

@section('content')
    <h1>ゲーム登録</h1>



<form action="/games/register" method="POST">
    {{ csrf_field() }}
    <div>
        <label>ゲーム名</label><br>
        <input type="text" name="name" />
    </div>
    <div>
        <label>内容</label><br>
        <textarea name="content" cols="136" rows="10"></textarea>
    </div>
    <div>
        {!! Form::open(['route' => ['search.get'], 'method' => 'get']) !!}
            {!! Form::submit('登録', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    </div>
</form>
@endsection