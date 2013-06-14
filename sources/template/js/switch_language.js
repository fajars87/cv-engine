function switchLanguage(lang) {
    MakeRequest("ajax_get_body.php?lang=" + lang);
}

function getXMLHttp() {
    var xmlHttp;

    try { //Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch(e) { //Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e) {
                alert("Your browser does not support AJAX!")
                return false;
            }
        }
    }
    return xmlHttp;
}

function MakeRequest(what) {
    var xmlHttp = getXMLHttp();

    xmlHttp.onreadystatechange = function() {
        if(4 == xmlHttp.readyState) {
            if (what.indexOf('head') !== -1) {
                HandleHeadResponse(xmlHttp.responseText);
            }
            if (what.indexOf('body') !== -1) {
                HandleBodyResponse(xmlHttp.responseText);
            }
        }
    }

    xmlHttp.open("GET", what, true);
    xmlHttp.send(null);
}

function HandleHeadResponse(response) {
    document.getElementsByTagName('head')[0].innerHTML = response;
}

function HandleBodyResponse(response) {
    document.getElementsByTagName('body')[0].innerHTML = response;
}
