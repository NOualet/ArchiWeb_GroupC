//INIT PHP

//INIT JS
var max_elements=document.getElementById("max_elements").value;
var max_choixrep=document.getElementById("max_choixrep").value;


//liste_elements=[];
var nb_elements=0;
var tableau_nb_choixrep=[];

var bloc_creer_contenu=document.getElementById("creer_contenu");
var bloc_t=document.getElementById("bloc_t");
var lignechoixrep_t_u=document.getElementById("lignechoixrep_t_u");
var bt_newQ=document.getElementById("bt_newQ");

bloc_t.style.display = 'none';
lignechoixrep_t_u.style.display = 'none';
addEvent(bt_newQ,"click",ajouterQuestion);


//ACTIVATION BANDEAU & BOUTONS
addEvent(window, 'load', function() {
var form_creer=document.getElementById('form_creer');
addEvent(document.getElementById('sm_creer_contenu'),'click',function(){document.getElementById('sm_menu_creer_encours').value='sm_creer_contenu';document.getElementById('nb_elements').value=nb_elements;for(var k=1,cc=nb_elements;k<=cc;k++){document.getElementById('nb_choixrep_'+k).value=tableau_nb_choixrep[k];};document.getElementById('chargementencours').style.display = 'block';form_creer.submit();});addEvent(document.getElementById('sm_creer_visualiser'),'click',function(){document.getElementById('sm_menu_creer_encours').value='sm_creer_visualiser';document.getElementById('nb_elements').value=nb_elements;for(var k=1,cc=nb_elements;k<=cc;k++){document.getElementById('nb_choixrep_'+k).value=tableau_nb_choixrep[k];};document.getElementById('chargementencours').style.display = 'block';form_creer.submit();});addEvent(document.getElementById('sm_creer_miseenforme'),'click',function(){document.getElementById('sm_menu_creer_encours').value='sm_creer_miseenforme';document.getElementById('nb_elements').value=nb_elements;for(var k=1,cc=nb_elements;k<=cc;k++){document.getElementById('nb_choixrep_'+k).value=tableau_nb_choixrep[k];};document.getElementById('chargementencours').style.display = 'block';form_creer.submit();});addEvent(document.getElementById('sm_creer_options'),'click',function(){document.getElementById('sm_menu_creer_encours').value='sm_creer_options';document.getElementById('nb_elements').value=nb_elements;for(var k=1,cc=nb_elements;k<=cc;k++){document.getElementById('nb_choixrep_'+k).value=tableau_nb_choixrep[k];};document.getElementById('chargementencours').style.display = 'block';form_creer.submit();});addEvent(document.getElementById('sm_creer_enregistrer'),'click',function(){document.getElementById('sm_menu_creer_encours').value='sm_creer_enregistrer';document.getElementById('nb_elements').value=nb_elements;for(var k=1,cc=nb_elements;k<=cc;k++){document.getElementById('nb_choixrep_'+k).value=tableau_nb_choixrep[k];};document.getElementById('chargementencours').style.display = 'block';form_creer.submit();});if(document.getElementById('bt_showmodeles')!=null){addEvent(document.getElementById('bt_showmodeles'),"click",function(){document.getElementById('show_modeles').value='GO';document.getElementById('nb_elements').value=nb_elements;for(var k=1,cc=nb_elements;k<=cc;k++){document.getElementById('nb_choixrep_'+k).value=tableau_nb_choixrep[k];};document.getElementById('chargementencours').style.display = 'block';form_creer.submit();});}
addEvent(document.getElementById('bt_save_questionnaire'),"click",function(){document.getElementById('save_questionnaire').value='GO';document.getElementById('sm_menu_creer_encours').value='sm_creer_enregistrer';document.getElementById('nb_elements').value=nb_elements;for(var k=1,cc=nb_elements;k<=cc;k++){document.getElementById('nb_choixrep_'+k).value=tableau_nb_choixrep[k];};document.getElementById('chargementencours').style.display = 'block';form_creer.submit();});

if(document.getElementById('tooltip_modeles')!=null){
addEvent(document.getElementById('tooltip_modeles'),"click",function(){$('#bloc_exp_modeles').show('blind');});
addEvent(document.getElementById('tooltip_modeles_hide'),"click",function(){$('#bloc_exp_modeles').hide('blind');});
}
if(document.getElementById('tooltip_sauvintermediaire_sans')!=null){
addEvent(document.getElementById('tooltip_sauvintermediaire_sans'),"click",function(){$('#bloc_exp_sauvintermediaire_sans').show('blind');});
addEvent(document.getElementById('tooltip_sauvintermediaire_sans_hide'),"click",function(){$('#bloc_exp_sauvintermediaire_sans').hide('blind');});
}
if(document.getElementById('tooltip_sauvintermediaire_avec')!=null){
$('#bloc_exp_sauvintermediaire_avec').show('blind');
addEvent(document.getElementById('tooltip_sauvintermediaire_avec'),"click",function(){$('#bloc_exp_sauvintermediaire_avec').show('blind');});
addEvent(document.getElementById('tooltip_sauvintermediaire_avec_hide'),"click",function(){$('#bloc_exp_sauvintermediaire_avec').hide('blind');});
}
});


