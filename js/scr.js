var xmlhttp;
if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
} else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
var ygyg = "1";
function load() {
	document.querySelectorAll(".load.loa")[0].style.maxHeight = "100px";
	if (document.readyState === "complete") {
        var gek=document.getElementById("hespe");
    if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }}

         
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             	var para = document.createElement("div");
             	para.innerHTML = xmlhttp.responseText;
             	para.style.maxHeight = 0;
             	para.style.transition = "all 4s";
             	var azx = document.getElementById("blal");
				azx.appendChild(para);
             	setTimeout(function(){para.style.maxHeight = "1800px";} , 1001);
             	setTimeout(function(){document.querySelectorAll(".load.loa")[0].style.maxHeight = "0";} , 4001);
                ygyg++;
             }
         }
         xmlhttp.open("GET", "inc/loadmore.php?co=" + ygyg, true);
         xmlhttp.send();
}


	var jjjmk;	
	function coo() {
		var jjj = document.getElementById('hhh');
		//..................................................
		var kkk = jjj.getElementsByClassName('sub-info')[0];
		var lll = kkk.getElementsByTagName('div')[0];
		kkk.style.left = "114px";
		kkk.style.top = "41.5px";
		lll.style.left = "-99.5px";
		lll.style.top = "194px";
        //..................................................
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}
		//..................................................
		var kkk = jjj.getElementsByClassName('sub-info0')[0];
		var lll = kkk.getElementsByTagName('div')[0];
		kkk.style.right = "114px";
		kkk.style.bottom = "40px";
		lll.style.left = "198.5px";
		lll.style.top = "193px";
		//..................................................
		jjjmk = setTimeout(function(){jjj.getElementsByClassName('sub-im')[0].style.display="block";} , 2000);
		jjjmk0 = setTimeout(function(){jjj.getElementsByClassName('subcats')[0].style.opacity=1;} , 2000);
		jjjmk1 = setTimeout(function(){jjj.getElementsByClassName('subcats')[0].style.top="3px";} , 2000);
		jjjmk2 = setTimeout(function(){jjj.getElementsByClassName('subkind')[0].style.top=0;} , 2000);
	}

var incopy = 'All Rights Resrved to ©AnimeStorm.com<br>Coded BY <a target="_blank" href="https://www.facebook.com/Si.HaMaDaAa">SI-HAMADA</a> &amp; Desinged BY Ostora';

	window.onload = function(){
    var prok=document.getElementById("hespe");   
    if(prok==null){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }else{
    	prok.innerHTML = incopy;
    	prok.style.background = "#5c5b5b";
    	prok.style.borderRadius = "10px";
    	prok.style.color = "#fff";
    	prok.style.padding = "5px 15px 5px 5px";
    	prok.style.textAlign = "center";
    	prok.style.width = "65%";
        prok.style.margin = "5px auto";
        prok.style.display = "block";
        prok.style.position = "relative";
        prok.style.top = "0";
    	prok.style.left = "0";
    	};
	};

if (document.readyState === "complete") {
        var gek=document.getElementById("hespe");
    if(gek==null){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }
}

	function cooo() {
		clearTimeout(jjjmk);
		clearTimeout(jjjmk0);
		clearTimeout(jjjmk1);
		clearTimeout(jjjmk2);
		var jjj = document.getElementById('hhh');
		setTimeout(function(){jjj.getElementsByClassName('subcats')[0].style.opacity=0;} , 500);
		setTimeout(function(){jjj.getElementsByClassName('subcats')[0].style.top= "300px";} , 500);
		setTimeout(function(){jjj.getElementsByClassName('subkind')[0].style.top= "-80px";} , 500);
		//..................................................
		jjj.getElementsByClassName('sub-im')[0].style.display="none";
		//..................................................
		var kkk = jjj.getElementsByClassName('sub-info')[0];
		var lll = kkk.getElementsByTagName('div')[0];
		kkk.style.left = "274px";
		kkk.style.top = "211.5px";
		lll.style.left = "-134.5px";
		lll.style.top = "205px";
		//..................................................
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}
        //..................................................
		var kkk = jjj.getElementsByClassName('sub-info0')[0];
		var lll = kkk.getElementsByTagName('div')[0];
		kkk.style.right = "155px";
		kkk.style.bottom = "350px";
		lll.style.left = "164px";
		lll.style.top = "203.5px";
	}


