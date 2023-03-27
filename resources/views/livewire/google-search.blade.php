<div>
    <div id="services" class="section relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">
        <div class="container xl:max-w-6xl mx-auto px-4">
            <header class="text-center mx-auto mb-12 lg:px-20">
                <h2 class="text-2xl leading-normal mb-2 font-bold text-black">Google検索</h2>
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">現在、検索結果は上位10件までとなっています。</span>
                </div>
            </header>
            <div class="max-w-2xl mx-auto mb-7">
                <div class="flex justify-center items-center xs:flex-none">
                    <form class="flex items-center" wire:submit.prevent="search">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" wire:model="query"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="文字を入力してください。">
                        </div>
                        <button wire:click="search"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                @error('query')
                    <div class="flex justify-center items-center xs:flex-none">
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">{{ $message }}</span></p>
                    </div>
                @enderror
                <div wire:loading.delay wire:target="search">
                    <p>検索中...</p>
                </div>
            </div>

            <div class="max-w-2xl mx-auto">
                @if (!empty($results))
                    <div class="mb-3">
                        <p class="italic">検索文字 : {{ $searchWords }} </p>
                    </div>
                    <ul>
                        @foreach ($results as $result)
                            <li class="mb-10">
                                <h2 class="text-4xl font-bold dark:text-white"><a href="{{ $result['link'] }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        target="_blank">{{ $result['title'] }}</a></h2>
                                <p>{{ $result['snippet'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                @elseif($results === NULL)
                    <p>検索結果はありません。</p>
                @endif


            </div>


        </div>
    </div>
</div>
