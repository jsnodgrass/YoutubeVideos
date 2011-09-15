<?php

function SearchZip($searchzip)
{
    # Open the File.
     if (($handle = fopen("zipcode-database.csv", "r")) !== FALSE) {
         # Set the parent multidimensional array key to 0.
         $nn = 0;
         $csvarray = array();
         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            //echo $nn . "<br>";
            if ($searchzip == $data[0])
            {
            # Count the total keys in the row.
             $c = count($data);
             # Populate the multidimensional array.
             for ($x=0;$x<$c;$x++)
             {
                 $csvarray[$nn][$x] = $data[$x];
             }
             $nn++;
            }
         }
         fclose($handle);
     }
     
     return $csvarray;
}

function results($locarray)
{

    if (count($locarray) == 0)
    {
        $output = '<div class="badresult">';
        $output .= 'No Match Found, Please Try Again!</div>';
    }
    else
    {
        //print_r($locarray);
        $output = '<div id="results">';
       
        $output .= '<ul><li><h3>Zip matches the following towns in '.$locarray[0][4].'<h3></li><br>';
        $output .='<span id="map"></span>';

        foreach ($locarray as $town)
        {
            $output .= '<li>';
            $output .= '<h4>'.$town[3].'</h4>';
            $output .= '</li><br>';
        }
          $output .= '<li><h5>Latitude:  ' . $locarray[0][1] . '</h5></li>';
          $output .= '<li><h5>Longitude: ' . $locarray[0][2] . '</h5></li>';
          $output .= '</ul></div>';
    }
        return $output;
}
        
function maplat($location)
{
    $newlatlng=$location[0][1];
    return $newlatlng;
}

function maplng($location)
{
    $newlatlng=$location[0][2];
    return $newlatlng;
}

function distance($lat1, $lon1, $lat2, $lon2) { 

  $theta = $lon1 - $lon2; 
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
  $dist = acos($dist); 
  $dist = rad2deg($dist); 
  $miles = $dist * 60 * 1.1515;

  return $miles;
      
}

    
?>