function error() {
    alert("Hello! I am an alert box!");
    return false;
}


var ygygsearch = "1";
function loadsearch(searchw) {
	document.querySelectorAll(".load.loa")[0].style.maxHeight = "100px";
	var azxx = document.getElementById("mid");
	if (document.getElementById("searchresult") != null) {
		var searchresul = document.getElementById("searchresult");
		searchresul.style.opacity = 0;
		setTimeout(function(){searchresul.style.maxHeight = "0";} , 1001);
		setTimeout(function(){azxx.removeChild(searchresul);} , 3001);
	} else {
		var azx = document.getElementById("blal");
		azx.style.opacity = 0;
		var azxhe = azx.offsetHeight;
		azx.style.maxHeight = azxhe+"px";
		setTimeout(function(){azx.style.maxHeight = "0";} , 1001);
	}
         
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             	var para = document.createElement("div");
             	para.id = "searchresult"
                if (document.readyState === "complete") {
                    var gek=document.getElementById("hespe");
                if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
                    window.location.href="https://www.facebook.com/Si.HaMaDaAa";
                }}
             	para.innerHTML = xmlhttp.responseText;
             	para.style.maxHeight = 0;
             	para.style.transition = "all 2s ease-in-out";
				setTimeout(function(){azxx.appendChild(para);} , 1900);
             	setTimeout(function(){para.style.maxHeight = "1800px";} , 2101);
             	setTimeout(function(){document.querySelectorAll(".load.loa")[0].style.maxHeight = "0";} , 3001);
             	setTimeout(function(){para.style.maxHeight = "99999999px";} , 4101);
             	setTimeout(function(){para.style.maxHeight = para.offsetHeight+"px";} , 6201);
                ygygsearch++;
                document.getElementById("load").innerHTML = 'back <i class="fa fa-backward" aria-hidden="true"></i>';
                document.getElementById("load").onclick = back;
                setTimeout(function(){document.getElementById("popupactive").click();} , 4000);
             }
         }
         xmlhttp.open("GET", "inc/search.php?co=" + searchw, true);
         xmlhttp.send();
}


function back(){
	document.querySelectorAll(".load.loa")[0].style.maxHeight = "100px";
	document.getElementById("searchresult").style.maxHeight = 0;
	setTimeout(function(){document.getElementById("mid").removeChild(document.getElementById("searchresult"));} , 2001);
	var azx = document.getElementById("blal");
	setTimeout(function(){azx.style.opacity = 1;} , 2100);
	setTimeout(function(){azx.style.maxHeight = "1800px";} , 2100);
	setTimeout(function(){azx.style.maxHeight = "99999999px";} , 3151);
    if (document.readyState === "complete") {
        var gek=document.getElementById("hespe");
    if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }}
	setTimeout(function(){azx.style.maxHeight = "auto";} , 3251);
	setTimeout(function(){document.getElementById("load").innerHTML = 'LoadMore <i class="fa fa-refresh" aria-hidden="true"></i>';} , 2501);
    setTimeout(function(){document.getElementById("load").onclick = load;} , 2501);
    setTimeout(function(){document.querySelectorAll(".load.loa")[0].style.maxHeight = "0";} , 2001);
}




function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var timeinterval = setInterval(function () {
        //minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        //minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}

        //display.textContent = minutes + ":" + seconds;
        display.textContent = seconds;

        if (--timer < 0) {
            clearInterval(timeinterval);
            document.querySelector('#redir-a').click();
            //location.href = '#';
                    }
    }, 1000);

}

var kindsdiv = document.getElementById('kinds');
var catsdiv = document.getElementById('cats');


function catshow() {
    //catsdiv.style.position = "relative";
    catsdiv.style.opacity = 1;
    catsdiv.style.maxHeight = "500px";
    catsdiv.style.padding = "20px";
    catsdiv.style.margin = "10px";
}


