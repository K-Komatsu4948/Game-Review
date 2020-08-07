@extends('layouts.app')

@section('content')

    <h1>レビュー投稿</h1>
{!! Form::open(['route' => 'reviews.post', 'method' => 'post', ]) !!}
    {{ csrf_field() }}
    <div>
        {{ Form::label('ゲーム名') }}
        {{ Form::hidden('game_id', $game->id,  ['id' => 'game_id']) }}
        {{ Form::text('game',  $game->name) }}
    </div>
    <div>
        <label>レビュー</label></label><br>
        <textarea name= "content" rows="10" cols="130"></textarea>
        <div class="form-check">
            {{ Form::radio('score', '1', true, ['id' => 'exampleRadios', 'class' => 'form-check-input']) }}
            {{ Form::label('score-one', '☆', ['class' => 'form-check-label']) }}
        </div>
        <div class="form-check">
            {{ Form::radio('score', '2', true, ['id' => 'exampleRadios', 'class' => 'form-check-input']) }}
            {{ Form::label('score-two', '☆☆', ['class' => 'form-check-label']) }}
        </div>
        <div class="form-check">
            {{ Form::radio('score', '3', true, ['id' => 'exampleRadios', 'class' => 'form-check-input']) }}
            {{ Form::label('score-three', '☆☆☆', ['class' => 'form-check-label']) }}
        </div>
        <div class="form-check">
            {{ Form::radio('score', '4', true, ['id' => 'exampleRadios', 'class' => 'form-check-input']) }}
            {{ Form::label('score-four', '☆☆☆☆', ['class' => 'form-check-label']) }}
        </div>
        <div class="form-check">
            {{ Form::radio('score', '5', true, ['id' => 'exampleRadios', 'class' => 'form-check-input']) }}
            {{ Form::label('score-five', '☆☆☆☆☆', ['class' => 'form-check-label']) }}
        </div>
        <div>
            {!! Form::submit('送信', ['class' => "btn btn-primary btn-block"]) !!}
        </div>
    </div>
{!! Form::close() !!}
@endsection