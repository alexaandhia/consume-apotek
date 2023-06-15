<?php

namespace App\Http\Libraries;

use Illuminate\Support\Facades\Http;

class BaseApi{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = "http://127.0.0.1:1818";
    }

    private function client()
    {
        return Http::baseUrl($this->baseUrl);
    }

    public function index(String $endpoint, Array $data = [])
    {
        //manggil ke client, lalu ke path yang dari endpoint yang dikirim controllernya
        return $this->client()->get($endpoint, $data);
    }

    public function store(String $endpoint, Array $data = [])
    {
        //manggil ke client, lalu ke path yang dari endpoint yang dikirim controllernya
        return $this->client()->post($endpoint, $data);
    }

    public function edit(String $endpoint, Array $data = [])
    {
        //manggil ke client, lalu ke path yang dari endpoint yang dikirim controllernya
        return $this->client()->get($endpoint, $data);
    }

    public function update(String $endpoint, Array $data = [])
    {
        //manggil ke client, lalu ke path yang dari endpoint yang dikirim controllernya
        return $this->client()->patch($endpoint, $data);
    }

    public function destroy(String $endpoint, Array $data = []){
        return $this->client()->delete($endpoint, $data);
    }

    public function trash(String $endpoint, Array $data = []){
        return $this->client()->get($endpoint, $data);
    }
    
    public function restore(String $endpoint, Array $data = []){
        return $this->client()->get($endpoint, $data);
    }
    
    public function permanentDelete(String $endpoint, Array $data = []){
        return $this->client()->get($endpoint, $data);
    }
}