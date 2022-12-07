<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    ようこそ、フリマへ<br>
                    会員登録ありがとうございます。<br>
                    当サイトは誰でも簡単に安心して使用できる
                    フリマサイトになっております。<br>
                    お気に入りのものを探してみよう!
                    <br>
                    <a class="text-red-500" href="{{ route('products.index')}}">フリマを始める方はこちらをクリック</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
