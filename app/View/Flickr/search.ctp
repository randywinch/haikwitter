<?php
pr($result);
	foreach($result['photos']['photo'] as $photo) {
		// the image URL becomes somthing like
		// http://farm{farm-id}.static.flickr.com/{server-id}/{id}_{secret}.jpg
		echo '<img src="http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_b.jpg">';
	}

?>