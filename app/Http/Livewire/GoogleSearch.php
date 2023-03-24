<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class GoogleSearch extends Component
{
    public $query;
    public $results = [];

    public function search()
    {
        if (!empty($this->query)) {
            $apiKey = config('app.api_key');
            $searchEngineId = config('app.search_engine_id');
            $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$searchEngineId}&q={$this->query}";
            $response = Http::get($url);
            $this->results = $response->json()['items'];
        } else {
            $this->results = [];
        }
    }

    public function render()
    {
        return view('livewire.google-search');
    }
}
