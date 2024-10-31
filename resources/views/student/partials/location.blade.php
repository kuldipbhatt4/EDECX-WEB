<input type="hidden" value="" id="latitude" name="latitude">
<input type="hidden" value="" id="longitude" name="longitude">
<script>
    var x=document.getElementById("location");
    function getLocation()
     {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(latitude);
            navigator.geolocation.getCurrentPosition(longitude);
        }
        else
        {
            x.innerHTML="Geolocation is not supported by this browser.";
        }
    }
    function latitude(position)
    {
        document.getElementById('latitude').value = position.coords.latitude;
    }
    function longitude(position)
    {
      document.getElementById('longitude').value = position.coords.longitude;
    }
    getLocation()
    </script>
