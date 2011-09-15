<!DOCTYPE HTML>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<title>Zip Code Search</title>
<link type="text/css" rel="stylesheet" href="main.css" />
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jscript/jquery-1.6.3.min.js"> </script>
<script type="text/javascript" src="jscript/spin.js"> </script>

	<script>
		!window.jQuery && document.write('<script src="temp/jquery-1.6.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<script type="text/javascript">
function validateForm(callback)
{
    var errors = null;
    
    var zip = $("#zip").val();
    
    if (zip==null || zip=="" || (isNaN(zip)))
    {
      errors = "Please Enter a Valid Zip Code";
    }
    callback(errors);
}

var map
var image = 'icons/video.png';
function initialize(x,y,z)
{
    var latlng = new google.maps.LatLng(x,y);
    var myOptions =
    {
    zoom: 8,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map"),
        myOptions);
    
    var marker = new google.maps.Marker({
        position: latlng, map: map});
     // To add the marker to the map, call setMap();
    marker.setMap(map);

}

</script>


</head>

<body>

<div id="header">
<h1 class="center">Zip Code Search</h1>
</div>