function cathide() {
    //setTimeout(function(){catsdiv.style.position = "absolute";},2000);
    catsdiv.style.opacity = 0;
    catsdiv.style.maxHeight = "0";
    catsdiv.style.padding = "0";
    catsdiv.style.margin = "0";
}


function cats(){
    if (catsdiv.style.opacity != "1") {
    if (kindsdiv.style.opacity == "1") {kindhide();}
    catshow();
    }else {
    cathide();
    }
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}
}


var catscounter = "";
var checkedval = "";
function loadcats() {
    catscounter = 0;
    cathide();
    document.querySelectorAll(".load.loa")[0].style.maxHeight = "100px";
    var azxx = document.getElementById("mid");
    if (document.getElementById("searchresult") != null) {
        var searchresul = document.getElementById("searchresult");
        searchresul.style.opacity = 0;
        setTimeout(function(){searchresul.style.maxHeight = "0";} , 1001);
        setTimeout(function(){azxx.removeChild(searchresul);} , 3001);
    } else {
        var azx = document.getElementById("blal");
        azx.style.opacity = 0;
        var azxhe = azx.offsetHeight;
        azx.style.maxHeight = azxhe+"px";
        setTimeout(function(){azx.style.maxHeight = "0";} , 1001);
    }
    var checkednum = catsdiv.querySelectorAll('input:checked');
    checkedval = "";
    for (var i = 0; i < checkednum.length; i++) {
        if (i === 0) {
            checkedval = checkednum[i].value;
        }else{
            checkedval += "-"+checkednum[i].value;
        }
    }
    if (document.readyState === "complete") {
        var gek=document.getElementById("hespe");
    if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }}
         
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var para = document.createElement("div");
                para.id = "searchresult"
                para.innerHTML = xmlhttp.responseText;
                para.style.maxHeight = 0;
                para.style.transition = "all 2s ease-in-out";
                setTimeout(function(){azxx.appendChild(para);} , 1900);
                setTimeout(function(){para.style.maxHeight = "1800px";} , 2101);
                setTimeout(function(){document.querySelectorAll(".load.loa")[0].style.maxHeight = "0";} , 3001);
                setTimeout(function(){para.style.maxHeight = "99999999px";} , 4101);
                setTimeout(function(){para.style.maxHeight = para.offsetHeight+"px";} , 6201);
                setTimeout(function(){para.appendChild(document.querySelectorAll(".load.loa")[0].cloneNode(true));}, 3100);
                var loadclone = document.getElementById("load").cloneNode(true);
                loadclone.id = "loadmc";
                loadclone.onclick = loadmorecats;
                setTimeout(function(){para.appendChild(loadclone);}, 3100);
                document.getElementById("load").innerHTML = 'back <i class="fa fa-backward" aria-hidden="true"></i>';
                document.getElementById("load").onclick = back;
                setTimeout(function(){document.getElementById("popupactive").click();} , 4000);
                catscounter++;
             }
         }
         xmlhttp.open("GET", "inc/loadcats.php?co=" + catscounter + "&cats=" + checkedval , true);
         xmlhttp.send();
}



function loadmorecats() {
    document.querySelectorAll(".load.loa")[1].style.maxHeight = "100px";
    if (document.readyState === "complete") {
        var gek=document.getElementById("hespe");
    if(gek==null){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }
    }
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}
         
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var azx = document.getElementById("searchresult");
                azx.style.maxHeight = (azx.scrollHeight + 1800) + "px";
                var para = document.createElement("div");
                para.innerHTML = xmlhttp.responseText;
                para.style.maxHeight = 0;
                para.style.overflow = "hidden";
                para.style.transition = "all 4s";
                azx.insertBefore(para, azx.lastChild.previousSibling);
                setTimeout(function(){para.style.maxHeight = "1800px";} , 1001);
                setTimeout(function(){document.querySelectorAll(".load.loa")[1].style.maxHeight = "0";} , 4001);
                catscounter++;
             }
         }
         xmlhttp.open("GET", "inc/loadcats.php?co=" + catscounter + "&cats=" + checkedval , true);
         xmlhttp.send();
}


function kindshow() {
    //kindsdiv.style.position = "relative";
    kindsdiv.style.opacity = 1;
    kindsdiv.style.maxHeight = "500px";
    kindsdiv.style.padding = "20px";
    kindsdiv.style.margin = "10px";
}


