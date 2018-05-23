var map;
function tml_run_map(){   
var location = new google.maps.LatLng( TmlMapObj.lat, TmlMapObj.lng );
var map_options = {
    zoom: +TmlMapObj.zoom-1,
    center: location,
    scrollwheel: TmlMapObj.enablescrollwheel,
    disableDefaultUI: TmlMapObj.disablecontrols,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
map = new google.maps.Map(document.getElementById('tml-google-map1'), map_options);

var marker1location = new google.maps.LatLng( TmlMapObj.marker1lat, TmlMapObj.marker1lng );
var marker1 = new google.maps.Marker({
position: marker1location,
title: TmlMapObj.marker1title,
map: map
});

//var marker2location = new google.maps.LatLng( TmlMapObj.marker2lat, TmlMapObj.marker2lng );
//var marker2 = new google.maps.Marker({
//position: marker2location,
//title: TmlMapObj.marker2title,
//map: map
//});
}
tml_run_map();