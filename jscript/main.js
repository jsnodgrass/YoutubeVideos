$(document).ready(function(){

var spinner = new Spinner({
  lines: 12, // The number of lines to draw
  length: 25, // The length of each line
  width: 5, // The line thickness
  radius: 15, // The radius of the inner circle
  color: '#000', // #rbg or #rrggbb
  speed: 1, // Rounds per second
  trail: 100, // Afterglow percentage
  shadow: true // Whether to render a shadow
}) // Place in DOM node called     
    
var updateBody = function(data) {
    //console.log(data);
    $("#list").html(data);
    $("#spinner_cont").hide();
      
    //console.log("Table Sorter");
    $("#video_tbl").tablesorter({
      sortList: [[3,0]]
    });
}




function updateList() {
    
    // run validation, pass validation a callback
    
    validateForm(function(err){
        
      if (err) {
        alert(err)
      }
      else {
        console.log("Main Page");
        $("#list").html("");
        $("#spinner_cont").show();
        spinner.spin(document.getElementById("spinner"));
        var zip = $("#zip").val();
        var rad = $("#rad").val();
        var order = $("#orderlist").val();
        $.get("videolist.php?zip="+zip+"&rad="+rad+"mi&order="+order, updateBody);
        }
    })
        
    return false;
}

//updateList();
$("#search").click(updateList);
})


    $(".clickme").live("click", function() {
	$.fancybox({
	    'padding'			: 0,
            'autoScale'			: false,
            'transitionIn'	        : 'none',
            'transitionOut'	        : 'none',
            'title'			: this.title,
	    'width'		        : 680,
	    'height'		        : 495,
            'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type'			: 'swf',
            'swf'			: {
            'wmode'		        : 'transparent',
            'allowfullscreen'	        : 'true'
            }
        });

    return false;
    });
    
function loadVideo(id)
{
    console.log("load video");
	$.fancybox({
	    'padding'			: 0,
            'autoScale'			: false,
            'transitionIn'	        : 'none',
            'transitionOut'	        : 'none',
            'title'			: this.title,
	    'width'		        : 680,
	    'height'		        : 495,
            'href'			: "http://www.youtube.com/v/"+id,
            'type'			: 'swf',
            'swf'			: {
            'wmode'		        : 'transparent',
            'allowfullscreen'	        : 'true'
            }
        });

    return false;
}


