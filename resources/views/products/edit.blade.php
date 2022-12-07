@component('layouts.app')
    <form action="{{ route('products.update', $product) }}" enctype="multipart/form-data". method="post">
        @csrf
        @method('PATCH')
        <div class="mt-10 mx-48 text-center">
            <div class="mb-4">
                <label for="name">商品名</label>
                <input class="w-full text-center" type="text" name="name" id="name" value="{{ $product->name }}">
            </div>
            <div class="mb-4">
                <label for="description">商品概要</label>
                <textarea class="w-full" type="text" name="description" id="description" rows="8">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price">価格</label>
                <input class="w-full" type="text" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="mb-4">
                <label for="category_name">カテゴリー</label>
                <input class="w-full" type="text" id="category_name" name="category_name"
                    value="{{ $product->category_name }}">
            </div>
            <div class="mb-4">
                <label for="image_path">商品の画像</label>
                <input type="file" name="image_path" id="image_path" class="form-control" name="image_path">
                {{-- <p><img src="../../upload/{{ $product->image_path }}"></p> --}}
            </div>
            <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">出品する</button>
        </div>
    </form>
@endcomponent
