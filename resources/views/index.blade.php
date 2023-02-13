<div id="map" style="height: 1200px; width: full">
</div>
<script>
    var locations = @json($locations);
    var styleWindowInfo = @json($styleWindowInfo);
    var styleTitle = @json($styleTitle);
    var styleContent = @json($styleContent);
    var urlImage = @json($urlImage);

    function buildWindowContent(location) {
        return `
        <div style="${styleWindowInfo}">
            <div style="${styleTitle}">${location.title} 
            </div>
            <br>
            <div style="${styleContent}">${location.content != "" ? location.content:  location.address}
            </div>
        </div>
        `;
    }

    function setMap(infowindow, google, map, geocoder, locations, index, isSetCenter) {

        if (locations[index]) {
            geocoder.geocode({
                address: `${locations[index].address}`
            }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    var p = results[0].geometry.location;
                    var lat = p.lat();
                    var lng = p.lng();
                    var latLng = new google.maps.LatLng(
                        lat,
                        lng
                    );


                    var marker = new google.maps.Marker({
                        icon: urlImage,
                        map: map,
                        position: latLng,
                    });

                    if (!isSetCenter) {

                        map.setCenter(latLng);
                        isSetCenter = true;
                        let content = buildWindowContent(locations[index]);
                        infowindow.setContent(content);
                        infowindow.open(map, marker);

                    }
                    google.maps.event.addListener(marker, 'click', (function(marker, index) {

                        function buildWindowContent(location) {
                            return `
                            <div style="${styleWindowInfo}">
                                <div style="${styleTitle}">${locations[index].title} 
                                </div>
                                <br>
                                <div style="${styleContent}">${locations[index].content != "" ? locations[index].content:  locations[0].address}
                                </div>
                            </div>
                            `;
                        }
                        return function() {
                            let content = buildWindowContent(locations[index]);
                            infowindow.setContent(content);
                            infowindow.open(map, marker);
                        }
                    })(marker, index));

                    setTimeout(() => {
                        setMap(infowindow, google, map, geocoder, locations, index + 1, isSetCenter);
                    }, 100);
                } else if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                    setTimeout(() => {
                        setMap(infowindow, google, map, geocoder, locations, index, isSetCenter);
                    }, 100);
                } else {
                    setTimeout(() => {
                        setMap(infowindow, google, map, geocoder, locations, index + 1, isSetCenter);
                    }, 100);
                }
            })
        }
    }

    function initMap() {

        var mapOptions = @json($mapOptions);

        var mapElement = document.getElementById('map');
        map = new google.maps.Map(mapElement, mapOptions);
        var infowindow = new google.maps.InfoWindow();
        const geocoder = new google.maps.Geocoder();
        setMap(infowindow, google, map, geocoder, locations, 0, false);

    }
</script>
<script async src="<?php echo $key; ?>">
</script>