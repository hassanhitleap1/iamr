$(document).ready(function(){
        var itaImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Italien.gif";
    	var engImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Grossbritanien.gif";
		var deuImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Deutschland.gif";
		var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";
		var arbImgLink = "https://images-na.ssl-images-amazon.com/images/I/31VsQPsLJFL._SL500_AC_SS350_.jpg";

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
		//var	currentId getCookie('currentId');
		if(typeof(currentId) != "undefined" && currentId !== null) {
			imgBtnSel.attr("src",itaImgLink);
			imgBtnIta.attr("src",itaImgLink);
			imgBtnEng.attr("src",engImgLink);
			imgBtnDeu.attr("src",deuImgLink);
			imgBtnFra.attr("src",fraImgLink);
			imgBtnFra.attr("src",arbImgLink);

			imgNavSel.attr("src",itaImgLink);
			imgNavIta.attr("src",itaImgLink);
			imgNavEng.attr("src",engImgLink);
			imgNavDeu.attr("src",deuImgLink);
			imgNavFra.attr("src",fraImgLink);
			imgNavArb.attr("src",arbImgLink);

			setCookie('currentId',currentId);
			console.log(getCookie('currentId'));

		}else{
			
			imgBtnSel.attr("src",engImgLink);
			imgBtnIta.attr("src",itaImgLink);
			imgBtnEng.attr("src",itaImgLink);
			imgBtnDeu.attr("src",deuImgLink);
			imgBtnFra.attr("src",fraImgLink);
			imgBtnFra.attr("src",arbImgLink);

			imgNavSel.attr("src",engImgLink);
			imgNavIta.attr("src",itaImgLink);
			imgNavEng.attr("src",engImgLink);
			imgNavDeu.attr("src",deuImgLink);
			imgNavFra.attr("src",fraImgLink);
			imgNavArb.attr("src",arbImgLink);

		}


		
		$( ".language" ).on( "click", function( event ) {

			currentId = $(this).attr('id');
			setCookie('currentId',currentId);
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

			
		});// click on language 
});




function getCookie(key) 
{
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

function setCookie(key, value) 
{
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function setLang(lang){
    url='http://localhost/iamrich/web/index.php?r=base/language';
    
    $.ajax({
         url: url,
         type: 'post',
         data: {'lang':lang},
         success: function (data) {
                location.reload(); 
                setCookie('currentId',currentId);   
                setIconLang(currentId);
           }

     });
}

