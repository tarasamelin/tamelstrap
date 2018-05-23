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

var map2;
function tml_run_map2(){   
var location2 = new google.maps.LatLng( TmlMapObj2.lat, TmlMapObj2.lng );
var map_options2 = {
    zoom: +TmlMapObj2.zoom-1,
    center: location2,
    scrollwheel: TmlMapObj2.enablescrollwheel,
    disableDefaultUI: TmlMapObj2.disablecontrols,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
map2 = new google.maps.Map(document.getElementById('tml-google-map2'), map_options2);

var marker1location2 = new google.maps.LatLng( TmlMapObj2.marker1lat, TmlMapObj2.marker1lng );
var marker12 = new google.maps.Marker({
position: marker1location2,
title: TmlMapObj2.marker1title,
map: map2
});

}
tml_run_map2();