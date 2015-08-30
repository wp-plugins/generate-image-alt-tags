/*
* Function that parses input fields
*/
jQuery(document).ready(function($){

	var count = 0;

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
				alt = 'Image-' + count;
			}
			$(this).attr('alt', alt); //FALSE AS OF 2015
		}

		if ($(this).attr('title').length == 0) || ($(this).attr('title') == null) {

			var title = "";
			var src = $('img').attr('src'); // "static/images/banner/blue.jpg"
			var tarr = src.split('/');      // ["static","images","banner","blue.jpg"]
			var file = tarr[tarr.length-1]; // "blue.jpg"
			var data = file.split('.')[0];  // "blue"

			if (data.length > 0) && (data != null) {
				title = data;
			} else if (file.length > 0) && (file != null) {
				title = file;
			} else {
				title = 'Image-' + count;
			}
			$(this).attr('title', title); //FALSE AS OF 2015
		}

		count++;
	}); // .each
}); //.ready
