 @component('layouts.app')
     <div class="mt-4 w-2/3 m-auto">
         <a class="m-8 text-red-500" href="{{ route('products.create') }}">商品を出品する</a>
         <a class="m-8 text-red-500" href="{{ route('favorites.index') }}">いいね一覧</a>

         <div class="flex flex-wrap mt-3 text-center">
             @foreach ($products as $product)
                 <div class="w-1/3 mb-14 pl-3">
                     @if ($product->image_path)
                         <div class="m-3 h-5/6">
                             <a href="{{ route('products.show', $product) }}"><img
                                     src="upload/{{ $product->image_path }}"></a>
                         </div>
                     @endif
                     <a href="{{ route('products.show', $product) }}">
                         <p class="text-sm text-center">{{ $product->name }}</p>
                     </a>
                     <p class="text-sm text-center">{{ number_format($product->price) }}円</p>
                 </div>
             @endforeach
         </div>
     </div>
 @endcomponent
