
<div id="UserListingMap" style="width:100%;height:550px"></div>

<script>
    $(document).ready(function() {
        var mapCanvas = document.getElementById("UserListingMap");
        var mapOptions = {
            center: new google.maps.LatLng(20.5937,78.9629),
            zoom:5
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
    });
</script>