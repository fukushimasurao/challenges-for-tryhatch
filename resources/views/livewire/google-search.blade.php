<div>
    <h1>検索</h1>
    <input type="text" wire:model="query" placeholder="文字を入力してください">
    <button wire:click="search">検索</button>

    @if (!empty($results))
        <ul>
            @foreach ($results as $result)
                <li>
                    <h2><a href="{{ $result['link'] }}" target="_blank">{{ $result['title'] }}</a></h2>
                    <p>{{ $result['snippet'] }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