//AFFICHAGE SELON SOUS MODULE
addEvent(window, 'load', function() {
switch (document.getElementById('sm_menu_creer_encours').value)
{
	case "":
	case "sm_creer_contenu":
document.getElementById('chargementencours').style.display = 'none';
document.getElementById('creer_contenu').style.display = 'block';
document.getElementById('creer_visualiser').style.display = 'none';
document.getElementById('creer_miseenforme').style.display = 'none';
document.getElementById('creer_options').style.display = 'none';
document.getElementById('creer_enregistrer').style.display = 'none';
document.getElementById('creer_enregistrer_ok').style.display = 'none';
document.getElementById('creer_showmodeles').style.display = 'none';
document.getElementById('creer_showsauvintermediaire').style.display = 'none';
	break;
	case "sm_creer_visualiser":
document.getElementById('chargementencours').style.display = 'none';
document.getElementById('creer_contenu').style.display = 'none';
document.getElementById('creer_visualiser').style.display = 'block';
document.getElementById('creer_miseenforme').style.display = 'none';
document.getElementById('creer_options').style.display = 'none';
document.getElementById('creer_enregistrer').style.display = 'none';
document.getElementById('creer_enregistrer_ok').style.display = 'none';
document.getElementById('creer_showmodeles').style.display = 'none';
document.getElementById('creer_showsauvintermediaire').style.display = 'none';
	break;
	case "sm_creer_miseenforme":
document.getElementById('chargementencours').style.display = 'none';
document.getElementById('creer_contenu').style.display = 'none';
document.getElementById('creer_visualiser').style.display = 'none';
document.getElementById('creer_miseenforme').style.display = 'block';
document.getElementById('creer_options').style.display = 'none';
document.getElementById('creer_enregistrer').style.display = 'none';
document.getElementById('creer_enregistrer_ok').style.display = 'none';
document.getElementById('creer_showmodeles').style.display = 'none';
document.getElementById('creer_showsauvintermediaire').style.display = 'none';
	break;
	case "sm_creer_options":
document.getElementById('chargementencours').style.display = 'none';
document.getElementById('creer_contenu').style.display = 'none';
document.getElementById('creer_visualiser').style.display = 'none';
document.getElementById('creer_miseenforme').style.display = 'none';
document.getElementById('creer_options').style.display = 'block';
document.getElementById('creer_enregistrer').style.display = 'none';
document.getElementById('creer_enregistrer_ok').style.display = 'none';
document.getElementById('creer_showmodeles').style.display = 'none';
document.getElementById('creer_showsauvintermediaire').style.display = 'none';
	break;
	case "sm_creer_enregistrer":
document.getElementById('chargementencours').style.display = 'none';
document.getElementById('creer_contenu').style.display = 'none';
document.getElementById('creer_visualiser').style.display = 'none';
document.getElementById('creer_miseenforme').style.display = 'none';
document.getElementById('creer_options').style.display = 'none';
document.getElementById('creer_enregistrer').style.display = 'block';
document.getElementById('creer_enregistrer_ok').style.display = 'none';
document.getElementById('creer_showmodeles').style.display = 'none';
document.getElementById('creer_showsauvintermediaire').style.display = 'none';
	break;
}
});



//FONCTIONS JS AJOUT-SUPPR-DEPLACEMENT ELEMENTS
function ajouterQuestion(modecreation) {
var modecreation = (typeof modecreation !== 'undefined') ? modecreation : true;
if(nb_elements>=max_elements) {}
else {
	var newQ=bloc_t.cloneNode(true);
	nb_elements++;
	newID=nb_elements;
	tableau_nb_choixrep[newID]=0;
	MAJID(newQ,newID);
	bloc_creer_contenu.insertBefore(newQ,bt_newQ);
	if(modecreation) {
		ajouterChoixReponse(newQ);
		ajouterChoixReponse(newQ);
		ajouterChoixReponse(newQ);
	}
	active_visibility(newID);
	active_boutons(newID);
	newQ.style.display = 'block';
	
}

}

function ajouterChoixReponse(Q_encours) {
var id_encours=parseInt(Q_encours.id.split('_')[1],10);
var position_new_CR=document.getElementById('position_new_CR_'+id_encours);
var bloc_choix_reponse=document.getElementById('bloc_choix_reponse_'+id_encours);

if(tableau_nb_choixrep[id_encours]>=max_choixrep) {}
else {
	var newCR=lignechoixrep_t_u.cloneNode(true);
	tableau_nb_choixrep[id_encours]=tableau_nb_choixrep[id_encours]+1;
	newID_CR=tableau_nb_choixrep[id_encours];
	MAJID_CR(newCR,newID_CR,id_encours);
	bloc_choix_reponse.insertBefore(newCR,position_new_CR);
	active_boutons_CR(id_encours,newID_CR);
	newCR.style.display = 'block';
	maj_lib_cr(id_encours,newID_CR);
}

}

function supprimerQuestion(Q_supp) {
//if (confirm(document.getElementById('msg_confirm_supprQ').innerHTML)) {
	
$("#msg_confirm_supprQ").dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
	  closeText: document.getElementById('msg_bt_annuler').innerHTML,
      buttons: [
			{
			  text: document.getElementById('msg_bt_confirmer').innerHTML,
			  click: function() {
					var id_encours=parseInt(Q_supp.id.split('_')[1],10);
					MAJID(Q_supp,'suppr');
					MAJID_CR_chgmtIDQ(Q_supp,id_encours,'suppr');
					bloc_creer_contenu.removeChild(Q_supp);
					for (var i = id_encours+1, c = nb_elements; i <= c; i++) {
					var Q_encours=document.getElementById('bloc_'+i);
					MAJID(Q_encours,i-1);
					MAJID_CR_chgmtIDQ(Q_encours,i,i-1);
					}
					nb_elements--;
					supprimerTooltip();
					$( this ).dialog( "close" );
			  }
			},
			{
			  text: document.getElementById('msg_bt_annuler').innerHTML,
			  click: function() {
					$( this ).dialog( "close" );
			  }
			}			
		  ]
    });

/* } else {
    // Do nothing!
} */
} 



function supprimerChoixReponse(CR_supp) {
//if (confirm(document.getElementById('msg_confirm_supprCR').innerHTML)) {
	var id_Q=parseInt(CR_supp.id.split('_')[1],10);
	var id_CR=parseInt(CR_supp.id.split('_')[2],10);
	var blocCR_encours=CR_supp.parentNode;
	MAJID_CR(CR_supp,'suppr',id_Q);
	blocCR_encours.removeChild(CR_supp);
	for (var i = id_CR+1, c = tableau_nb_choixrep[id_Q]; i <= c; i++) {
	MAJID_CR(document.getElementById('lignechoixrep_'+id_Q+'_'+i),i-1,id_Q);
	}
	tableau_nb_choixrep[id_Q]=tableau_nb_choixrep[id_Q]-1;
	supprimerTooltip();
//} else {
    // Do nothing!
//}
}


function monterQuestion(Q_encours) {
var id_encours=parseInt(Q_encours.id.split('_')[1],10);

if(id_encours==1) {return;}

var id_avant=id_encours-1;
var Q_avant=document.getElementById('bloc_'+id_avant);

MAJID(Q_encours,0);
MAJID_CR_chgmtIDQ(Q_encours,id_encours,0);
MAJID(Q_avant,id_encours);
MAJID_CR_chgmtIDQ(Q_avant,id_avant,id_encours);
MAJID(Q_encours,id_avant);
MAJID_CR_chgmtIDQ(Q_encours,0,id_avant);

bloc_creer_contenu.removeChild(Q_encours);
bloc_creer_contenu.insertBefore(Q_encours,Q_avant);
}

function descendreQuestion(Q_encours) {
var id_encours=parseInt(Q_encours.id.split('_')[1],10);

if(id_encours==nb_elements) {return;}

var id_apres=id_encours+1;
var Q_apres=document.getElementById('bloc_'+id_apres);

MAJID(Q_encours,0);
MAJID_CR_chgmtIDQ(Q_encours,id_encours,0);
MAJID(Q_apres,id_encours);
MAJID_CR_chgmtIDQ(Q_apres,id_apres,id_encours);
MAJID(Q_encours,id_apres);
MAJID_CR_chgmtIDQ(Q_encours,0,id_apres);

bloc_creer_contenu.removeChild(Q_apres);
bloc_creer_contenu.insertBefore(Q_apres,Q_encours);
}

