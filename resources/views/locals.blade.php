<!-- resources/views/books.blade.php -->
<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <form action="{{ route('book_index') }}" method="GET" class="w-full max-w-lg">
                <x-button class="bg-gray-100 text-gray-900"><a href="/">{{ __('Mypage') }}</a></x-button>
                <x-button class="bg-gray-100 text-gray-900"><a href="index2">全体情報</a></x-button>
            </form>
        </h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="flex bg-gray-100">

        <!--左エリア[START]--> 
        <div class="text-gray-700 text-left px-4 py-4 m-2">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500 font-bold">
                    辺境を追加する
                </div>
            </div>


            <!-- 本のタイトル -->
            <form action="{{ url('local_store') }}" method="POST" class="w-full max-w-lg">
                @csrf
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       Local name
                      </label>
                      <input name="local_name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    <!-- カラム２ -->
                    <div class="w-full md:w-1/1 px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Local Explanation
                      </label>
                      <input name="local_explain" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                    <!-- カラム３ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Local picture URL
                      </label>
                      <input name="local_picture" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                  </div>
                  <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">送信</x-button>
                      </div>
                   </div>
            </form>
        </div>
        <!--左エリア[END]--> 
    
    
    <!--右側エリア[START]-->
    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
         @if (count($locals) > 0)
            @foreach ($locals as $local)
                <x-collection2 id="{{ $local->id }}" img="{{ $local->local_picture}}" explain="{{$local->local_explain}}">{{ $local->local_name }}</x-collection>
            @endforeach
        @endif
    </div>
    <!--右側エリア[[END]-->       

</div>
 <!--全エリア[END]-->

</x-app-layout>