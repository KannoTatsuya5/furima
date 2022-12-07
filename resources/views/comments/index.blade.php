@component('layouts.app')
    <div class="text-center w-3/5 m-auto">
        <p class="text-3xl my-12">コメント一覧</p>
        @foreach ($comments as $comment)
            <div class="mb-8 p-3 m-auto">
                @if (Auth::id() === $comment->user_id)
                    <div class="bg-gray-200 text-left w-1/2 ml-96 rounded-2xl p-5">
                        <p class="text-2xl">{{ $comment->comment }}</p>
                        <p class="text-xs text-xs text-red-500">あなた - {{ $comment->updated_at }}</p>
                    </div>
                @else
                    <div class="bg-gray-200 text-left w-1/2 rounded-2xl p-5">
                        <p class="text-2xl">{{ $comment->comment }}</p>
                        <p class="text-xs">{{ $comment->user->name }}- {{ $comment->updated_at }}</p>
                    </div>
                @endif
            </div>
        @endforeach
        <div class="pb-12">
            <form action="{{ route('comments.store', $product) }}" method="post">
                @csrf
                <textarea class="rounded-2xl" type="text" name="comment" rows="3" cols="95"></textarea>
                <br>
                <button type="submit"
                    class="bg-blue-500 rounded font-medium px-4 py-2 text-white mb-5 mt-2">コメントをする</button>
            </form>
            <a class="bg-blue-600 rounded font-medium px-4 py-2 text-white"
                href="{{ route('products.show', $product) }}">商品詳細画面に戻る</a>
            <a class="bg-red-600 rounded font-medium px-4 py-2 text-white"
                href="{{ route('products.index') }}">一覧画面に戻る</a>
        </div>
    </div>
@endcomponent
