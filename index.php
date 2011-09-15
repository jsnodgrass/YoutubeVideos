<?php 
include("header.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);

?>


<div id="spinner_cont">
    <div id="spinner"></div>
</div>

<div class="form">
     <label for="Zip">Enter Zip Code:</label><input id="zip" name="Zip" type="text"/>
     <button id="search">Search</button>
</div>

    <input type="hidden" id="rad" value="30" />
    <input type="hidden" id="orderlist" value="viewCount" />
    
    <div id="list"></div>

<script type="text/javascript" src="jscript/main.js"></script>

<?php    
include("footer.php");
?>