function positionQuestion(Q_encours) {
var id_encours=parseInt(Q_encours.id.split('_')[1],10);
var saisie=document.getElementById('goto_position_'+id_encours).value;
var pos_saisie=parseInt(saisie,10);
document.getElementById('goto_position_'+id_encours).value="";

if(!Number.isInteger(pos_saisie)||pos_saisie<=0||pos_saisie>nb_elements||pos_saisie==id_encours){
//alert(document.getElementById('msg_KO_position').innerHTML);
$("#msg_KO_position").dialog({
	resizable: false,
	width: 400,
	closeText: document.getElementById('msg_bt_fermer').innerHTML,
	modal: true,
	buttons: [
			{
			  text: document.getElementById('msg_bt_fermer').innerHTML,
			  click: function() {
					$( this ).dialog( "close" );
			  }
			}			
		  ]
	});
$('.ui-dialog :button').blur();
return;
}

var Q_apres=document.getElementById('bloc_'+pos_saisie);

MAJID(Q_encours,0);
MAJID_CR_chgmtIDQ(Q_encours,id_encours,0);

if(id_encours<pos_saisie) {
var pos_cible=pos_saisie-1;
for (var i = id_encours+1, c = pos_cible; i <= c; i++) {
MAJID(document.getElementById('bloc_'+i),i-1);
MAJID_CR_chgmtIDQ(document.getElementById('bloc_'+i),i,i-1);
}
}
if(id_encours>pos_saisie) {
var pos_cible=pos_saisie;
for (var i = id_encours-1, c = pos_cible; i >= c; i--) {
MAJID(document.getElementById('bloc_'+i),i+1);
MAJID_CR_chgmtIDQ(document.getElementById('bloc_'+i),i,i+1);
}
}
MAJID(Q_encours,pos_cible);
MAJID_CR_chgmtIDQ(Q_encours,0,pos_cible);

bloc_creer_contenu.removeChild(Q_encours);
bloc_creer_contenu.insertBefore(Q_encours,Q_apres);

}


function monterChoixReponse(CR_encours) {
var id_CR_encours=parseInt(CR_encours.id.split('_')[2],10);
var id_Q_encours=parseInt(CR_encours.id.split('_')[1],10);
var blocCR_encours=CR_encours.parentNode;

if(id_CR_encours==1) {return;}

var id_CR_avant=id_CR_encours-1;
var CR_avant=document.getElementById('lignechoixrep_'+id_Q_encours+'_'+id_CR_avant);

MAJID_CR(CR_encours,0,id_Q_encours);
MAJID_CR(CR_avant,id_CR_encours,id_Q_encours);
MAJID_CR(CR_encours,id_CR_avant,id_Q_encours);

blocCR_encours.removeChild(CR_encours);
blocCR_encours.insertBefore(CR_encours,CR_avant);
}

function descendreChoixReponse(CR_encours) {
var id_CR_encours=parseInt(CR_encours.id.split('_')[2],10);
var id_Q_encours=parseInt(CR_encours.id.split('_')[1],10);
var blocCR_encours=CR_encours.parentNode;

if(id_CR_encours==tableau_nb_choixrep[id_Q_encours]) {return;}

var id_CR_apres=id_CR_encours+1;
var CR_apres=document.getElementById('lignechoixrep_'+id_Q_encours+'_'+id_CR_apres);

MAJID_CR(CR_encours,0,id_Q_encours);
MAJID_CR(CR_apres,id_CR_encours,id_Q_encours);
MAJID_CR(CR_encours,id_CR_apres,id_Q_encours);

blocCR_encours.removeChild(CR_apres);
blocCR_encours.insertBefore(CR_apres,CR_encours);
}

