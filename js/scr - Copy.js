var ygyg = "1";
function load() {
	document.querySelectorAll(".load.loa")[0].style.maxHeight = "100px";
	if (document.readyState === "complete") {
        var gek=document.getElementById("hespe");
    if(gek==null){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }
	}
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             	var para = document.createElement("div");
             	para.innerHTML = xmlhttp.responseText;
             	para.style.maxHeight = 0;
             	para.style.transition = "all 4s";
             	var azx = document.getElementById("blal");
				azx.appendChild(para);
             	setTimeout(function(){para.style.maxHeight = "1760px";} , 1001);
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
		var kkk = jjj.getElementsByClassName('sub-info0')[0];
		var lll = kkk.getElementsByTagName('div')[0];
		kkk.style.right = "114px";
		kkk.style.bottom = "40px";
		lll.style.left = "198.5px";
		lll.style.top = "193px";
		//..................................................
		jjjmk = setTimeout(function(){jjj.getElementsByClassName('sub-im')[0].style.display="block";} , 2000);
		jjjmk0 = setTimeout(function(){jjj.getElementsByClassName('subcats')[0].style.opacity=1;} , 2000);
		jjjmk1 = setTimeout(function(){jjj.getElementsByClassName('subcats')[0].style.top="10px";} , 2000);
		jjjmk2 = setTimeout(function(){jjj.getElementsByClassName('subkind')[0].style.top=0;} , 2000);
	}

	window.onload = function(){
    var prok=document.getElementById("hespe");   
    if(prok==null){
        window.location.href="https://www.facebook.com/Si.HaMaDaAa";
    }else{
    	prok.innerHTML = "All Rights Resrved to ©AnimeStorm.com<br/>Coded BY SI-HAMADA & Desinged BY Ostora";
    	prok.style.background = "#5c5b5b";
    	prok.style.borderRadius = "10px";
    	prok.style.color = "#fff";
    	prok.style.padding = "5px 15px 5px 5px";
    	prok.style.textAlign = "center";
    	prok.style.width = "65%";
    	prok.style.margin = "5px auto";
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
		console.log(azxhe);
		azx.style.maxHeight = azxhe+"px";
		setTimeout(function(){azx.style.maxHeight = "0";} , 1001);
	}
	console.log(searchw);
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             	var para = document.createElement("div");
             	para.id = "searchresult"
             	para.innerHTML = xmlhttp.responseText;
             	para.style.maxHeight = 0;
             	para.style.transition = "all 2s ease-in-out";
				setTimeout(function(){azxx.appendChild(para);} , 1900);
             	setTimeout(function(){para.style.maxHeight = "1760px";} , 2101);
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
	setTimeout(function(){azx.style.maxHeight = "1760px";} , 2100);
	setTimeout(function(){azx.style.maxHeight = "99999999px";} , 3151);
	setTimeout(function(){azx.style.maxHeight = "auto";} , 3251);
	setTimeout(function(){document.getElementById("load").innerHTML = 'LoadMore <i class="fa fa-refresh" aria-hidden="true"></i>';} , 2501);
    setTimeout(function(){document.getElementById("load").onclick = load;} , 2501);
    setTimeout(function(){document.querySelectorAll(".load.loa")[0].style.maxHeight = "0";} , 2001);
	console.log("fdf");
}




function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var timeinterval = setInterval(function () {
        //minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        //minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        //display.textContent = minutes + ":" + seconds;
        display.textContent = seconds;

        if (--timer < 0) {
            clearInterval(timeinterval);
            document.querySelector('#redir-a').click();
            //location.href = '#';
                    }
    }, 1000);

}

