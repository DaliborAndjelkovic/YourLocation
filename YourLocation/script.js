let map;

if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
    function loadGoogleMapsScript() {
        const script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyCHksoiJjnL4DIV2kruTb_0-5eahWkeyks&libraries=places&callback=initMap`;
        document.head.appendChild(script);
    }

    loadGoogleMapsScript();
} else {
    initMap();
}

function initMap() {
    map = new google.maps.Map(document.getElementById('mapContainer'), {
        center: { lat: 0, lng: 0 },
        zoom: 2
    });
}

function submitUserDetails(event) {
    event.preventDefault();
    addUser();
}

function addUser() {
    const streetNumber = document.getElementById('streetNumber').value;
    const city = document.getElementById('city').value;
    const country = document.getElementById('country').value;

    const address = `${streetNumber}, ${city}, ${country}`;

    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: address }, function (results, status) {
        if (status === 'OK' && results.length > 0) {
            const userLocation = {
                lat: results[0].geometry.location.lat(),
                lng: results[0].geometry.location.lng()
            };

            map.setCenter(userLocation);
            map.setZoom(10);

            const marker = new google.maps.Marker({
                position: userLocation,
                map: map,
                title: 'New User Location'
            });
        } else {
            console.error('Geocoding failed:', status);
        }
    });
}