
    function initialize() {
        var pickup1 = document.getElementById('pickup-one');
        var drop1 = document.getElementById('drop-one');


        var options = {componentRestrictions: {country: 'in'}};

        new google.maps.places.Autocomplete(pickup1, options);
        new google.maps.places.Autocomplete(drop1, options);
    }


google.maps.event.addDomListener(window, 'load', initialize);
