@if (count($games) > 0)
    <ul class="list-unstyled">
        @foreach ($games as $game)
            <li class="media">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $game->name }}
                    </div>
                    <div>
                        {{--　マイレビュー一覧へのリンク --}}
                        <p>{!! link_to_route('games.show', 'MY review', ['user' => $game->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif