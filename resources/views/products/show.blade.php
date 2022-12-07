@component('layouts.app')
    <div class="text-center m-12 p-5">
        <div class="w-2/5 mx-auto">
            <p class="mb-8 border-black border">商品名<br> {{ $product->name }}</p>
            <img class="mb-8 border-black border" src="../upload/{{ $product->image_path }}">
            <p class="mb-8 border-black border">商品概要<br>{{ $product->description }}</p>
            <p class="mb-8 border-black border">カテゴリー: {{ $product->category_name }}</p>
            <p class="mb-8 border-black border">価格: {{ number_format($product->price) }}円</p>
            <p class="mb-8 border-black border">出品者: {{ $product->user->name }}</p>
        </div>
        @if ($product->user_id === Auth::id())
            <div class="flex justify-center">
                <a href="{{ route('products.edit', $product) }}"><button
                        class="mb-5 bg-blue-500 rounded font-medium mx-2 px-4 py-2 text-white" type="submit"><span
                            class="fas fa-user-edit"></span>編集</button></a>
                <form action="{{ route('products.destroy', $product) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="mb-5 bg-red-500 rounded font-medium px-4 py-2 text-white" type="submit"><span
                            class="fas fa-trash"></span>削除</button>
                </form>
            </div>
        @else
            <div class="flex justify-center gap-2">
                <div>
                    <a class="bg-green-700 rounded px-4 py-2 text-white fab fa-shopify"
                        href="{{ route('products.index') }}">購入する</a>
                </div>

                @if ($product->users()->where('user_id', Auth::id())->exists())
                    <div class="col-md-3">
                        <form action="{{ route('unfavorites', $product) }}" method="POST">
                            @csrf
                            <input type="submit" value="🤍({{ $product->users()->count() }})"
                                class="fas bg-red-500 rounded px-4 py-2 text-white">

                        </form>
                    </div>
                @else
                    <div class="col-md-3">
                        <form action="{{ route('favorites', $product) }}" method="POST">
                            @csrf
                            <input type="submit" value="❤️({{ $product->users()->count() }})"
                                class="fas btn bg-blue-500 rounded font-medium px-4 py-2 text-white">
                        </form>
                    </div>
                @endif
            </div>
        @endif


        <div class="mt-12">
            <p class="my-3">商品へのコメント: ({{ $product->comments()->count() }})</p>
            @foreach ($comments as $comment)
                <hr>
                <p class="my-5">{{ $comment->comment }}</p>
                <hr>
            @endforeach
            <div class="my-12">
                <a href="{{ route('comments.show', $product) }}"><button
                        class="bg-blue-500 rounded font-medium px-4 py-2 text-white"><span
                            class="fas fa-comment-alt"></span>全てのコメントを見る</button></a>
                <a class="bg-red-600 rounded font-medium px-4 py-2 text-white"
                    href="{{ route('products.index') }}">一覧画面に戻る</a>
            </div>

        </div>
    </div>
@endcomponent
