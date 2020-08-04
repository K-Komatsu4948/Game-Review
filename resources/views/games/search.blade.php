@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="text-left my-4">
            <h3 class="brown border p-2">ゲーム検索</h3>
            {!! Form::open(['route' => 'search.get', 'method' => 'get']) !!}
            <div class="form-group">
                <label>ゲーム名</label><br>
                <input type="text" name= "name" class="text-align: left" rows="10" cols="10">
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            　　{!! Form::close() !!}
            </div>
            <div class="container">
                @if(!empty($data))
                    <div class="my-2 p-0">
                        @foreach($data as $game)
                            <div class="row py-2 border-bottom tefxt-left">
                                <thead>
                                    <tr>
                                        <th class="w-50">{{ $game->name }}</th>
                                        <th class="w-30">{{ $game->score }}</th>
                                        <th class="w-20">{!! link_to_route('reviews.create', '投稿', ['game' => $game->id]) !!}</th>
                                    </tr>
                                </thead>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection