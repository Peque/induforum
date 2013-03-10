

var sponsors = [
	{
		company: "Sierra Cazorla",
		website: "http://www.aguasierracazorla.com/",
		image: "cazorla"
	},

	{
		company: "Dreampeaks",
		website: "http://www.dreampeaks.com/",
		image: "dreampeaks"
	},

	{
		company: "Mutua Ingenieros",
		website: "https://www.mutua-enginyers.com/es/particulars/home",
		image: "mutua"
	},

	{
		company: "Paintball Colmenar",
		website: "http://www.paintballcolmenar.es/",
		image: "paintball"
	},

	{
		company: "Snowzone Madrid",
		website: "http://www.madridsnowzone.com/",
		image: "snowzone"
	},


	{
		company: "SpasMadrid",
		website: "http://www.spasmadrid.es/",
		image: "spamadrid"
	},

	{
		company: "Maxam",
		website: "http://www.maxam.net/",
		image: "maxam"
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
chosen[4] = new_chosen_one();
chosen[5] = new_chosen_one();
chosen[6] = new_chosen_one();

var j=0;
for (var i = 0; i < chosen.length; i++) {
	if (j==0) {
	document.write('<tr>');
	}
	document.write('<td><a target="_blank" href="' + sponsors[chosen[i]].website + '" title="' + sponsors[chosen[i]].company + '"><img src="/images/sponsors/collaborators/' + sponsors[chosen[i]].image + '" alt="' + sponsors[chosen[i]].company + '_logo" /></a></td>');
	if (j==4||j==9||j==14||j==19||j==24||j==29||j==34){
	document.write('</tr><tr>');
	}
	j++;
}
