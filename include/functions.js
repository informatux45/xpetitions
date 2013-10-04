/* ******************************************* */
/*                INFORMATUX                   */
/*         http://www.informatux.com/          */
/*       SOLUTIONS AND WEB DEVELOPMENT         */
/*             Patrice BOUTHIER                */
/*                   2008                      */
/* ------------------------------------------- */
/*    XOOPS - PHP Content Management System    */
/*         Copyright (c) 2000 XOOPS.org        */
/*            <http://www.xoops.org/>          */
/* ******************************************* */

/* <!-- DEBUT DE CONTROLE D'EMAIL --> */
function checkEmail(emailAddr) {
	/* Cette fonction verifie la bon format d'une adresse e-mail.
	// Comme :
	// user@domain.com ou user.perso@domain.com */
	
	var i;
	
	/* Recherche de @ */
	i = emailAddr.indexOf("@");
	if (i == -1) {
		return false;
	}
	
	/* Separation du nom de l'utilisateur et du nom de domaine. */
	var username = emailAddr.substring(0, i);
	var domain = emailAddr.substring(i + 1, emailAddr.length)

	/* Recherche des espaces au debut du nom de l'utilisateur. */
	i = 0;
	while ((username.substring(i, i + 1) == " ") && (i < username.length)) {
		i++;
	}
	/* Les enleve s'il en trouve. */
	if (i > 0) {
		username = username.substring(i, username.length);
	}

	/* Recherche d'espaces Ã  la fin du nom de domaine. */
	i = domain.length - 1;
	while ((domain.substring(i, i + 1) == " ") && (i >= 0)) {
		i--;
	}
	/* Les enleve s'il en trouve. */
	if (i < (domain.length - 1)) {
		domain = domain.substring(0, i + 1);
	}

	/* Verifie que le nom de l'utilisateur et du domaine ne soit pas vide. */
	if ((username == "") || (domain == "")) {
		return false;
	}
	
	/* Verifie s'il n'y a pas de caracteres interdits dans le nom de l'utilisateur. */
	var ch;
	for (i = 0; i < username.length; i++) {
		ch = (username.substring(i, i + 1)).toLowerCase();
		if (!(((ch >= "a") && (ch <= "z")) || 
			((ch >= "0") && (ch <= "9")) ||
			(ch == "_") || (ch == "-") || (ch == "."))) {
				return false;
		}
	}
	
	/* Verifie s'il n'y a pas de caracteres interdits dans le nom de domaine */
	for (i = 0; i < domain.length; i++) {
		ch = (domain.substring(i, i + 1)).toLowerCase();
		if (!(((ch >= "a") && (ch <= "z")) || 
			((ch >= "0") && (ch <= "9")) ||
			(ch == "_") || (ch == "-") || (ch == "."))) {
				return false;
		}
	}

/* AJOUTER CI-DESSOUS DE NOUVEAUX NOMS DE DOMAINE */

var aSuffix = new Array("com","net","int","aero","biz","museum","name","arpa","info","coop","pro","eu","edu","org","gov","mil","bj","dz","de","ad","ae","af","ag","ai","al","am","an","ao","aq","ar","as","at","au","aw","az","ba","bb","bd","be","bf","bg","bh","bi","bj","bm","bn","bo","br","bs","bt","bv","bw","by","bz","ca","cc","cf","cd","cg","ch","ci","ck","cl","cm","cn","co","cr","cs","cu","cv","cx","cy","cz","de","dj","dk","dm","do","dz","ec","ee","eg","eh","er","es","et","fi","fj","fk","fm","fo","fr","fx","ga","gb","gd","ge","gf","gh","gi","gl","gm","gn","gp","gq","gr","gs","gt","gu","gw","gy","hk","hm","hn","hr","ht","hu","id","ie","il","in","io","iq","ir","is","it","jm","jo","jp","ke","kg","kh","ki","km","kn","kp","kr","kw","ky","kz","la","lb","lc","li","lk","lr","ls","lt","lu","lv","ly","ma","mc","md","mg","mh","mk","ml","mm","mn","mo","mp","mq","mr","ms","mt","mu","mv","mw","mx","my","mz","na","nc","ne","nf","ng","ni","nl","no","np","nr","nt","nu","nz","om","pa","pe","pf","pg","ph","pk","pl","pm","pn","pr","pt","pw","py","qa","re","ro","ru","rw","sa","sb","sc","sd","se","sg","sh","si","sj","sk","sl","sm","sn","so","sr","st","su","sv","sy","sz","tc","td","tf","tg","th","tj","tk","tm","tn","to","tp","tr","tt","tv","tw","tz","ua","ug","uk","um","us","uy","uz","va","vc","ve","vg","vi","vn","vu","wf","ws","ye","yt","yu","za","zm","zr","zw");
	var bFoundSuffix = false;
	i = 0;
	while (i < aSuffix.length) {
		if (("." + aSuffix[i]) == domain.substring(domain.length - aSuffix[i].length - 1, domain.length)) {
			return true;
		}
		i++;
	}
	/* Si le nom de domaine est inconnu  : return false */
	return false;
	
}
	

function Email(IDemail, msgalert) {
	// emailAddr = document.getElementById('email').value
	// msgalert  = message d'alerte en cas
	emailAddr = $(IDemail).value;
	if (!(checkEmail(emailAddr))) {
		alert(msgalert);
		$(IDemail).focus();
		return false;
	} else
	return true
}
/* <!-- FIN DE CONTROLE D'EMAIL --> */

function $(elemid) {
id = document.getElementById(elemid);
return id;
}

function formatEmail(id1, id2) {
var texte  = $(id1).value;
var spanid = $(id2);
spanid.innerHTML = texte;
}

function helpMenu(obj) {
var elemid = $(obj);
 if(elemid.style.display != "block") {
  elemid.style.display = "block";
 } else {
  elemid.style.display = "none";
 }
}

function chdiv(div, txt) {
var elem = $(div);
elem.innerHTML = txt;
}

function redirect(x){
for (m=temp.options.length-1;m>0;m--)
temp.options[m]=null
for (i=0;i<group[x].length;i++){
temp.options[i]=new Option(group[x][i].text,group[x][i].value)
}
temp.options[0].selected=true
}

function go(){
location=temp.options[temp.selectedIndex].value
}