//FONCTION MAJID
function MAJID(newQ,newID) {
newQ.id="bloc_"+newID;

var children = newQ.getElementsByTagName('*');
for (var i = 0, c = children.length; i < c; i++) 
{
	//switch (children[i].className)
	switch (children[i].getAttribute("class"))
	{
		case 'span_txt_titre_bloc_numero_element':children[i].innerHTML=newID;break;case 'span_txt_titre_bloc_numero_element2':break;case 'span_txt_titre_bloc_question':children[i].id='span_txt_titre_bloc_question_'+newID;break;case 'span_txt_titre_bloc_titre':children[i].id='span_txt_titre_bloc_titre_'+newID;break;case 'span_txt_titre_bloc_paragraphe':children[i].id='span_txt_titre_bloc_paragraphe_'+newID;break;case 'label_type_element':children[i].htmlFor='type_element_'+newID;break;case 'type_element':children[i].id='type_element_'+newID;children[i].name='type_element_'+newID;break;case 'span_txt_titre_texte_question':children[i].id='span_txt_titre_texte_question_'+newID;break;case 'span_txt_titre_texte_titre':children[i].id='span_txt_titre_texte_titre_'+newID;break;case 'span_txt_titre_texte_paragraphe':children[i].id='span_txt_titre_texte_paragraphe_'+newID;break;case 'label_texte_question':children[i].htmlFor='texte_question_'+newID;break;case 'texte_question':children[i].id='texte_question_'+newID;children[i].name='texte_question_'+newID;break;case 'label_type_question':children[i].htmlFor='type_question_'+newID;break;case 'type_question':children[i].id='type_question_'+newID;children[i].name='type_question_'+newID;break;case 'bloc_question_A':children[i].id='bloc_question_A_'+newID;break;case 'bloc_question_B':children[i].id='bloc_question_B_'+newID;break;case 'bt_supprQ':children[i].id='bt_supprQ_'+newID;break;case 'bt_monterQ':children[i].id='bt_monterQ_'+newID;break;case 'bt_descendreQ':children[i].id='bt_descendreQ_'+newID;break;case 'label_goto_position':children[i].htmlFor='goto_position_'+newID;break;case 'goto_position':children[i].id='goto_position_'+newID;children[i].name='goto_position_'+newID;break;case 'bt_position':children[i].id='bt_position_'+newID;break;case 'label_oblig':children[i].htmlFor='oblig_'+newID;break;case 'oblig':children[i].id='oblig_'+newID;children[i].name='oblig_'+newID;break;case 'label_cb_texteaide':children[i].htmlFor='cb_texteaide_'+newID;break;case 'cb_texteaide':children[i].id='cb_texteaide_'+newID;children[i].name='cb_texteaide_'+newID;break;case 'bloc_texteaide':children[i].id='bloc_texteaide_'+newID;break;case 'texteaide':children[i].id='texteaide_'+newID;children[i].name='texteaide_'+newID;break;case 'bloc_cb_commentaire':children[i].id='bloc_cb_commentaire_'+newID;break;case 'label_cb_commentaire':children[i].htmlFor='cb_commentaire_'+newID;break;case 'cb_commentaire':children[i].id='cb_commentaire_'+newID;children[i].name='cb_commentaire_'+newID;break;case 'bloc_options_cac':children[i].id='bloc_options_cac_'+newID;break;case 'bloc_question_Ab':children[i].id='bloc_question_Ab_'+newID;break;case 'label_cac_up':children[i].htmlFor='cac_up_'+newID;break;case 'cac_up':children[i].id='cac_up_'+newID;children[i].name='cac_up_'+newID;break;case 'label_cac_dispo':children[i].htmlFor='cac_dispo_'+newID;break;case 'cac_dispo':children[i].id='cac_dispo_'+newID;children[i].name='cac_dispo_'+newID;break;case 'bloc_question_Bb':children[i].id='bloc_question_Bb_'+newID;break;case 'bloc_choix_reponse':children[i].id='bloc_choix_reponse_'+newID;break;case 'bt_newCR_choixreponse':children[i].id='bt_newCR_choixreponse_'+newID;break;case 'bt_newCR_libelleligne':children[i].id='bt_newCR_libelleligne_'+newID;break;case 'nb_choixrep':children[i].id='nb_choixrep_'+newID;children[i].name='nb_choixrep_'+newID;break;case 'bloc_cb_choixrepautre':children[i].id='bloc_cb_choixrepautre_'+newID;break;case 'cb_choixrepautre':children[i].id='cb_choixrepautre_'+newID;children[i].name='cb_choixrepautre_'+newID;break;case 'label_cb_choixrepautre':children[i].htmlFor='cb_choixrepautre_'+newID;break;case 'div_erreurs':children[i].id='div_erreurs_'+newID;break;case 'bloc_options_tl':children[i].id='bloc_options_tl_'+newID;break;case 'label_tl_taille':children[i].htmlFor='tl_taille_'+newID;break;case 'tl_taille':children[i].id='tl_taille_'+newID;children[i].name='tl_taille_'+newID;break;case 'bloc_options_notation':children[i].id='bloc_options_notation_'+newID;break;case 'label_notation_type':children[i].htmlFor='notation_type_'+newID;break;case 'notation_type':children[i].id='notation_type_'+newID;children[i].name='notation_type_'+newID;break;case 'label_notation_typescore':children[i].htmlFor='notation_typescore_'+newID;break;case 'notation_typescore':children[i].id='notation_typescore_'+newID;children[i].name='notation_typescore_'+newID;break;case 'bloc_options_notation_typescore':children[i].id='bloc_options_notation_typescore_'+newID;break;case 'bloc_options_notation_etoiles_nb':children[i].id='bloc_options_notation_etoiles_nb_'+newID;break;case 'label_notation_etoiles_nb':children[i].htmlFor='notation_etoiles_nb_'+newID;break;case 'notation_etoiles_nb':children[i].id='notation_etoiles_nb_'+newID;children[i].name='notation_etoiles_nb_'+newID;break;case 'bloc_options_notation_score_minmax':children[i].id='bloc_options_notation_score_minmax_'+newID;break;case 'score_min':children[i].id='score_min_'+newID;children[i].name='score_min_'+newID;break;case 'score_max':children[i].id='score_max_'+newID;children[i].name='score_max_'+newID;break;case 'cb_scorepaszero':children[i].id='cb_scorepaszero_'+newID;children[i].name='cb_scorepaszero_'+newID;break;case 'label_scoremin':children[i].htmlFor='scoremin_'+newID;break;case 'label_scoremax':children[i].htmlFor='scoremax_'+newID;break;case 'label_cb_scorepaszero':children[i].htmlFor='cb_scorepaszero_'+newID;break;case 'bloc_options_notation_echelle':children[i].id='bloc_options_notation_echelle_'+newID;break;case 'label_echelle_min':children[i].htmlFor='echelle_min_'+newID;break;case 'echelle_min':children[i].id='echelle_min_'+newID;children[i].name='echelle_min_'+newID;break;case 'label_echelle_max':children[i].htmlFor='echelle_max_'+newID;break;case 'echelle_max':children[i].id='echelle_max_'+newID;children[i].name='echelle_max_'+newID;break;case 'label_echelle_texte_droite':children[i].htmlFor='echelle_texte_droite_'+newID;break;case 'echelle_texte_droite':children[i].id='echelle_texte_droite_'+newID;children[i].name='echelle_texte_droite_'+newID;break;case 'label_echelle_texte_gauche':children[i].htmlFor='echelle_texte_gauche_'+newID;break;case 'echelle_texte_gauche':children[i].id='echelle_texte_gauche_'+newID;children[i].name='echelle_texte_gauche_'+newID;break;case 'label_echelle_texte_milieu':children[i].htmlFor='echelle_texte_milieu_'+newID;break;case 'echelle_texte_milieu':children[i].id='echelle_texte_milieu_'+newID;children[i].name='echelle_texte_milieu_'+newID;break;case 'bloc_options_priorite':children[i].id='bloc_options_priorite_'+newID;break;case 'priorite_min':children[i].id='priorite_min_'+newID;children[i].name='priorite_min_'+newID;break;case 'label_priorite_min':children[i].htmlFor='priorite_min_'+newID;break;case 'priorite_max':children[i].id='priorite_max_'+newID;children[i].name='priorite_max_'+newID;break;case 'label_priorite_max':children[i].htmlFor='priorite_max_'+newID;break;case 'cb_prioriteunique':children[i].id='cb_prioriteunique_'+newID;children[i].name='cb_prioriteunique_'+newID;break;case 'label_cb_prioriteunique':children[i].htmlFor='cb_prioriteunique_'+newID;break;case 'grilletexte_libV1':children[i].id='grilletexte_libV1_'+newID;children[i].name='grilletexte_libV1_'+newID;break;case 'label_grilletexte_libV1':children[i].htmlFor='grilletexte_libV1_'+newID;break;case 'grilletexte_libV2':children[i].id='grilletexte_libV2_'+newID;children[i].name='grilletexte_libV2_'+newID;break;case 'label_grilletexte_libV2':children[i].htmlFor='grilletexte_libV2_'+newID;break;case 'grilletexte_libV3':children[i].id='grilletexte_libV3_'+newID;children[i].name='grilletexte_libV3_'+newID;break;case 'label_grilletexte_libV3':children[i].htmlFor='grilletexte_libV3_'+newID;break;case 'grilletexte_libV4':children[i].id='grilletexte_libV4_'+newID;children[i].name='grilletexte_libV4_'+newID;break;case 'label_grilletexte_libV4':children[i].htmlFor='grilletexte_libV4_'+newID;break;case 'bloc_options_grilletexte':children[i].id='bloc_options_grilletexte_'+newID;break;case 'position_new_CR':children[i].id='position_new_CR_'+newID;break;case 'span_titre_bloc_choix_reponse_choixreponse':children[i].id='span_titre_bloc_choix_reponse_choixreponse_'+newID;break;case 'span_titre_bloc_choix_reponse_libelleligne':children[i].id='span_titre_bloc_choix_reponse_libelleligne_'+newID;break;case 'div_bt_newCR_choixreponse':children[i].id='div_bt_newCR_choixreponse_'+newID;break;case 'div_bt_newCR_libelleligne':children[i].id='div_bt_newCR_libelleligne_'+newID;break;case 'bloc_question_Ac':children[i].id='bloc_question_Ac_'+newID;break;case 'bloc_options_notation2':children[i].id='bloc_options_notation2_'+newID;break;case 'idquestion':children[i].id='idquestion_'+newID;children[i].name='idquestion_'+newID;break;	}
}
}

