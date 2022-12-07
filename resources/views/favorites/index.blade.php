@component('layouts.app')
    <div>
        <p class="text-2xl text-center text-gray-700 my-8">いいね一覧</p>
        <div class="w-1/2 m-auto">

            <table class="border-solid border border-black">
                <tr>
                    <th class="p-3">商品</th>
                    <th>商品名</th>
                    <th>価格</th>
                </tr>
                @foreach ($users as $user)
                    @if ($user->id === Auth::id())
                        @foreach ($user->favorites as $favorite)
                            <tr class="border-solid border border-black">
                                @foreach ($products as $product)
                                    <td class="mt-4 w-1/3 p-8"><a href="{{ route('products.show', $product) }}"><img
                                                src="../../upload/{{ $favorite->image_path }}"></a></td>
                                    <td class="text-center"><a
                                            href="{{ route('products.show', $product) }}">{{ $favorite->name }}</a></td>
                                @break;
                            @endforeach
                            <td class="text-center">{{ number_format($favorite->price) }}円</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </table>
    </div>
</div>
@endcomponent
