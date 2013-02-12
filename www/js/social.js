
function add_social_links() {

	var content;

	content = '<div id="social_networks" style="z-index:1;position:absolute;right:1em;margin-top:8px;">';

	// Facebook
	content += '<a target="_blank" href="https://www.facebook.com/induforum.etsii.5?ref=ts&fref=ts" onmouseover=\'document.facebook.src="/images/social/icon_facebook_on.png"\' onmouseout=\'document.facebook.src="/images/social/icon_facebook_off.png"\' ><img src="/images/social/icon_facebook_off.png" name="facebook" alt="facebook_icon_image" /></a>';

	// Twitter
	content += '<a target="_blank" href="https://twitter.com/Induforum2013" onmouseover=\'document.twitter.src="/images/social/icon_twitter_on.png"\' onmouseout=\'document.twitter.src="/images/social/icon_twitter_off.png"\' ><img src="/images/social/icon_twitter_off.png" name="twitter" alt="twitter_icon_image" /></a>';


	content += '</div>';

	document.getElementById('w_header').insertAdjacentHTML("beforeBegin", content);

	var parent_element = document.getElementById('social_networks');
	var child_elements = parent_element.getElementsByTagName('a');

	for (var i=0; i < child_elements.length; i++) {
		child_elements[i].style.margin = '0.2em';
	}
}

add_social_links();