function MAJID_CR(newCR,newID_CR,ID_Q) {
newCR.id="lignechoixrep_"+ID_Q+"_"+newID_CR;

var children = newCR.getElementsByTagName('*');
for (var i = 0, c = children.length; i < c; i++) 
{
	//switch (children[i].className)
	switch (children[i].getAttribute("class"))
	{
		case 'span_txt_numero_choixrep':children[i].innerHTML=newID_CR;break;case 'label_choixrep':children[i].htmlFor='choixrep_'+ID_Q+'_'+newID_CR;break;case 'choixrep':children[i].id='choixrep_'+ID_Q+'_'+newID_CR;children[i].name='choixrep_'+ID_Q+'_'+newID_CR;break;case 'bt_supprCR':children[i].id='bt_supprCR_'+ID_Q+'_'+newID_CR;break;case 'bt_monterCR':children[i].id='bt_monterCR_'+ID_Q+'_'+newID_CR;break;case 'bt_descendreCR':children[i].id='bt_descendreCR_'+ID_Q+'_'+newID_CR;break;case 'span_txt_libelle_choixreponse_libelleligne':children[i].id='span_txt_libelle_choixreponse_libelleligne_'+ID_Q+'_'+newID_CR;break;case 'idchoixreponse':children[i].id='idchoixreponse_'+ID_Q+'_'+newID_CR;children[i].name='idchoixreponse_'+ID_Q+'_'+newID_CR;break;	}
}
}

function MAJID_CR_chgmtIDQ(Q_encours,id_Q_encours,id_Q_cible){
for (var j=1;j<=tableau_nb_choixrep[id_Q_encours];j++) {
MAJID_CR(document.getElementById('lignechoixrep_'+id_Q_encours+'_'+j),j,id_Q_cible);
}
tableau_nb_choixrep[id_Q_cible]=tableau_nb_choixrep[id_Q_encours];
}


function active_boutons(id_encours) {
var Q_encours=document.getElementById('bloc_'+id_encours)
addEvent(document.getElementById('bt_supprQ_'+id_encours),'click', function(){supprimerQuestion(Q_encours)});
addEvent(document.getElementById('bt_monterQ_'+id_encours),'click', function(){monterQuestion(Q_encours)});
addEvent(document.getElementById('bt_descendreQ_'+id_encours),'click', function(){descendreQuestion(Q_encours)});
addEvent(document.getElementById('bt_position_'+id_encours),'click', function(){positionQuestion(Q_encours)});
addEvent(document.getElementById('bt_newCR_choixreponse_'+id_encours),'click', function(){ajouterChoixReponse(Q_encours)});
addEvent(document.getElementById('bt_newCR_libelleligne_'+id_encours),'click', function(){ajouterChoixReponse(Q_encours)});
}

function active_boutons_CR(id_Q,id_CR) {
var CR_encours=document.getElementById('lignechoixrep_'+id_Q+'_'+id_CR);
addEvent(document.getElementById('bt_supprCR_'+id_Q+'_'+id_CR),'click', function(){supprimerChoixReponse(CR_encours)});
addEvent(document.getElementById('bt_monterCR_'+id_Q+'_'+id_CR),'click', function(){monterChoixReponse(CR_encours)});
addEvent(document.getElementById('bt_descendreCR_'+id_Q+'_'+id_CR),'click', function(){descendreChoixReponse(CR_encours)});
}


function supprimerTooltip() {
var lastchild=document.body.lastChild;
if(lastchild.getAttribute("role")=="tooltip"){document.body.removeChild(lastchild);}
}


