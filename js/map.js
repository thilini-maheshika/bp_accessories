
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("map"),mapProp);
}


<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>