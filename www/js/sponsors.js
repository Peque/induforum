

var sponsors = [

	{
		company: "Accenture",
		website: "http://www.accenture.com/",
		image: "accenture"
	},

	{
		company: "BBVA",
		website: "http://www.bbva.com/",
		image: "bbva"
	},

	{
		company: "IBM",
		website: "http://www.ibm.com/",
		image: "ibm"
	},

	{
		company: "L'Oréal",
		website: "http://www.loreal.com/",
		image: "l'oréal"
	},

	{
		company: "OSRAM",
		website: "http://www.osram.com/",
		image: "osram"
	},

	{
		company: "SEAT",
		website: "http://www.seat.com/",
		image: "seat"
	},

	{
		company: "Siemens",
		website: "http://www.siemens.com/",
		image: "siemens"
	}

];

function new_chosen_one() {
	var repeated = 1;
	while (repeated) {
		var random = Math.floor(Math.random() * (sponsors.length));
		repeated = 0;
		for (var i = 0; i < chosen.length; i++) {
			if (random == chosen[i]) {
				repeated = 1;
				break;
			}
		}
		if (!repeated) return random;
	}
	return 0;
}

var chosen = new Array();

chosen[0] = new_chosen_one();
chosen[1] = new_chosen_one();
chosen[2] = new_chosen_one();
chosen[3] = new_chosen_one();


for (var i = 0; i < chosen.length; i++) {
	document.write('<p style="text-align:center;"><a href="' + sponsors[chosen[i]].website + '" title="' + sponsors[chosen[i]].company + '"><img src="/images/sponsors/' + sponsors[chosen[i]].image + '" alt="' + sponsors[chosen[i]].company + '_logo" /></a></p>');
}
