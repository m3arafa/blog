@extends('layouts.app')

@section(('content'))
    <!-- Contact Container -->
    <div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
        <div class="w3-row">
            <div class="w3-col m5">
                <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
                <h3>Address</h3>
                <p>Swing by for a cup of coffee, or whatever.</p>
                <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Chicago, US</p>
                <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
                <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
            </div>
            <div class="w3-col m7">
                <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
                    <div class="w3-section">
                        <label>Name</label>
                        <input class="w3-input" type="text" name="Name" required>
                    </div>
                    <div class="w3-section">
                        <label>Email</label>
                        <input class="w3-input" type="text" name="Email" required>
                    </div>
                    <div class="w3-section">
                        <label>Message</label>
                        <input class="w3-input" type="text" name="Message" required>
                    </div>
                    <input class="w3-check" type="checkbox" checked name="Like">
                    <label>I Like it!</label>
                    <button type="submit" class="w3-button w3-right w3-theme">Send</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Google Maps -->
    <div id="map" style="width:100%;height:420px;"></div>
    <script>
        function myMap() {
            var myCenter = new google.maps.LatLng(51.508742,-0.120850);
            var mapCanvas = document.getElementById("map");
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({position:myCenter});
            marker.setMap(map);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1nvFGhx24hnQDGE8aqUf-YaLdb_uW_7o&callback=myMap"></script>
    <!--
    To use this code on your website, get a free API key from Google.
    Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
    -->
@stop