/*
* Function that parses input fields
*/
jQuery(document).ready(function($){
//  if ($.browser.chrome) {
		//autcomplete_false();
		$("img").each(function() {
	    	//alert("ello");
        if ($(this).attr('alt').length == 0) || ($(this).attr('alt') == null) {

					var alt = "";
					var src = $('img').attr('src'); // "static/images/banner/blue.jpg"
					var tarr = src.split('/');      // ["static","images","banner","blue.jpg"]
					var file = tarr[tarr.length-1]; // "blue.jpg"
					var data = file.split('.')[0];  // "blue"

					if (data.length > 0) && (data != null) {
						alt = data;
					} else if (file.length > 0) && (file != null) {
						alt = file;
					} else {
						var d = new Date();
						var date = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
						var num = Math.floor((Math.random() * 1000) + 1);
						alt = date + " - " + num
					}

          $(this).attr('alt', alt); //FALSE AS OF 2015

        }
	    }); // .each
//	} // end if
}); //.ready
