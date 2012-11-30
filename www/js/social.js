
function add_social_links() {

	var content;

	content = '<div id="social_networks" style="z-index:-1;float:right;margin:8px 1.8em 0 0;">';

	// Facebook
	content += '<a href="https://www.facebook.com/induforum.etsii.5?ref=ts&fref=ts" onmouseover=\'document.facebook.src="ftp://reset.etsii.upm.es/.pool/images/other_topics/icon_facebook_on.png"\' onmouseout=\'document.facebook.src="ftp://reset.etsii.upm.es/.pool/images/other_topics/icon_facebook_off.png"\' ><img src="ftp://reset.etsii.upm.es/.pool/images/other_topics/icon_facebook_off.png" name="facebook" alt="facebook_icon_image" /></a>';

	// Twitter
	content += '<a href="https://twitter.com/Induforum2013" onmouseover=\'document.twitter.src="ftp://reset.etsii.upm.es/.pool/images/other_topics/icon_twitter_on.png"\' onmouseout=\'document.twitter.src="ftp://reset.etsii.upm.es/.pool/images/other_topics/icon_twitter_off.png"\' ><img src="ftp://reset.etsii.upm.es/.pool/images/other_topics/icon_twitter_off.png" name="twitter" alt="twitter_icon_image" /></a>';


	content += '</div>';

	document.getElementById('w_header').insertAdjacentHTML("afterBegin", content);

	var parent_element = document.getElementById('social_networks');
	var child_elements = parent_element.getElementsByTagName('a');

	for (var i=0; i < child_elements.length; i++) {
		child_elements[i].style.margin = '0.2em';
	}
}

add_social_links();
