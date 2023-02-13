<?php
namespace Pine\PineGooglemapMarkers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Pine\PineGooglemapMarkers\View\Components\PinegoogleMapMarkers;

class PineGmMarkersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'pine-googlemap-markers');
        Blade::component('pine-googlemap-markers', PinegoogleMapMarkers::class);
    }

    public function register()
    {
    }
}
