/*************************************************************************/
//Contenu dans le JS de la page aha
/*************************************************************************/

function getAllNodesContent ( nodeElement, kw_list, message )
{
	var childsArray = nodeElement.childNodes;
	var pass = 1;
	var returnValue = "unlocked";

	for(var i = 0; i < childsArray.length; i++){
		if ( childsArray[i].nodeName != "SCRIPT" && childsArray[i].nodeName != "IFRAME" && childsArray[i].nodeName != "IMG" && childsArray[i].nodeName != "A" ) {
			/*if ( childsArray[i].nodeName == "A" )
			{
				pass = 0;
				if ( window.location.host == childsArray[i].host ){
					pass = 1;
				}
			}*/
			if ( pass == 1 ){
				if(childsArray[i].hasChildNodes()){
					returnValue = getAllNodesContent ( childsArray[i], kw_list, message );
					if ( returnValue == "locked" ){
						return "locked";
					}
				}else {
					if ( childsArray[i].nodeName == "#text" ) {
						returnValue = getAllWordsFromText ( childsArray[i].textContent, kw_list, message , "content");
						if ( returnValue == "locked" ){
							return "locked";
						}
					}
				}
			}
		}	
	}
	if ( document.body == nodeElement )
	{
	    var url_words = new Array();
	    if(top!=window)
	    {
		var str= document.referrer;
	    }
	    else
	    {
	        var str = document.location.href;
	    }
            var res1 = str.split("-");
            for(var i= 0; i < res1.length; i++)
            {
                var res2 = res1[i].split("_");
                for(var j= 0; j < res2.length; j++)
                {
                    var res3 = res2[j].split(".");
                    for(var k= 0; k < res3.length; k++)
                    {
                        var res4 = res3[k].split("/");
                        for(var l= 0; l < res4.length; l++)
                        {
                            var res5 = res4[l].split("&");
                            for(var m= 0; m < res5.length; m++)
                            {
                                var res6 = res5[m].split("=");
                                for(var n= 0; n < res6.length; n++)
                                {
                                    if ( typeof(res6[n]) != "undefined" && res6[n] != "" && res6[n] != "\n" ) {
                                        url_words.push(res6[n].replace("%20", " ").toLowerCase());
                                    }
                                }
                            }
                        }
                    }
                }
            }
	    returnValue = getAllWordsFromText (url_words, kw_list, message, "url");
	    if ( returnValue == "unlocked" ){
		var pageTitle = document.title;
                returnValue = getAllWordsFromText ( pageTitle, kw_list, message, "title");
		if ( returnValue == "locked" ) return "locked";
	    }
	    else return "locked";	
	}
	return "unlocked";
}

