<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class GoogleSearch extends Component
{
    public $query;
    public $results = [];

    protected $rules = [
         'query' => 'required|string|min:4|max:255',
    ];

    public function search()
    {
        $this->validate();

        $apiKey = config('app.api_key');
        $searchEngineId = config('app.search_engine_id');
        $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$searchEngineId}&q={$this->query}";
        $response = Http::get($url);
        $this->results = $response->json()['items'];
    }

    public function render()
    {
        return view('livewire.google-search');
    }
}
