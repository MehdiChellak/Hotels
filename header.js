// source: https://github.com/pointhi/leaflet-color-markers
var greenIcon = new L.Icon({
  iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});
L.Routing.control({
  waypoints: [
    L.latLng(57.74, 11.94),    // startmarker
    L.latLng(57.6792, 11.949) // endmarker
  ],
  createMarker: function(i, wp, nWps) {
    if (i === 0 || i === nWps - 1) {
      // here change the starting and ending icons
      return L.marker(wp.latLng, {
        icon: greenIcon // here pass the custom marker icon instance
      });
    } else {
      // here change all the others
      return L.marker(wp.latLng, {
        icon: greenIcon
      });
    }
  }
}).addTo(map);