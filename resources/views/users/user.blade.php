@extends('layouts.app')

@section('content')
   @if (count($reviews) > 0)
    <ul class="list-unstyled">
        @foreach ($reviews as $review)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($micropost->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <span class="text-muted">posted at {{ $review->created_at }}</span>
                </div>
                <div>
                    {{-- 投稿内容 --}}
                    <p class="mb-0">{!! nl2br(e($review->review)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $review->user_id)
                        {{-- 投稿削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $reviews->links() }}
@endif
@endsection