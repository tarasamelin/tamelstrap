var map;
function tml_run_map(){    
    var styledMapType = new google.maps.StyledMapType(
[{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}]
    ,{name: 'Styled Map'});
    
    var location = new google.maps.LatLng( TmlMapObj.lat, TmlMapObj.lng);
    var map_options = {
        zoom: +TmlMapObj.zoom-1,
        center: location,
        scrollwheel: TmlMapObj.enablescrollwheel,
        disableDefaultUI: TmlMapObj.disablecontrols,
//        mapTypeId: google.maps.MapTypeId.ROADMAP
        mapTypeControlOptions: { mapTypeIds: [ 'roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map' ] }
    }
    map = new google.maps.Map(document.getElementById('tml-google-map'), map_options);
    var marker = new google.maps.Marker({
    position: location,
    map: map
    });
    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');
}
tml_run_map();
