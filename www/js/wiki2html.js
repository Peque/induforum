/*
	wiki2HTML Parses wiki markup and generates HTML 5 showing a preview.
    Copyright (C) 2010-2011 Elia Contini
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program. If not, see http://www.gnu.org/licenses/.

    Author
	Jesús Arroyo Torrens <jesus.jkhlg@gmail.com>
    Date
	2012-10-01
 */

// https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/regexp

function wiki2html(wikicode)
	{	
		var html = '<p>function wiki2html(wikicode): an error occurs</p>';
		
		wikicode = deleteCR(wikicode);
		wikicode = headers(wikicode);
		wikicode = horizontalRule(wikicode);
		wikicode = inlineElement(wikicode);
		wikicode = list(wikicode);
		wikicode = table(wikicode);
		wikicode = paragraph(wikicode);
		wikicode = toc(wikicode);
		
		html = wikicode;
		
		return html;
	}

/* this function normalize line breaks
 * in order to have a common base string
 * for all browser
 */
function deleteCR(wikicode)
	{
		wikicode = wikicode.replace(/\r/g, '');
		return wikicode;
	}

/*******************************************************************************
 *                                    HEADER                                   *
*******************************************************************************/
function headers(wikicode)
	{
		var heading_1_regEx = /^=[\s]*?([0-9A-Za-z].[^=\[]*)[\s]*?=/gm;
		var heading_2_regEx = /^==[\s]*?([0-9A-Za-z].[^=\[]*)[\s]*?==/gm;
		var heading_3_regEx = /^===[\s]*?([0-9A-Za-z].[^=\[]*)[\s]*?===/gm;
		var heading_4_regEx = /^====[\s]*?([0-9A-Za-z].[^=\[]*)[\s]*?====/gm;
		var heading_5_regEx = /^=====[\s]*?([0-9A-Za-z].[^=\[]*)[\s]*?=====/gm;
		var heading_6_regEx = /^======[\s]*?([0-9A-Za-z].[^=\[]*)[\s]*?======/gm;
		
		wikicode = wikicode.replace(heading_6_regEx, '<h6>$1</h6>');
		wikicode = wikicode.replace(heading_5_regEx, '<h5>$1</h5>');
		wikicode = wikicode.replace(heading_4_regEx, '<h4>$1</h4>');
		wikicode = wikicode.replace(heading_3_regEx, '<h3>$1</h3>');
		wikicode = wikicode.replace(heading_2_regEx, '<h2>$1</h2>');
		wikicode = wikicode.replace(heading_1_regEx, '<h1>$1</h1>');
		
		return wikicode;
	}

/*******************************************************************************
 *                             HORIZONTAL LINE                                 *
*******************************************************************************/
function horizontalRule(wikicode)
	{
		var horizontalLine = /----/g;
		
		wikicode = wikicode.replace(horizontalLine, '<hr>');
		
		return wikicode;
	}

/*******************************************************************************
 *                               INLINE ELEMENT                                *
*******************************************************************************/
function inlineElement(wikicode)
	{
		var strongEm = /'''''([0-9A-Za-z].*)'''''/g;
		var strong = /'''([0-9A-Za-z].*)'''/g;
		var em = /''([0-9A-Za-z].*)''/g;
		var image = /\[\[File:(.[^\]|]*)([|]thumb|frame)?([|]alt=.[^\]|]*)?([|].[^\]|]*)?\]\]/g;
		var youtube = /\[Youtube:(.+?)\]/i;
		var anchor = /\[([a-zA-Z0-9].[^\s]*) ([a-zA-Z0-9].[^\]]*)\]/g;
	
		wikicode = wikicode.replace(strongEm, '<strong><em>$1</em></strong>');
		wikicode = wikicode.replace(strong, '<strong>$1</strong>');
		wikicode = wikicode.replace(em, '<em>$1</em>');
	
		while(tokens = image.exec(wikicode))
			{
				/*var params = [];
				if (typeof(tokens[0]) != 'undefined') params[0] = tokens[0];
				if (typeof(tokens[1]) != 'undefined') params[1] = tokens[1];
				if (typeof(tokens[2]) != 'undefined') params[2] = ' src="ftp://reset.etsii.upm.es/.pool/images/' + tokens[2] + '" ';
				if (typeof(tokens[3]) != 'undefined') params[3] = ' class="' + tokens[3].replace('|', '') + '" ';
				if (typeof(tokens[4]) != 'undefined') params[4] = ' alt="' + tokens[4].replace('|alt=', '') + '" ';
				if (typeof(tokens[5]) != 'undefined') params[5] = '<figcaption>' + tokens[5].replace('|', '') + '</figcaption>';
				wikicode = wikicode.replace(params[0], '<figure' + params[3] + '><img' + params[2] + params[3] + params[4] + '>' + params[5] + '</figure>');*/

				if(tokens.length == 5 && typeof(tokens[2]) != 'undefined' && typeof(tokens[3]) != 'undefined' && typeof(tokens[4]) != 'undefined')
					{
						tokens[2] = tokens[2].replace('|', '');
						tokens[3] = tokens[3].replace('|alt=', '');
						tokens[4] = tokens[4].replace('|', '');
						wikicode = wikicode.replace(tokens[0], '<figure class="' + tokens[2] + '"><img src="ftp://reset.etsii.upm.es/.pool/images/' + tokens[1] + '" class="' + tokens[2] + '" alt="' + tokens[3] + '"><figcaption>' + tokens[4] + '</figcaption></figure>');
					}
				else
					wikicode = wikicode.replace(tokens[0], '<div class="warning">WARNING: your image code is incomplete. Good practices for images impose to specify an alternative text, a caption and if the image is a frame or a thumbnail. For example, <code>&#091;&#091;File:anImage.png|thumb|alt=Alternative text|Caption text&#093;&#093;</code></div>');
			}
	
		wikicode = wikicode.replace(youtube, '<p class=\"centered\"><iframe class=\"youtube-player\" width=\"640\" height=\"385\" src=\"http://www.youtube.com/embed/$1\"></iframe></p>');
		wikicode = wikicode.replace(anchor, '<a href="$1">$2</a>\n');
		
		return wikicode;
	}

/*******************************************************************************
 *                                  LIST                                       *
*******************************************************************************/
function list(wikicode)
	{
		// unordered
		var unorderedStartList = /\n\n<li>/gm; //|\r\n\r\n<li>
		var unorderedListItem = /^\*(.*)/gm;
		var unorderedEndList = /<\/li>\n(?!<li>)/gm; // |<\/li>\r\n(?!<li>)
		
		wikicode = wikicode.replace(unorderedListItem, '<li>$1</li>');	
		wikicode = wikicode.replace(unorderedStartList, "\n<ul>\n<li>");
		wikicode = wikicode.replace(unorderedEndList, "</li>\n</ul>\n\n");
		
		// ordered
		var orderedStartList = /\n\n<li>/gm; // |\r\n\r\n<li> ///([^<\/li>][>]?[\n])<li>/g;
		var orderedListItem = /^#[:]?[#]* (.*)/gm;
		var orderedEndList = /<\/li>\n(?!<li>|<\/ul>)/gm; // |<\/li>\r\n(?!<li>|<\/ul>) ///<\/li>\n(?!<li>)/gm;
		
		wikicode = wikicode.replace(orderedListItem, '<li>$1</li>');
		wikicode = wikicode.replace(orderedStartList, "\n<ol>\n<li>");
		wikicode = wikicode.replace(orderedEndList, "</li>\n</ol>\n\n");
		
		return wikicode;
	}

/*******************************************************************************
 *                                  PARAGRAPH                                  *
*******************************************************************************/
function paragraph(wikicode)
	{
		var paragraph = /\n\n([^#\*=].*)/gm; ///^\n(?!<)(.+)*(?!>)\n/m; //|\r\n\r\n([^#\*=].*)
		var info = /^\n(?!<)\? (.+)*(?!>)\n/m;
		var warning = /^\n(?!<)\?\? (.+)*(?!>)\n/m;
		var error = /^\n(?!<)\?\?\? (.+)*(?!>)\n/m;
	
		wikicode = wikicode.replace(info, "<p class=\"info\">$1</p>\n");
		wikicode = wikicode.replace(warning, "<p class=\"warning\">$1</p>\n");
		wikicode = wikicode.replace(error, "<p class=\"error\">$1</p>\n");
		wikicode = wikicode.replace(paragraph, "\n<p>$1</p>\n");
		
		return wikicode;
	}

/*******************************************************************************
 *                                  TABLE                                      *
*******************************************************************************/
function table(wikicode)
	{
		// http://www.mediawiki.org/wiki/Help:Tables
		var tableStart = /^\{\|/gm;
		var tableRow = /^\|-/gm;
		var tableHeader = /^!\s(.*)/gm;
		var tableData = /^\|\s(.*)/gm;
		var tableEnd = /^\|\}/gm;
	
		wikicode = wikicode.replace(tableStart, '<table><tr>');
		wikicode = wikicode.replace(tableRow, '</tr><tr>');
		wikicode = wikicode.replace(tableHeader, '<th>$1</th>');
		wikicode = wikicode.replace(tableData, '<td>$1</td>');
		wikicode = wikicode.replace(tableEnd, '</tr></table>\n');
		
		return wikicode;
	}

/*******************************************************************************
 *                             TABLE OF CONTENTS                               *
*******************************************************************************/
function toc(wikicode)
	{
		var toc = /^__TOC__/g;
		
		wikicode = wikicode.replace(toc, '<div class="warning">__TOC__ command is not supported yet.</div>');
		
		return wikicode;
	}
