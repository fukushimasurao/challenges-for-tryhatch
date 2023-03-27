<div>
    <h1>Google検索</h1>
    <input type="text" wire:model="query" placeholder="文字を入力してください">
    <button wire:click="search">検索</button>

    @error('query')
    <span class="error">{{ $message }}</span>
    @enderror

    @if (!empty($results))
        <ul>
            @foreach ($results as $result)
                <li>
                    <h2><a href="{{ $result['link'] }}" target="_blank">{{ $result['title'] }}</a></h2>
                    <p>{{ $result['snippet'] }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <ul>
            <h2>一致する情報は見つかりませんでした。</h2>
        </ul>
    @endif

</div>
