$(document).ready(function(){
        var itaImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Italien.gif";
    	var engImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Grossbritanien.gif";
		var deuImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Deutschland.gif";
		var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";
		var arbImgLink = "https://www.aussiedisposals.com.au/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/J/o/Jordan.jpg";

		var imgBtnSel = $('#imgBtnSel');
		var imgBtnIta = $('#imgBtnIta');
		var imgBtnEng = $('#imgBtnEng');
		var imgBtnDeu = $('#imgBtnDeu');
		var imgBtnFra = $('#imgBtnFra');
		var imgBtnArb = $('#imgBtnArb');

		var imgNavSel = $('#imgNavSel');
		var imgNavIta = $('#imgNavIta');
		var imgNavEng = $('#imgNavEng');
		var imgNavDeu = $('#imgNavDeu');
		var imgNavFra = $('#imgNavFra');
		var imgNavArb = $('#imgNavArb');

		var spanNavSel = $('#lanNavSel');
		var spanBtnSel = $('#lanBtnSel');

		imgBtnSel.attr("src",itaImgLink);
		imgBtnIta.attr("src",itaImgLink);
		imgBtnEng.attr("src",engImgLink);
		imgBtnDeu.attr("src",deuImgLink);
		imgBtnFra.attr("src",fraImgLink);
		imgBtnArb.attr("src",arbImgLink);

		imgNavSel.attr("src",itaImgLink);
		imgNavIta.attr("src",itaImgLink);
		imgNavEng.attr("src",engImgLink);
		imgNavDeu.attr("src",deuImgLink);
		imgNavFra.attr("src",fraImgLink);
		imgNavArb.attr("src",arbImgLink);

		$( ".language" ).on( "click", function( event ) {
			var currentId = $(this).attr('id');

			if(currentId == "navIta") {
				imgNavSel.attr("src",itaImgLink);
				spanNavSel.text("ITA");
			} else if (currentId == "navEng") {
				imgNavSel.attr("src",engImgLink);
				spanNavSel.text("ENG");
			} else if (currentId == "navDeu") {
				imgNavSel.attr("src",deuImgLink);
				spanNavSel.text("DEU");
			} else if (currentId == "navFra") {
				imgNavSel.attr("src",fraImgLink);
				spanNavSel.text("FRA");
			}else if (currentId == "navArb") {
				imgNavSel.attr("src",arbImgLink);
				spanNavSel.text("ARB");
			}

			if(currentId == "btnIta") {
				imgBtnSel.attr("src",itaImgLink);
				spanBtnSel.text("ITA");
			} else if (currentId == "btnEng") {
				imgBtnSel.attr("src",engImgLink);
				spanBtnSel.text("ENG");
			} else if (currentId == "btnDeu") {
				imgBtnSel.attr("src",deuImgLink);
				spanBtnSel.text("DEU");
			} else if (currentId == "btnFra") {
				imgBtnSel.attr("src",fraImgLink);
				spanBtnSel.text("FRA");
			} else if (currentId == "btnArb") {
				imgBtnSel.attr("src",arbImgLink);
				spanBtnSel.text("ARB");
			}
			
		});
});

function setCookie(key, value) 
{
   	var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
	document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) 
{
	var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
	return keyValue ? keyValue[2] : null;
}

function setVar(){

	        var itaImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Italien.gif";
    	var engImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Grossbritanien.gif";
		var deuImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Deutschland.gif";
		var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";
		var arbImgLink = "https://www.aussiedisposals.com.au/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/J/o/Jordan.jpg";

		var imgBtnSel = $('#imgBtnSel');
		var imgBtnIta = $('#imgBtnIta');
		var imgBtnEng = $('#imgBtnEng');
		var imgBtnDeu = $('#imgBtnDeu');
		var imgBtnFra = $('#imgBtnFra');
		var imgBtnArb = $('#imgBtnArb');

		var imgNavSel = $('#imgNavSel');
		var imgNavIta = $('#imgNavIta');
		var imgNavEng = $('#imgNavEng');
		var imgNavDeu = $('#imgNavDeu');
		var imgNavFra = $('#imgNavFra');
		var imgNavArb = $('#imgNavArb');

		var spanNavSel = $('#lanNavSel');
		var spanBtnSel = $('#lanBtnSel');

		imgBtnSel.attr("src",itaImgLink);
		imgBtnIta.attr("src",itaImgLink);
		imgBtnEng.attr("src",engImgLink);
		imgBtnDeu.attr("src",deuImgLink);
		imgBtnFra.attr("src",fraImgLink);
		imgBtnArb.attr("src",arbImgLink);

		imgNavSel.attr("src",itaImgLink);
		imgNavIta.attr("src",itaImgLink);
		imgNavEng.attr("src",engImgLink);
		imgNavDeu.attr("src",deuImgLink);
		imgNavFra.attr("src",fraImgLink);
		imgNavArb.attr("src",arbImgLink);
}