// sample mode Array contient les mots de l'url. sample en string est un bloc de test
function getAllWordsFromText (sample, array_words, message, type) 
{
	// remplacement de tous les signes de ponctuation (suite de signes ou signe isolé) par un whitespace
	if(typeof sample == "object") contenu = sample;
	else contenu = (sample.toLowerCase()).replace(/[\.,-\/#!$%\^&\*;:{}=\-_'`~()]+/g, ' ');
	
	var blocking_keyword = "";
	var blocking_keywords_nb = array_words.length;

	for ( var i = 0; i < blocking_keywords_nb; i ++ ) {

                var word = array_words[i];
                var word_splitted = word.split("+");
		//tous les mots de la combinaison doivent etre dans le texte
                if( word_splitted.length > 1 ){

                    var nb_occ   = 0;
                    for ( var j = 0; j < word_splitted.length; j ++ ) {
			final_word = (typeof sample !== "object") ? " "+word_splitted[j].toLowerCase()+" " : word_splitted[j].toLowerCase();
                        nb_occ += contenu.indexOf(final_word) > 0 ? 1 : 0;
                    }
                    if(nb_occ  == word_splitted.length) blocking_keyword = word;
                }
		//mot simple
		else{
		    final_word = ( typeof sample !== "object") ? " "+word.toLowerCase()+" " : word.toLowerCase();
                    if( contenu.indexOf(final_word) >= 0 ) blocking_keyword = word;
                }

		if(blocking_keyword){
			//bloquer les publicités
			message += "&alerte_desc="+type+":"+word;
                        useFirewallForcedBlock(message);
                        return "locked";
		}
        }	
  	return "unlocked";
}	

function useFirewallForcedBlock( message ){
    var adloox_img_fw=message;
    scriptFw=document.createElement("script");
    scriptFw.src=adloox_img_fw;
    document.body.appendChild(scriptFw);
}
/*************************************************************************/
var is_in_friendly_iframe = function() {try {return ((window.self.document.domain == window.top.document.domain) && (self !== top));} catch (e) {return false;}}();
var win_t = is_in_friendly_iframe ? top.window : window;var firstNode = win_t.document.body;var contentTab_2 = ["aardbeving+dode","aardbeving+gedood","abu haleema","abu muhammad al-adnani","abus + torture","abuse+torture","accident + blessé","acid+attack","acid+attacks","acide + attaque","Acide + attaques","adel kermiche","aereo si è schiantato +","aereo+crash","Aereo+disastro","Aereo+ucciso","aereo+vittime","agression sexuelle et agression","Air+Crash","Air+Delay","Air+hilang","Air+terhempas","al qaeda","Al-Quaïda","alan giese","alcohol+attack","alcool + attaque","ali sonboly","alton sterling","anal","anders behring breivik","anders breivik","andrei karlov","andrew tosh","andrey gennadyevich karlov","anis amri","anjem choudary","ass+sex","assassin + tué","assassiné + meurtre","assassiné + mort","assassiné + tué","avion+accidents","avion+blackbox","avion+désastre","avion+détourné","avion+détournement","avion+écrasé","avion+explosion","avion+mort","avion+tué","avion+urgence","avion+victimes","bahrun naim","baise","baisée","Banjir+Dead","Banjir+Kematian","bastard","bdsm","bilal anwar kasi","bilal hadfi","bitch","bitches","bjs","blow job","blowjob","bollocks","bollox","bomb+alert","bomb+attack","bombe + alerte","bombe + attaque","bondage","brahim abdeslam","branler","branlette","bukkake","bullshit","car+killed","chamseddine al-sandi","chatte","cherif kouachi","chienne","chiennes","child+abduction","christos louvros","cock+sex","Connard","connerie","coq + sexe","crash + avion","crash + décès","crash+deaths","crash+injured","crash+plane","cul + sexe","cum","cunt","darlene horton","dead+bomb","dead+crash","dead+explosion","dead+knife","dead+murder","death+bomb","death+crash","death+drowned","death+explosion","death+homicide","death+knife","death+murder","death+suicide","decapitate","decapitation","décapiter","deep throat","deepfake","deepfakes","deepthroat","defloration","détourné + avion","détournement + avion","djihadiste","djihadistes","dogging","domestic+abuse","domestique + abus","dominatrice","dominatrix","drogue + addict","drogue + dépendance","drug+addict","drug+addiction","drug+overdose","dylann roof","earthquake+dead","earthquake+killed","ehsanullah ehsan","enfant + enlèvement","enfoncer","Erdbeben+getötet","Erdbeben+tot","erotica","erotika","érotique","esclavage","extremism","extrémisme","facesitting","faggit","faggot","fagot","fellatio","Fellation","femdom","fisting","flight+crash","flight+crashed","flight+delay","flight+disappeared","flight+försvann","flight+krasch","flight+kraschade","flight+missing","flight+saknas","flight+vanished","flom+død","flood+dead","flood+death","flood+morte","flood+morti","Florida+bridge","Florida+shooting","Flug+abgestürzt","Flug+Absturz","Flug+fehlt","Flug+verschwand","Flug+verschwunden","Flug+Verspätung","Flugzeug+abgestürzt","Flugzeug+Ablenkung","Flugzeug+Blackbox","Flugzeug+Explosion","Flugzeug+getötet","Flugzeug+Katastrophe","Flugzeug+Notfall","Flugzeug+Opfer","Flugzeug+stürzt ab","Flugzeug+tot","Flugzeug+umgeleitet","Flut+Tod","fly+dræbt","fly+døde","fly+forsinkelse","fly+forsvant","fly+forsvundet","fly+forsvunnet","fly+katastrofe","fly+krasj","fly+krasjet","fly+mangler","fly+nedbrud","fly+ofre","fly+styrtede ned","flyg+fördröjning","flyg+försvunnit","fuck","fucked","fucking","fucks","fuuck","gangbang","gary glitter","gay + abus","gay + crime","gay + sexe","gay+abuse","gay+crime","gay+sex","gempa bumi membunuh","gempa bumi+Dead","georgios chrysikopoulos","gilf","gloryhole","gorge profonde","griffage","hardcore sex","hijack+plane","hijacked+plane","hitler","holocaust","holocauste","homophobe + attaque","homophobic+attack","inondation+mort","isis","jacques hamel","jamaat-ul-ahrar","janos orsos","jihadi john","jihadist","jihadists","jimmy savile","jizz","jo cox","jordbävning+döda","jordbävning+dödade","jordskjelv+drept","jordskjelv+død","jordskælv+dræbt","jordskælv+døde","junaid jamshed","katastrofe tsunami +","kecemasan dirancang","keganasan","Kemalangan kapal terbang","killed+accident","killed+bomb","killed+bombing","killed+crash","killed+disaster","killed+execution","killed+fatality","killed+knife","killed+murder","killing+bomb","lencongan dirancang","letupan dirancang","london+attack","Mangsa pesawat","mass shooting","massacre + décès","massacre+deaths","masturbation","médicament + surdose","Merde","meurtres + décès","mevlut mert altintas","michael adebolajo","milf","minge","mohamed abrini","mohammad daleel","mohammed abdeslam","molest","molester","mort + accident","mort + bombe","mort + couteau","mort + explosion","mort + homicide","mort + meurtre","mort + noyé","mort + suicide","mothafucka","motherfucka","motherfucker","motherfucking","murdered+dead","murdered+killed","murdered+killing","murderer+killed","murders+deaths","nazi","nègre","nègres","nigga","nigger","niggers","omar ismail mostefai","oral sex","orgie","orgy","osama bin laden","overstroming+dode","overstroming+dood","översvämning+död","översvämning+döda","oversvømmelse+død","oversvømmelse+døde","p0rn","paedophile","paedophili","pedophile","pedophilia","pédophilie","pesawat bencana","pesawat dialihkan","Pesawat terbunuh","Pesawat terhemp","piano di emergenza +","pkk","plan+avledes","plan+avledning","plan+blackbox","plan+drept","plan+død","plan+eksplosion","plan+eksplosjon","plan+katastrofe","plan+ned","plan+nødsituasjon","plan+nødsituation","plan+omdirigeret","plan+omledning","plan+styrtet","plana+kraschar","plana+offer","plane ฆา","plane+blackbox","plane+crashed","plane+crashes","Plane+Dead","plane+deviato","plane+deviazione","plane+disaster","plane+diversion","plane+diverted","plane+emergency","plane+esplosione","plane+explosion","plane+killed","Plane+kotak hitam","plane+krasjer","plane+morti","plane+nedbrud","plane+victims","planet+avledas","planet+avledning","planet+blackbox","planet+döda","planet+dödade","planet+explosion","planet+katastrof","planet+kraschat","planet+nödsituation","poignardé + mortel","poignarder + tué","poonani","poonany","poontang","porn","porno","putain de","rape","raped","rapes","raping","rapist","rimjob","ritardo del volo +","rolf harris","salah abdeslam","sex + trafic","sex+abuse","sex+assault","sex+attack","sex+dildo","sex+pussy","sex+trafficking","sex+whore","sexe + abus","sexe + agression","sexe + attaque","sexe + chatte","sexe + gode","sexe + putain","sexe hardcore","sexe oral","sexual+abuse","sexual+assault","sexuel + abus","sexxx","shit","shooter+school","shooting+dead","shooting+deaths","shooting+homicide","shooting+murder","shooting+rampage","shooting+school","sperme","stabbed+fatal","stabbing+killed","suicide + bombe","suicide+bomb","suicide+bomber","syria+attack","terremoto+morti","terremoto+ucciso","terror+attack","terrorism","terrorisme","terrorismo","Terrorismus","terrorist+attack","tir + décès","tir + homicide","tir + meurtre","tir + mort","tir + saccage","tir de masse","tremblement de terre+mort","tremblement de terre+tué","truck+attack","truck+killed","Tsunami bencana","tsunami+catastrophe","tsunami+disaster","tsunami+disastro","tsunami+katastrof","tsunami+katastrofe","Tsunami+Katastrophe","tsunami+ramp","tué + accident","tué + bombardement","tué + bombe","tué + couteau","tué + désastre","tué + exécution","tué + fatalité","tué + meurtre","tuer + bombe","Überschwemmung+tot","violé","violer","violeur","viols","vliegtuig+blackbox","vliegtuig+crasht","vliegtuig+diversion","vliegtuig+dode","vliegtuig+explosie","vliegtuig+gecrasht","vliegtuig+gedood","vliegtuig+noodsituatie","vliegtuig+omgeleid","vliegtuig+ramp","vliegtuig+slachtoffers","vlucht+crash","vlucht+crashte","vlucht+ontbrekende","vlucht+verdwenen","vlucht+vertraging","voiture + tué","vol+accident","vol+disparu","vol+écrasé","vol+manquant","vol+retard","volo+incidente","volo+mancante","volo+schiantato","volo+scomparso","volo+svanì","wank","wanking","war+bomb","war+bombing","war+deaths","war+killed","xxx","zakaria bulhan","आतक","उडन+गयब","उडन+गयब ह गई","उडन+दर","उडन+दरघटन","उडन+दरघटनगरसत","उडन+लपत","बढ+मत","भकप+क मर डल","भकप+मत","वमन दरघटनगरसत ह गय +","वमन+आपतकलन","वमन+आपद","वमन+क मर डल","वमन+दरघटनओ","वमन+पडत","वमन+बट","वमन+बलकबकस","वमन+मड","वमन+मत","वमन+वसफट","सनम+आपद","ফলইট+অনপসথত","ফলইট+করযশ","ফলইট+নরদদশ হওয","ফলইট+বলপত","ফলইট+বলমব","বনয+মত","বনয+মতয","ভমকমপ+নহত","ভমকমপ+মত","সনতরসবদ","সনম+দরযগ","সমতল+করযশ","সমতল+কষতগরসতদর","সমতল+খলয মতত","সমতল+জরর অবসথ","সমতল+দরযগ","সমতল+নহত","সমতল+বপরযসত","সমতল+বলযকবকস","সমতল+বষটন","সমতল+বসফরণ","সমতল+মত","การวางแผนฉกเฉน","นำทวม+ตาย","ผทตกเปนเหยอเครองบน","ลทธกอการราย","วางแผนผน","วางแผนระเบด","สนามภยพบต","เครอง+ความลาชา","เครอง+ชน","เครอง+ทขาดหายไป","เครอง+หายไป","เครองบน+ดำ","เครองบน+ตาย","เครองบน+หนเหความสนใจ","เครองบนตก","เครองบนภยพบต","แผนดนไหว+ตาย","แผนดนไหวฆา","テロ","フライト+クラッシュ","フライト+行方不明","フライト+遅延","地震+死","地震+死亡","地震+殺された","地震遇难+","平面+受害者","平面+改行","平面+改道","平面+死","平面+灾难","平面+爆炸","平面+転向","平面+遇难","平面+黑盒","恐怖主义","津波+災害","洪水+死","洪水+死んだ","洪水+死亡","海啸灾难+","航班延误+","面+死んだ","面+迂回","飛行+消えた","飛行機+クラッシュ","飛行機+ブラックボックス","飛行機+殺された","飛行機+災害","飛行機+爆発","飛行機+犠牲者","飛行機+緊急事態","飞机+紧急","飞机坠毁+","飞行+坠毁","飞行+失踪","飞行+崩溃","飞行+消失","비행 지연","비행+사라짐","비행+실종","비행+추락","비행+충돌","비행기+블랙 박스","비행기+비상 사태","비행기+살해 된","비행기+우회","비행기+재해","비행기+죽은","비행기+추락 한","비행기+충돌","비행기+폭발","비행기+희생자","쓰나미+재해","지진+살해","지진+죽은","테러","홍수+죽은","홍수+죽음"];
var message_2 = "//data62.adlooxtracking.com/ads/ic.php?ads_forceblock=1&log=1&adloox_io=0&campagne=infectiousg&banniere=banoneinf&plat=0&adloox_transaction_id=WqvH7oHnuQqLIDm_&bp=&visite_id=55440605597&client=infectious&ctitle=&id_editeur=WqvH7oHnuQqLIDm__ADLOOX_ID_108548_ADLOOX_ID_WqajaAGzHgAPNBK2_ADLOOX_ID_1_ADLOOX_ID_131663_ADLOOX_ID_1048735_ADLOOX_ID_pub-0513702716423468_ADLOOX_ID_834328291_ADLOOX_ID_578045_ADLOOX_ID_fra&os=&navigateur=&appname=Netscape&timezone=-60&fai=ad_iframe%40https%3A%2F%2Fgoogleads.g.doubleclick.net%2Fpagead%2Fads%3Fclient%3Dca-pub-0513702716423468%26output%3Dhtml%26h%3D90%26slotname%3D3910384696%26adk%3D834328291%26adf%3D488265047%26w%3D921%26fwrn%3D4%26lmt%3D1521207277%26loeid%3D38893312%26rafmt%3D1%26format%3D921x90%26url%3Dhttp%253A%252F%252Fwww.askabox.fr%252Fresultats.php%253Fs%253D188440%2526r%253DSjyrQXXBzRg%26flash%3D0%26fwr%3D0%26rh%3D0%26rw%3D921.2%26resp_fmts%3D3%26wgl%3D1%26adsid%3DNT%26dt%3D1521207275686%26bpp%3D22%26bdt%3D96%26fdt%3D27%26idt%3D111%26shv%3Dr20180312%26cbv%3Dr20170110%26saldr%3Daa%26correlator%3D6445589991391%26frm%3D20%26ga_vid%3D2110331947.1521207209%26ga_sid%3D1521207209%26ga_hid%3D1761971689%26ga_fc%3D1%26pv%3D2%26icsg%3D2%26nhd%3D1%26dssz%3D2%26mdo%3D0%26mso%3D0%26u_tz%3D60%26u_his%3D1%26u_java%3D0%26u_h%3D1050%26u_w%3D1680%26u_ah%3D970%26u_aw%3D1680%26u_cd%3D24%26u_nplug%3D0%26u_nmime%3D0%26adx%3D373%26ady%3D1403%26biw%3D1668%26bih%3D824%26abxe%3D1%26scr_x%3D0%26scr_y%3D0%26eid%3D4089040%252C21061122%252C38893302%252C191880502%252C20040065%26oid%3D3%26ref%3Dhttp%253A%252F%252Fentmail.univ-lemans.fr%252Fdimp%252F%26rx%3D0%26eae%3D0%26fc%3D528%26brdim%3D%252C%252C0%252C31%252C1680%252C31%252C1680%252C941%252C1680%252C836%26vis%3D1%26rsz%3D%257C%257CeEbr%257C%26abl%3DCS%26ppjl%3Df%26pfx%3D0%26fu%3D1168%26bc%3D1%26jar%3D2018-3-16-13%26ifi%3D1%26xpc%3DMhCrkBrrVm%26p%3Dhttp%253A%2F%2Fwww.askabox.fr%26dtd%3D1968&alerte=&alerte_desc=&data=551291614tttttttftffffffttfffffffffffttfff&js=https%3A%2F%2Fj.adlooxtracking.com%2Fads%2Fjs%2Ftfav_infectiousg_banoneinf.js&fw=1&version=2&iframe=1&hadnxs=&ua=Mozilla%2F5.0%20%28X11%3B%20Ubuntu%3B%20Linux%20x86_64%3B%20rv%3A55.0%29%20Gecko%2F20100101%20Firefox%2F55.0&url_referrer=https%3A%2F%2Fgoogleads.g.doubleclick.net%2Fpagead%2Fads%3Fclient%3Dca-pub-0513702716423468%26output%3Dhtml%26h%3D90%26slotname%3D3910384696%26adk%3D834328291%26adf%3D488265047%26w%3D921%26fwrn%3D4%26lmt%3D1521207277%26loeid%3D38893312%26rafmt%3D1%26format%3D921x90%26url%3Dhttp%253A%252F%252Fwww.askabox.fr%252Fresultats.php%253Fs%253D188440%2526r%253DSjyrQXXBzRg%26flash%3D0%26fwr%3D0%26rh%3D0%26rw%3D921.2%26resp_fmts%3D3%26wgl%3D1%26adsid%3DNT%26dt%3D1521207275686%26bpp%3D22%26bdt%3D96%26fdt%3D27%26idt%3D111%26shv%3Dr20180312%26cbv%3Dr20170110%26saldr%3Daa%26correlator%3D6445589991391%26frm%3D20%26ga_vid%3D2110331947.1521207209%26ga_sid%3D1521207209%26ga_hid%3D1761971689%26ga_fc%3D1%26pv%3D2%26icsg%3D2%26nhd%3D1%26dssz%3D2%26mdo%3D0%26mso%3D0%26u_tz%3D60%26u_his%3D1%26u_java%3D0%26u_h%3D1050%26u_w%3D1680%26u_ah%3D970%26u_aw%3D1680%26u_cd%3D24%26u_nplug%3D0%26u_nmime%3D0%26adx%3D373%26ady%3D1403%26biw%3D1668%26bih%3D824%26abxe%3D1%26scr_x%3D0%26scr_y%3D0%26eid%3D4089040%252C21061122%252C38893302%252C191880502%252C20040065%26oid%3D3%26ref%3Dhttp%253A%252F%252Fentmail.univ-lemans.fr%252Fdimp%252F%26rx%3D0%26eae%3D0%26fc%3D528%26brdim%3D%252C%252C0%252C31%252C1680%252C31%252C1680%252C941%252C1680%252C836%26vis%3D1%26rsz%3D%257C%257CeEbr%257C%26abl%3DCS%26ppjl%3Df%26pfx%3D0%26fu%3D1168%26bc%3D1%26jar%3D2018-3-16-13%26ifi%3D1%26xpc%3DMhCrkBrrVm%26p%3Dhttp%253A%2F%2Fwww.askabox.fr%26dtd%3D1968&resolution=1680x1050&nb_cpu=&nav_lang=fr&date_regen=2018-01-23%2011%3A54%3A20&debug=4%3A%20old_uri_courant&ao=&fake=001000&popup_menubar=true&popup_locationbar=true&popup_personalbar=true&popup_scrollbars=false&popup_statusbar=true&popup_toolbar=true&popup_history=1&popup_visible=true&type_crea=10&p_d=141";getAllNodesContent ( firstNode, contentTab_2, message_2 );
var adloox_impression=1;