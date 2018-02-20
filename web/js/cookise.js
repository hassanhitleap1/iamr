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





setVar(currentId,imgNavSel,itaImgLink,engImgLink,
    deuImgLink,fraImgLink,arbImgLink,imgBtnSel,spanBtnSel);




function setVar(currentId,imgNavSel,itaImgLink,engImgLink,
            deuImgLink,fraImgLink,arbImgLink,imgBtnSel,spanBtnSel){

            console.log(currentId);
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
            

}


            

            if(currentId == "navIta") {
                codeLang='it';
                
            } else if (currentId == "navEng") {
                codeLang='en';

            } else if (currentId == "navDeu") {
                codeLang='de';
                
            } else if (currentId == "navFra") {
                codeLang='fr';

            }else if (currentId == "navArb") {
                codeLang='ar';
            }
            