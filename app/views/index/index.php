<div class="col-lg-12" style="padding: 0px !important;">
    <div class="row" id="style-selector-control">
        <input id="origin-input" class="controls col-lg-4" style="height: 30px; margin-left: 10px; margin-right: 10px;" type="text" placeholder="Enter an origin location">

        <input id="destination-input" class="controls col-lg-4" style="height: 30px;" type="text" placeholder="Enter a destination location">

        <div id="mode-selector" class="controls" style="width: 30%; margin-left: -5%; float: left;">
            <input style="margin-right: 1%;" type="radio" name="type" id="changemode-walking" checked="checked">
            <span style="opacity: 1 !important; color: #fff; font-size: 16px; font-weight: 800; margin-right: 1%;">Walking</span>

            <input style="margin-right: 1%;" type="radio" name="type" id="changemode-transit">
            <span style="opacity: 1 !important; color: #fff; font-size: 16px; margin-right: 1%; font-weight: 800;">Transit</span>

            <input style="margin-right: 1%;" type="radio" name="type" id="changemode-driving" >
            <span style="opacity: 1 !important; color: #fff; font-size: 16px; margin-right: 1%; font-weight: 800;">Driving</span>
            <div style="display: none; position: absolute; top: 250px; color: #fff; font-size: 14px; font-weight: 800; right: 10px; padding: 20px; background-color: #000; opacity: 0.9; z-index: 9999;" id="dvDistance">
            </div>
        </div>
    </div>

    <div style="width: 100%; height: 600px;" id="map"></div>

</div>
<script>
    window.onresize = function(event) {
        resizeDiv();
    };

    $(document).ready(function(){
        resizeDiv();
    });

    function resizeDiv() {
        vpw = $(window).width();
        vph = $(window).height()-53;
        $('#map').css({'height': vph + 'px'});
    }

</script>
