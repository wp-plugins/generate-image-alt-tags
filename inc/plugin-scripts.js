/*
* Function that parses input fields
*/
jQuery(document).ready(function($) {

	var alt = "";
	var str = "";
	var log = "";
	var i = 0;
	var j = 0;
	var count = 0;

		$("img").each(function() {

			//Increment count of images
			i++;

        if ($(this).attr('alt').length == 0) || ($(this).attr('alt') == null) {

					var src = $('img').attr('src'); // "static/images/banner/blue.jpg"
					var tarr = src.split('/');      // ["static","images","banner","blue.jpg"]
					var file = tarr[tarr.length-1]; // "blue.jpg"
					var data = file.split('.')[0];  // "blue"

					//Increrment count of blank alt images
					j++;

					if (data.length > 0) && (data != null) {
						str = data;
						count++; //Increment tag generated count

					} else if (file.length > 0) && (file != null) {
						str = file;
						count++; //Increment tag generated count
					} else {
						str = src;
						count++; //Increment tag generated count
					}

					alt = str.toString();

          $(this).attr('alt', alt); //FALSE AS OF 2015

        }
	    }); // .each

			if (i > 0 || j > 0 || count > 0) {
				log += 'Total Images: ' + i.toString() + '\n' +
				'Blank Alt tags: ' + j.toString() + '\n' +
				'Tags Generated: ' + count.toString() + '\n';

				if (log.length > 0) {
					log = log.toString();
					Console.log(log);
				}

			}

}); //.ready
