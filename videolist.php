
<?php
include_once("functions.php");

        $rad=$_GET['rad'];
        $order=$_GET['order'];
        $zip=$_GET['zip'];
        $Location = SearchZip($zip);
        $lat=maplat($Location);
        $long=maplng($Location);
        $GetResult = results($Location);
        //print_r($Location);

        echo $GetResult;        
        //echo maplatlng($Location);
?>

<script type="text/javascript">
    initialize(<?php echo $lat;?>, <?php echo $long; ?>, <?php echo $zip; ?>);
</script>

<h2 class="center">Youtube videos near this location</h2>
<table id="video_tbl">
    <thead>
    <tr>
        <th class="tbl_heading">Title</th>
        <th class="tbl_heading">Views</th>
        <th class="tbl_heading">Rating</th>
        <th class="tbl_heading">Distance(mi)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $feedURL = "https://gdata.youtube.com/feeds/api/videos?location=$lat,$long!&location-radius=$rad&orderby=$order";
    
    $sxml = simplexml_load_file($feedURL);
    $num = 0;
    //$markerarray= array();
   
    
    foreach ($sxml->entry as $video)
    {
        $namespaces = $video->getNameSpaces(true);
        $yt =$video->children($namespaces['yt']);
        $gd =$video->children($namespaces['gd']);
        $georss =$video->children($namespaces['georss']);
        $gml = $georss->children($namespaces['gml']);
             
        $videoid=substr($video->id,42);
        $markers=str_replace(' ',',',$gml->Point->pos);
            $markerarray = explode(",",$markers);
            $markerlat=$markerarray[0];
            $markerlong=$markerarray[1];
            
        $videotitle=$video->title;
        //echo $markers;
        
                $v = 1;
        
        echo '<script type="text/javascript">
            var latlng'.$v.' = new google.maps.LatLng('.$markers.');
            var marker'.$v.' = new google.maps.Marker({
            position: latlng'.$v.', icon:image, title: "'.$videotitle.'"});
            marker'.$v.'.setMap(map);
            
            google.maps.event.addListener(marker'.$v.', "click", function()
            {
                var id = "'.$videoid.'";
                loadVideo(id);
            })
            </script>';
        $v++;
            

        echo '<tr><td><a class="clickme" href="http://www.youtube.com/v/'.$videoid.'">';
        echo $videotitle;
        echo '</a></td><td>';
        echo $yt->statistics->attributes()->viewCount;
        echo '</td><td>';
        //echo '<button class="clickme">play</button>';
        $rating = (float) $gd->rating->attributes()->average;
        echo number_format($rating,2);
        echo '</td><td>';
        echo number_format(distance($lat, $long, $markerlat, $markerlong),2);
        echo '</td>';
        echo '</tr>';
    }
    //echo '<pre>';
     //  print_r($markerarray);
    //echo '<pre>';

    ?>
    </tbody>

</table>
