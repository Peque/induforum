

var sponsors = [
	{
		company: "ABB",
		website: "http://www.abb.com/",
		image: "abb"
	},

	{
		company: "Accenture",
		website: "http://www.accenture.com/",
		image: "accenture"
	},

	{
		company: "Acciona",
		website: "http://www.acciona.com/",
		image: "acciona"
	},

	{
		company: "Alstom",
		website: "http://www.alstom.com/",
		image: "alstom"
	},

	{
		company: "Atexis",
		website: "http://www.atexis.eu/",
		image: "atexis"
	},

	{
		company: "BBVA",
		website: "http://www.bbva.com/",
		image: "bbva"
	},

	{
		company: "BSH",
		website: "http://www.bsh-group.com/",
		image: "bsh"
	},

	{
		company: "Cepade",
		website: "http://www.cepade.com/",
		image: "cepade"
	},

	{
		company: "Cepsa",
		website: "http://www.cepsa.com/",
		image: "cepsa"
	},

	{
		company: "CLH",
		website: "http://www.clh.com/",
		image: "clh"
	},

	{
		company: "Dalkia",
		website: "http://www.dalkia.com/",
		image: "dalkia"
	},

	{
		company: "Deloitte",
		website: "http://www.deloitte.com/",
		image: "deloitte"
	},

	{
		company: "Eads",
		website: "http://www.eads.com/",
		image: "eads"
	},

	{
		company: "Elecnor",
		website: "http://www.elecnor.com/",
		image: "elecnor"
	},

	{
		company: "EOI",
		website: "http://www.eoi.es/",
		image: "eoi"
	},


	{
		company: "Everis",
		website: "http://www.everis.com/",
		image: "everis"
	},

	{
		company: "FCC",
		website: "http://www.fcc.es/",
		image: "fcc"
	},

	{
		company: "Ferroser",
		website: "http://www.ferroser.com/",
		image: "ferroser"
	},

	{
		company: "Fluor",
		website: "http://www.fluor.com/",
		image: "fluor"
	},

	{
		company: "Foster Wheeler",
		website: "http://www.fosterwheeler.com/",
		image: "foster_wheeler"
	},

	{
		company: "Gas Natural",
		website: "http://www.gasnaturalfenosa.com/",
		image: "gas_natural"
	},

	{
		company: "HP",
		website: "http://www.hp.com/",
		image: "hp"
	},

	{
		company: "IDOM",
		website: "http://www.idom.com/",
		image: "idom"
	},

	{
		company: "ING",
		website: "http://www.ing.com/",
		image: "ing"
	},

	{
		company: "Isolux Corsan",
		website: "http://www.isoluxcorsan.com/",
		image: "isolux_corsan"
	},

	{
		company: "Leitat",
		website: "http://www.leitat.org/",
		image: "leitat"
	},

	{
		company: "BCG",
		website: "http://www.bcg.com/",
		image: "bcg"
	},

	{
		company: "L'Oréal",
		website: "http://www.loreal.com/",
		image: "loreal"
	},

	{
		company: "Sacyr Vallehermoso",
		website: "http://www.gruposyv.com/syv/Door.do?OPERATION=portalGrupo&FUNCTION=8&locale=es",
		image: "sacyr"
	},

	{
		company: "PagePersonnel",
		website: "http://www.pagepersonnel.com/",
		image: "page_personnel"
	},

	{
		company: "PWC",
		website: "http://www.pwc.com/",
		image: "pwc"
	},

	{
		company: "Quest",
		website: "http://engineering.quest-global.com/",
		image: "quest"
	},

	{
		company: "Recruit Iberica",
		website: "http://www.recruitiberica.eu/",
		image: "recruit_iberica"
	},

	{
		company: "Repsol",
		website: "http://www.repsol.com/",
		image: "repsol"
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
	},

	{
		company: "Técnicas Reunidas",
		website: "http://www.tecnicasreunidas.es/",
		image: "tecnicas_reunidas"
	},

	{
		company: "Tetra Pak",
		website: "http://www.tetrapak.com/",
		image: "tetra_pak"
	},

	{
		company: "Top Employers",
		website: "http://topemployers.com/",
		image: "top_employers"
	},

	{
		company: "Upm Racing",
		website: "http://www.upmracing.es/",
		image: "upmracing"
	},

	{
		company: "Axa",
		website: "http://www.axa.es",
		image: "axa"
	},

	{
		company: "Altran",
		website: "http://www.altran.es/",
		image: "altran"
	},

	{
		company: "IEN",
		website: "http://www.ienpolitecnica.es/",
		image: "ien"
	},

		{
		company: "Atos",
		website: "http://es.atos.net/es-es/",
		image: "atos"
	},

	{
		company: "ESCP Europe",
		website: "http://www.escpeurope.eu/es/",
		image: "escp"
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
chosen[7] = new_chosen_one();
chosen[8] = new_chosen_one();
chosen[9] = new_chosen_one();
chosen[10] = new_chosen_one();
chosen[11] = new_chosen_one();
chosen[12] = new_chosen_one();
chosen[13] = new_chosen_one();
chosen[14] = new_chosen_one();
chosen[15] = new_chosen_one();
chosen[16] = new_chosen_one();
chosen[17] = new_chosen_one();
chosen[18] = new_chosen_one();
chosen[19] = new_chosen_one();
chosen[20] = new_chosen_one();
chosen[21] = new_chosen_one();
chosen[22] = new_chosen_one();
chosen[23] = new_chosen_one();
chosen[24] = new_chosen_one();
chosen[25] = new_chosen_one();
chosen[26] = new_chosen_one();
chosen[27] = new_chosen_one();
chosen[28] = new_chosen_one();
chosen[29] = new_chosen_one();
chosen[30] = new_chosen_one();
chosen[31] = new_chosen_one();
chosen[32] = new_chosen_one();
chosen[33] = new_chosen_one();
chosen[34] = new_chosen_one();
chosen[35] = new_chosen_one();
chosen[36] = new_chosen_one();
chosen[37] = new_chosen_one();
chosen[38] = new_chosen_one();
chosen[39] = new_chosen_one();
chosen[40] = new_chosen_one();
chosen[41] = new_chosen_one();
chosen[42] = new_chosen_one();
chosen[43] = new_chosen_one();
chosen[44] = new_chosen_one();

var j=0;

for (var i = 0; i < chosen.length; i++) {
	if (j==0) {
	document.write('<tr>');
	}
	document.write('<td><a target="_blank" href="' + sponsors[chosen[i]].website + '" title="' + sponsors[chosen[i]].company + '"><img style="width: 100%;" src="/images/sponsors/logocompanies/' + sponsors[chosen[i]].image + '" alt="' + sponsors[chosen[i]].company + '_logo" /></a></td>');
	if (j==4||j==9||j==14||j==19||j==24||j==29||j==34 ||j==39){
	document.write('</tr><tr>');
	}
	j++;
}