function kindhide() {
    //setTimeout(function(){kindsdiv.style.position = "absolute";}, 2000);
    kindsdiv.style.opacity = 0;
    kindsdiv.style.maxHeight = "0";
    kindsdiv.style.padding = "0";
    kindsdiv.style.margin = "0";
}


function kinds(){
    if (kindsdiv.style.opacity != "1") {
    if (catsdiv.style.opacity == "1") {cathide();}
    kindshow();
    }else {
    kindhide();
    }
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}
}



var kindcounter = "";
var getkind = "";
function loadkind() {
    kindcounter = 0;
    kindhide();
    document.querySelectorAll(".load.loa")[0].style.maxHeight = "100px";
    var azxx = document.getElementById("mid");
    if (document.getElementById("searchresult") != null) {
        var searchresul = document.getElementById("searchresult");
        searchresul.style.opacity = 0;
        setTimeout(function(){searchresul.style.maxHeight = "0";} , 1001);
        setTimeout(function(){azxx.removeChild(searchresul);} , 3001);
    } else {
        var azx = document.getElementById("blal");
        azx.style.opacity = 0;
        var azxhe = azx.offsetHeight;
        azx.style.maxHeight = azxhe+"px";
        setTimeout(function(){azx.style.maxHeight = "0";} , 1001);
    }
    getkind = document.getElementById('kind').value;
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}
         
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var para = document.createElement("div");
                para.id = "searchresult"
                para.innerHTML = xmlhttp.responseText;
                para.style.maxHeight = 0;
                para.style.transition = "all 2s ease-in-out";
                setTimeout(function(){azxx.appendChild(para);} , 1900);
                setTimeout(function(){para.style.maxHeight = "1800px";} , 2101);
                setTimeout(function(){document.querySelectorAll(".load.loa")[0].style.maxHeight = "0";} , 3001);
                setTimeout(function(){para.style.maxHeight = "99999999px";} , 4101);
                setTimeout(function(){para.style.maxHeight = para.offsetHeight+"px";} , 6201);
                setTimeout(function(){para.appendChild(document.querySelectorAll(".load.loa")[0].cloneNode(true));}, 3100);
                var loadclone = document.getElementById("load").cloneNode(true);
                loadclone.id = "loadmk";
                loadclone.onclick = loadmorekind;
                setTimeout(function(){para.appendChild(loadclone);}, 3100);
                document.getElementById("load").innerHTML = 'back <i class="fa fa-backward" aria-hidden="true"></i>';
                document.getElementById("load").onclick = back;
                setTimeout(function(){document.getElementById("popupactive").click();} , 4000);
                kindcounter++;
             }
         }
         xmlhttp.open("GET", "inc/loadkind.php?co=" + kindcounter + "&kind=" + getkind , true);
         xmlhttp.send();
}



function loadmorekind() {
    document.querySelectorAll(".load.loa")[1].style.maxHeight = "100px";
    if (document.readyState === "complete") {
        var gek=document.getElementById("hespe");
    if(gek==null){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }
    }
        if (document.readyState === "complete") {
            var gek=document.getElementById("hespe");
        if(gek==null || gek.style.display != "block" || gek.innerHTML != incopy){
            window.location.href="https://www.facebook.com/Si.HaMaDaAa";
        }}
         
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var azx = document.getElementById("searchresult");
                azx.style.maxHeight = (azx.scrollHeight + 1800) + "px";
                var para = document.createElement("div");
                para.innerHTML = xmlhttp.responseText;
                para.style.maxHeight = 0;
                para.style.overflow = "hidden";
                para.style.transition = "all 4s";
                azx.insertBefore(para, azx.lastChild.previousSibling);
                setTimeout(function(){para.style.maxHeight = "1800px";} , 1001);
                setTimeout(function(){document.querySelectorAll(".load.loa")[1].style.maxHeight = "0";} , 4001);
                kindcounter++;
             }
         }
         xmlhttp.open("GET", "inc/loadkind.php?co=" + kindcounter + "&kind=" + getkind , true);
         xmlhttp.send();
}