//FONCTIONS JS AFFICHE ET CACHE
function visibility_type_element_bloc_question_A_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}}
function visibility_type_element_bloc_question_B_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}}
function visibility_type_element_span_txt_titre_bloc_question_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'inline';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}}
function visibility_type_element_span_txt_titre_bloc_titre_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'inline';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}}
function visibility_type_element_span_txt_titre_bloc_paragraphe_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'inline';}}
function visibility_type_element_span_txt_titre_texte_question_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'inline';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}}
function visibility_type_element_span_txt_titre_texte_titre_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'inline';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}}
function visibility_type_element_span_txt_titre_texte_paragraphe_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'inline';}}
function visibility_type_element_bloc_question_Ab_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'block';}}
function visibility_type_element_bloc_question_Ac_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'block';}}
function visibility_type_element_bloc_question_Bb_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='question'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='titre_intermediaire'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='paragraphe'){bloc_a_activer.style.display = 'none';}}
function visibility_cb_texteaide_bloc_texteaide_(element_a_activer,bloc_a_activer) {if(element_a_activer.checked){bloc_a_activer.style.display = 'block';}else {bloc_a_activer.style.display = 'none';}}
function visibility_type_question_bloc_cb_commentaire_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'block';}}
function visibility_type_question_bloc_options_cac_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_bloc_choix_reponse_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'block';}}
function visibility_type_question_bloc_cb_choixrepautre_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_bloc_options_tl_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_bloc_options_notation_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_bloc_options_notation2_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_bloc_options_priorite_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_bloc_options_grilletexte_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='tl'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'block';}}
function visibility_type_question_span_titre_bloc_choix_reponse_choixreponse_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_span_titre_bloc_choix_reponse_libelleligne_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'block';}}
function visibility_type_question_div_bt_newCR_choixreponse_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'none';}}
function visibility_type_question_div_bt_newCR_libelleligne_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='cac'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='ld'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='priorite'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='notation_multi'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='grille_rep'){bloc_a_activer.style.display = 'block';}}
function visibility_notation_type_bloc_options_notation_typescore_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='etoiles'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='echelle'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='score'){bloc_a_activer.style.display = 'block';}}
function visibility_notation_type_bloc_options_notation_etoiles_nb_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='etoiles'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='echelle'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='score'){bloc_a_activer.style.display = 'none';}}
function visibility_notation_type_bloc_options_notation_score_minmax_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='etoiles'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='echelle'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='score'){bloc_a_activer.style.display = 'block';}}
function visibility_notation_type_bloc_options_notation_echelle_(element_a_activer,bloc_a_activer) {if(element_a_activer.options[element_a_activer.selectedIndex].value=='etoiles'){bloc_a_activer.style.display = 'none';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='echelle'){bloc_a_activer.style.display = 'block';}if(element_a_activer.options[element_a_activer.selectedIndex].value=='score'){bloc_a_activer.style.display = 'none';}}
function active_visibility(id_encours){var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_A_ = document.getElementById('bloc_question_A_'+id_encours);visibility_type_element_bloc_question_A_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_A_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_bloc_question_A_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_A_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_B_ = document.getElementById('bloc_question_B_'+id_encours);visibility_type_element_bloc_question_B_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_B_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_bloc_question_B_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_B_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_bloc_question_ = document.getElementById('span_txt_titre_bloc_question_'+id_encours);visibility_type_element_span_txt_titre_bloc_question_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_question_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_span_txt_titre_bloc_question_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_question_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_bloc_titre_ = document.getElementById('span_txt_titre_bloc_titre_'+id_encours);visibility_type_element_span_txt_titre_bloc_titre_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_titre_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_span_txt_titre_bloc_titre_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_titre_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_bloc_paragraphe_ = document.getElementById('span_txt_titre_bloc_paragraphe_'+id_encours);visibility_type_element_span_txt_titre_bloc_paragraphe_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_paragraphe_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_span_txt_titre_bloc_paragraphe_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_paragraphe_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_texte_question_ = document.getElementById('span_txt_titre_texte_question_'+id_encours);visibility_type_element_span_txt_titre_texte_question_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_question_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_span_txt_titre_texte_question_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_question_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_texte_titre_ = document.getElementById('span_txt_titre_texte_titre_'+id_encours);visibility_type_element_span_txt_titre_texte_titre_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_titre_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_span_txt_titre_texte_titre_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_titre_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_texte_paragraphe_ = document.getElementById('span_txt_titre_texte_paragraphe_'+id_encours);visibility_type_element_span_txt_titre_texte_paragraphe_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_paragraphe_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_span_txt_titre_texte_paragraphe_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_paragraphe_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_Ab_ = document.getElementById('bloc_question_Ab_'+id_encours);visibility_type_element_bloc_question_Ab_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Ab_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_bloc_question_Ab_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Ab_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_Ac_ = document.getElementById('bloc_question_Ac_'+id_encours);visibility_type_element_bloc_question_Ac_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Ac_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_bloc_question_Ac_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Ac_);});var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_Bb_ = document.getElementById('bloc_question_Bb_'+id_encours);visibility_type_element_bloc_question_Bb_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Bb_);addEvent(cle_objet_html_type_element_,'change', function(){visibility_type_element_bloc_question_Bb_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Bb_);});var cle_objet_html_cb_texteaide_ = document.getElementById('cb_texteaide_'+id_encours);var cle_bloc_html_bloc_texteaide_ = document.getElementById('bloc_texteaide_'+id_encours);visibility_cb_texteaide_bloc_texteaide_(cle_objet_html_cb_texteaide_,cle_bloc_html_bloc_texteaide_);addEvent(cle_objet_html_cb_texteaide_,'change', function(){visibility_cb_texteaide_bloc_texteaide_(cle_objet_html_cb_texteaide_,cle_bloc_html_bloc_texteaide_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_cb_commentaire_ = document.getElementById('bloc_cb_commentaire_'+id_encours);visibility_type_question_bloc_cb_commentaire_(cle_objet_html_type_question_,cle_bloc_html_bloc_cb_commentaire_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_cb_commentaire_(cle_objet_html_type_question_,cle_bloc_html_bloc_cb_commentaire_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_cac_ = document.getElementById('bloc_options_cac_'+id_encours);visibility_type_question_bloc_options_cac_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_cac_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_options_cac_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_cac_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_choix_reponse_ = document.getElementById('bloc_choix_reponse_'+id_encours);visibility_type_question_bloc_choix_reponse_(cle_objet_html_type_question_,cle_bloc_html_bloc_choix_reponse_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_choix_reponse_(cle_objet_html_type_question_,cle_bloc_html_bloc_choix_reponse_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_cb_choixrepautre_ = document.getElementById('bloc_cb_choixrepautre_'+id_encours);visibility_type_question_bloc_cb_choixrepautre_(cle_objet_html_type_question_,cle_bloc_html_bloc_cb_choixrepautre_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_cb_choixrepautre_(cle_objet_html_type_question_,cle_bloc_html_bloc_cb_choixrepautre_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_tl_ = document.getElementById('bloc_options_tl_'+id_encours);visibility_type_question_bloc_options_tl_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_tl_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_options_tl_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_tl_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_notation_ = document.getElementById('bloc_options_notation_'+id_encours);visibility_type_question_bloc_options_notation_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_notation_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_options_notation_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_notation_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_notation2_ = document.getElementById('bloc_options_notation2_'+id_encours);visibility_type_question_bloc_options_notation2_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_notation2_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_options_notation2_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_notation2_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_priorite_ = document.getElementById('bloc_options_priorite_'+id_encours);visibility_type_question_bloc_options_priorite_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_priorite_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_options_priorite_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_priorite_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_grilletexte_ = document.getElementById('bloc_options_grilletexte_'+id_encours);visibility_type_question_bloc_options_grilletexte_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_grilletexte_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_bloc_options_grilletexte_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_grilletexte_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_span_titre_bloc_choix_reponse_choixreponse_ = document.getElementById('span_titre_bloc_choix_reponse_choixreponse_'+id_encours);visibility_type_question_span_titre_bloc_choix_reponse_choixreponse_(cle_objet_html_type_question_,cle_bloc_html_span_titre_bloc_choix_reponse_choixreponse_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_span_titre_bloc_choix_reponse_choixreponse_(cle_objet_html_type_question_,cle_bloc_html_span_titre_bloc_choix_reponse_choixreponse_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_span_titre_bloc_choix_reponse_libelleligne_ = document.getElementById('span_titre_bloc_choix_reponse_libelleligne_'+id_encours);visibility_type_question_span_titre_bloc_choix_reponse_libelleligne_(cle_objet_html_type_question_,cle_bloc_html_span_titre_bloc_choix_reponse_libelleligne_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_span_titre_bloc_choix_reponse_libelleligne_(cle_objet_html_type_question_,cle_bloc_html_span_titre_bloc_choix_reponse_libelleligne_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_div_bt_newCR_choixreponse_ = document.getElementById('div_bt_newCR_choixreponse_'+id_encours);visibility_type_question_div_bt_newCR_choixreponse_(cle_objet_html_type_question_,cle_bloc_html_div_bt_newCR_choixreponse_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_div_bt_newCR_choixreponse_(cle_objet_html_type_question_,cle_bloc_html_div_bt_newCR_choixreponse_);});var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_div_bt_newCR_libelleligne_ = document.getElementById('div_bt_newCR_libelleligne_'+id_encours);visibility_type_question_div_bt_newCR_libelleligne_(cle_objet_html_type_question_,cle_bloc_html_div_bt_newCR_libelleligne_);addEvent(cle_objet_html_type_question_,'change', function(){visibility_type_question_div_bt_newCR_libelleligne_(cle_objet_html_type_question_,cle_bloc_html_div_bt_newCR_libelleligne_);});var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_typescore_ = document.getElementById('bloc_options_notation_typescore_'+id_encours);visibility_notation_type_bloc_options_notation_typescore_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_typescore_);addEvent(cle_objet_html_notation_type_,'change', function(){visibility_notation_type_bloc_options_notation_typescore_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_typescore_);});var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_etoiles_nb_ = document.getElementById('bloc_options_notation_etoiles_nb_'+id_encours);visibility_notation_type_bloc_options_notation_etoiles_nb_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_etoiles_nb_);addEvent(cle_objet_html_notation_type_,'change', function(){visibility_notation_type_bloc_options_notation_etoiles_nb_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_etoiles_nb_);});var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_score_minmax_ = document.getElementById('bloc_options_notation_score_minmax_'+id_encours);visibility_notation_type_bloc_options_notation_score_minmax_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_score_minmax_);addEvent(cle_objet_html_notation_type_,'change', function(){visibility_notation_type_bloc_options_notation_score_minmax_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_score_minmax_);});var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_echelle_ = document.getElementById('bloc_options_notation_echelle_'+id_encours);visibility_notation_type_bloc_options_notation_echelle_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_echelle_);addEvent(cle_objet_html_notation_type_,'change', function(){visibility_notation_type_bloc_options_notation_echelle_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_echelle_);});addEvent(document.getElementById('type_question_'+id_encours),'change',function(){for(var k=1,cc=tableau_nb_choixrep[id_encours];k<=cc;k++){maj_lib_cr(id_encours,k);}});}function active_visibility_sansEvent(id_encours){var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_A_ = document.getElementById('bloc_question_A_'+id_encours);visibility_type_element_bloc_question_A_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_A_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_B_ = document.getElementById('bloc_question_B_'+id_encours);visibility_type_element_bloc_question_B_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_B_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_bloc_question_ = document.getElementById('span_txt_titre_bloc_question_'+id_encours);visibility_type_element_span_txt_titre_bloc_question_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_question_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_bloc_titre_ = document.getElementById('span_txt_titre_bloc_titre_'+id_encours);visibility_type_element_span_txt_titre_bloc_titre_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_titre_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_bloc_paragraphe_ = document.getElementById('span_txt_titre_bloc_paragraphe_'+id_encours);visibility_type_element_span_txt_titre_bloc_paragraphe_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_bloc_paragraphe_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_texte_question_ = document.getElementById('span_txt_titre_texte_question_'+id_encours);visibility_type_element_span_txt_titre_texte_question_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_question_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_texte_titre_ = document.getElementById('span_txt_titre_texte_titre_'+id_encours);visibility_type_element_span_txt_titre_texte_titre_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_titre_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_span_txt_titre_texte_paragraphe_ = document.getElementById('span_txt_titre_texte_paragraphe_'+id_encours);visibility_type_element_span_txt_titre_texte_paragraphe_(cle_objet_html_type_element_,cle_bloc_html_span_txt_titre_texte_paragraphe_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_Ab_ = document.getElementById('bloc_question_Ab_'+id_encours);visibility_type_element_bloc_question_Ab_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Ab_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_Ac_ = document.getElementById('bloc_question_Ac_'+id_encours);visibility_type_element_bloc_question_Ac_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Ac_);var cle_objet_html_type_element_ = document.getElementById('type_element_'+id_encours);var cle_bloc_html_bloc_question_Bb_ = document.getElementById('bloc_question_Bb_'+id_encours);visibility_type_element_bloc_question_Bb_(cle_objet_html_type_element_,cle_bloc_html_bloc_question_Bb_);var cle_objet_html_cb_texteaide_ = document.getElementById('cb_texteaide_'+id_encours);var cle_bloc_html_bloc_texteaide_ = document.getElementById('bloc_texteaide_'+id_encours);visibility_cb_texteaide_bloc_texteaide_(cle_objet_html_cb_texteaide_,cle_bloc_html_bloc_texteaide_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_cb_commentaire_ = document.getElementById('bloc_cb_commentaire_'+id_encours);visibility_type_question_bloc_cb_commentaire_(cle_objet_html_type_question_,cle_bloc_html_bloc_cb_commentaire_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_cac_ = document.getElementById('bloc_options_cac_'+id_encours);visibility_type_question_bloc_options_cac_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_cac_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_choix_reponse_ = document.getElementById('bloc_choix_reponse_'+id_encours);visibility_type_question_bloc_choix_reponse_(cle_objet_html_type_question_,cle_bloc_html_bloc_choix_reponse_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_cb_choixrepautre_ = document.getElementById('bloc_cb_choixrepautre_'+id_encours);visibility_type_question_bloc_cb_choixrepautre_(cle_objet_html_type_question_,cle_bloc_html_bloc_cb_choixrepautre_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_tl_ = document.getElementById('bloc_options_tl_'+id_encours);visibility_type_question_bloc_options_tl_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_tl_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_notation_ = document.getElementById('bloc_options_notation_'+id_encours);visibility_type_question_bloc_options_notation_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_notation_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_notation2_ = document.getElementById('bloc_options_notation2_'+id_encours);visibility_type_question_bloc_options_notation2_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_notation2_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_priorite_ = document.getElementById('bloc_options_priorite_'+id_encours);visibility_type_question_bloc_options_priorite_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_priorite_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_bloc_options_grilletexte_ = document.getElementById('bloc_options_grilletexte_'+id_encours);visibility_type_question_bloc_options_grilletexte_(cle_objet_html_type_question_,cle_bloc_html_bloc_options_grilletexte_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_span_titre_bloc_choix_reponse_choixreponse_ = document.getElementById('span_titre_bloc_choix_reponse_choixreponse_'+id_encours);visibility_type_question_span_titre_bloc_choix_reponse_choixreponse_(cle_objet_html_type_question_,cle_bloc_html_span_titre_bloc_choix_reponse_choixreponse_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_span_titre_bloc_choix_reponse_libelleligne_ = document.getElementById('span_titre_bloc_choix_reponse_libelleligne_'+id_encours);visibility_type_question_span_titre_bloc_choix_reponse_libelleligne_(cle_objet_html_type_question_,cle_bloc_html_span_titre_bloc_choix_reponse_libelleligne_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_div_bt_newCR_choixreponse_ = document.getElementById('div_bt_newCR_choixreponse_'+id_encours);visibility_type_question_div_bt_newCR_choixreponse_(cle_objet_html_type_question_,cle_bloc_html_div_bt_newCR_choixreponse_);var cle_objet_html_type_question_ = document.getElementById('type_question_'+id_encours);var cle_bloc_html_div_bt_newCR_libelleligne_ = document.getElementById('div_bt_newCR_libelleligne_'+id_encours);visibility_type_question_div_bt_newCR_libelleligne_(cle_objet_html_type_question_,cle_bloc_html_div_bt_newCR_libelleligne_);var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_typescore_ = document.getElementById('bloc_options_notation_typescore_'+id_encours);visibility_notation_type_bloc_options_notation_typescore_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_typescore_);var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_etoiles_nb_ = document.getElementById('bloc_options_notation_etoiles_nb_'+id_encours);visibility_notation_type_bloc_options_notation_etoiles_nb_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_etoiles_nb_);var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_score_minmax_ = document.getElementById('bloc_options_notation_score_minmax_'+id_encours);visibility_notation_type_bloc_options_notation_score_minmax_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_score_minmax_);var cle_objet_html_notation_type_ = document.getElementById('notation_type_'+id_encours);var cle_bloc_html_bloc_options_notation_echelle_ = document.getElementById('bloc_options_notation_echelle_'+id_encours);visibility_notation_type_bloc_options_notation_echelle_(cle_objet_html_notation_type_,cle_bloc_html_bloc_options_notation_echelle_);for(var k=1,cc=tableau_nb_choixrep[id_encours];k<=cc;k++){maj_lib_cr(id_encours,k);}addEvent(document.getElementById('type_question_'+id_encours),'change',function(){for(var k=1,cc=tableau_nb_choixrep[id_encours];k<=cc;k++){maj_lib_cr(id_encours,k);}});}
function maj_lib_cr(id_encours,k){
var span_cr=document.getElementById('span_txt_libelle_choixreponse_libelleligne_'+id_encours+'_'+k);
var type_question=document.getElementById('type_question_'+id_encours);
var lib_cr=document.getElementById('span_txt_libelle_choixreponse').innerHTML;
var lib_libligne=document.getElementById('span_txt_libelle_libelleligne').innerHTML;

switch(type_question.options[type_question.selectedIndex].value)
{
	case "cac":
	case "ld":	
		span_cr.innerHTML=lib_cr;
	break;
	case "priorite":
	case "notation_multi":	
	case "grille_rep":		
		span_cr.innerHTML=lib_libligne;
	break;
}
}

/*
//Remettre dans objets_form_creation.csv les lignes niv0 : cb_ecranbienvenue, bloc_ecranbienvenue, cb_ecranremerciements, bloc_ecranremerciements

function visibility_bloc_ecranbienvenu(){
var cb = document.getElementById('cb_ecranbienvenue');
var bloc = document.getElementById('bloc_ecranbienvenue');
if(cb.checked){bloc.style.display="block";}
else{bloc.style.display="none";}
}
function visibility_bloc_ecranremerciements(){
var cb = document.getElementById('cb_ecranremerciements');
var bloc = document.getElementById('bloc_ecranremerciements');
if(cb.checked){bloc.style.display="block";}
else{bloc.style.display="none";}
}
*/

function visibility_div_identification(){
var cb = document.getElementById('cb_identification');
var bloc_oui = document.getElementById('bloc_identification_oui');
var bloc_non = document.getElementById('bloc_identification_non');
if(cb.checked){bloc_oui.style.display="block";bloc_non.style.display="none";}
else{bloc_oui.style.display="none";bloc_non.style.display="block";}
}

addEvent(window, 'load',function(){/*visibility_bloc_ecranbienvenu();visibility_bloc_ecranremerciements();*/visibility_div_identification();});

//addEvent(document.getElementById('cb_ecranbienvenue'),'change',visibility_bloc_ecranbienvenu);
//addEvent(document.getElementById('cb_ecranremerciements'),'change',visibility_bloc_ecranremerciements);
addEvent(document.getElementById('cb_identification'),'change',visibility_div_identification);



function init_stylepersonnalise(){
document.getElementById('couleur_barreseparationquestion').value='#0070C0';document.getElementById('couleur_barreseparationquestion').jscolor.importColor();document.getElementById('couleur_titrequestionnaire').value='#444444';document.getElementById('couleur_titrequestionnaire').jscolor.importColor();(document.getElementById('gras_titrequestionnaire')).checked='checked';(document.getElementById('italic_titrequestionnaire')).checked='';document.getElementById('couleur_descriptionquestionnaire').value='#444444';document.getElementById('couleur_descriptionquestionnaire').jscolor.importColor();(document.getElementById('gras_descriptionquestionnaire')).checked='';(document.getElementById('italic_descriptionquestionnaire')).checked='';document.getElementById('couleur_libellequestion').value='#444444';document.getElementById('couleur_libellequestion').jscolor.importColor();(document.getElementById('gras_libellequestion')).checked='';(document.getElementById('italic_libellequestion')).checked='';document.getElementById('couleur_entetequestion').value='#444444';document.getElementById('couleur_entetequestion').jscolor.importColor();(document.getElementById('gras_entetequestion')).checked='checked';(document.getElementById('italic_entetequestion')).checked='';(document.getElementById('masquer_entetequestion')).checked='';document.getElementById('couleur_titreintermediaire').value='#444444';document.getElementById('couleur_titreintermediaire').jscolor.importColor();(document.getElementById('gras_titreintermediaire')).checked='checked';(document.getElementById('italic_titreintermediaire')).checked='';document.getElementById('couleur_paragraphe').value='#444444';document.getElementById('couleur_paragraphe').jscolor.importColor();(document.getElementById('gras_paragraphe')).checked='';(document.getElementById('italic_paragraphe')).checked='';document.getElementById('police_pardefaut').selected='selected';
}

addEvent(document.getElementById('mef_reset_style'),'click',init_stylepersonnalise);


