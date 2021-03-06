<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">
        <x-flash-message :message="session('notice')" />

        <article class="mb-2">
            <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl">
                {{ $post->title }}</h2>
            <h3>{{ $post->user->name }}</h3>
            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                <span
                    class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                {{ $post->created_at }}
            </p>
            <img src="{{ $post->image_url }}" alt="" class="mb-4">
            <p class="text-gray-700 text-base">{!! nl2br(e($post->body)) !!}</p>
        </article>


        <span>
            {{-- <img src="{{ asset('img/likebutton.png') }}" width="30px"> --}}

            <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
            @if (Auth::check())
                @if (!empty($like))
                    <!-- 「いいね」取消用ボタンを表示 -->

                    {{-- <a href="{{ route('posts.likes.destroy', [$post,$like]) }}">
                        <button type="button" class="btn btn-warning">お気に入解除</button><br>
                    </a> --}}
                    <form action="{{ route('posts.likes.destroy', [$post, $like]) }}" method="POST"
                        class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-pink-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-100">お気に入解除</button><br><br>
                    </form>
                    <b>お気に入り数:</b>
                    <!-- 「いいね」の数を表示 -->
                    <span class="badge">
                        <b>{{ $post->likes->count() }}</b>
                    </span>

                @else
                    <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                    {{-- <a href="{{ route('posts.likes.store', $post) }}" class="btn btn-secondary btn-sm">
                        <button type="button" class="btn btn-warning">お気に入登録</button><br>
                    </a> --}}
                    <form action="{{ route('posts.likes.store', $post) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="bg-pink-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-100">お気に入登録</button><br><br>
                    </form>
                    <b>お気に入り数:</b>
                    <!-- 「いいね」の数を表示 -->
                    <span class="badge">
                        <b>{{ $post->likes->count() }}</b>
                @endif
        </span>

        @endif

        </span>


        <div class="flex flex-row text-center my-4">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                </form>
            @endcan
        </div>
    </div>
</x-app-layout>
