<?php

namespace Pine\PineGooglemapMarkers\View\Components;

use Illuminate\View\Component;

class PinegoogleMapMarkers extends Component
{
    public $locations;
    public $styleWindowInfo;
    public $styleTitle;
    public $styleContent;
    public $urlImage;
    public $key;
    public $mapOptions;
    public function __construct($locations, $key, $mapOptions, $styleWindowInfo = '', $styleTitle = '', $styleContent = '', $urlImage = '')
    {
        $this->locations = $locations;
        $this->styleWindowInfo = $styleWindowInfo;
        $this->styleTitle = $styleTitle;
        $this->styleContent = $styleContent;
        $this->urlImage = $urlImage;
        $this->key = $key;
        $this->mapOptions =  $mapOptions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {



        return view('pine-googlemap-markers::index');
    }
}
