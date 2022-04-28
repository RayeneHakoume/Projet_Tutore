//lorsqu'on a url = https://chemin#typeEng
const   typeEng     = parseInt(window.location.href.split("#")[1].split("?")[0]); //récupère le numéro de l'énigme
const   IDparcours  = window.location.href.split("#")[1].split("?")[1]
const   titrePage   = document.title;
var     json        = document.getElementById("JSON").innerHTML;
var     nomEng      = null;
// ------------ //
//document.getElementById("BANNIERE").style.display = "none";





json = json.replace(/[{}"]/g, '').replace(/[\n\r\t]/g, '').replace(/nom:/g, '').split(',');
//donne un tableau sous la forme : 
/*
 1:enigme1
 2:enigme2
 3:enigme3
 .
 .
 .
 n:enigmen
 */

for (assoc in json) { //A quel type d'énigme avons nous affaires ?
    let idEng = parseInt(json[assoc].split(':')[0]);
    nomEng = json[assoc].split(':')[1];
    
    if (idEng == typeEng) {

        document.title = titrePage.split('-')[0] + " - Créer : " + nomEng; //actualisation du titre
        break;
    }
}

//||//||//||//||//||//|INTERFACE DE CRÉATION|//||//||//||//||//||//||
var hautMenu    = document.getElementById("menu");
var gaucheMenu  = document.getElementById("f1"  );
var zonePrevi = document.getElementById("f2");
//||//||//||//||//||//|XXXXXXXXX XX XXXXXXXX|//||//||//||//||//||//||

switch (typeEng) { //changer l'ui pour l'adapter au type d'énigme. (cf fonction de gene, en bas)

    case 1:
        gene1(hautMenu, gaucheMenu, zonePrevi);
        break;

    case 2:
        gene2(hautMenu, gaucheMenu, zonePrevi);
        break;

    case 3:
        gene3(hautMenu, gaucheMenu, zonePrevi);
        break;

    case 4:
        gene4(hautMenu, gaucheMenu, zonePrevi);
        break;

    case 5:
        gene5(hautMenu, gaucheMenu, zonePrevi);
        break;

    case 6:
        gene6(hautMenu, gaucheMenu, zonePrevi);
        break;

    default:
        hautMenu.innerHTML = "ERREUR";

}




//   F O N C T I O N S   D E   G É N É R A T I O N   //

function geneHm(hm) {
    hm.innerHTML = '';
    let alignGauche = document.createElement('div');
    let alignDroite = document.createElement('div');

    hm.appendChild(alignGauche);
    hm.appendChild(alignDroite);

    alignGauche.innerHTML = "Création : " + nomEng;
    alignDroite.innerHTML = "";

    alignDroite.style.width = '49%'; //49 car c'est plus joli ; 50 c'est moche
    alignGauche.style.width = '49%';

    alignDroite.style.textAlign = 'right';
    alignGauche.style.textAlign = 'left';
    alignGauche.style.fontSize = "180%";

    //boutons//
    
    //   * USELESS *   //
    /* 
    let sauvegrd = document.createElement('span');
        sauvegrd.className = "bouton";
        sauvegrd.innerHTML = "Sauvegarder";
        sauvegrd.style.marginRight = "1%";
        sauvegrd.onclick = function () {
            alert("SAUVEGARDE");
        }
    alignDroite.appendChild(sauvegrd);
    */
    
    
    let quitter = document.createElement('span');
    quitter.className = "bouton";
    quitter.innerHTML = "Quitter";
    quitter.style.marginRight = "1%";
    quitter.onclick = function () {
        window.location.replace("https://enigmaker.univ-lyon1.fr/_Noe/bf/ENIGMAKER/Creation/");
    }

    alignDroite.appendChild(quitter);
    
}

function gene1(hm, gm, zp) {
    geneHm(hm);


}

function gene2(hm, gm, zp) {
    geneHm(hm);

    ///\\\///\\\///\\\///\\\///\\\///\\\Background///\\\///\\\///\\\///\\\///\\\///\\\

    let br = document.createElement("br");

    let containerBckgrndInp = document.createElement("div");
    containerBckgrndInp.style.display = "none";

    let containerBckgrndSelect = document.createElement("div");

    let backgroundInput = document.createElement("input");
    backgroundInput.type = "text";

    let descrInpBckgrnd = document.createElement("p");

    let questionSelect = document.createElement("p");

    let typeBckgrnd = document.createElement("select");
    typeBckgrnd.style.margin = "1%";
    typeBckgrnd.style.marginTop = "3%";
    typeBckgrnd.style.width = "95%";
    typeBckgrnd.style.height = "3%";
    typeBckgrnd.style.textAlign = "center";

    typeBckgrnd.onchange = function () {

        if (typeBckgrnd.firstChild.value == "r") {
            typeBckgrnd.removeChild(typeBckgrnd.firstChild);
            containerBckgrndInp.style.display = "initial"; 
        }

        while (containerBckgrndInp.firstChild) {
            containerBckgrndInp.removeChild(containerBckgrndInp.lastChild);
        }

        if (typeBckgrnd.value == "url") {
            descrInpBckgrnd.innerHTML = "Entrez l'url de votre image :";

            containerBckgrndInp.appendChild(descrInpBckgrnd);
            containerBckgrndInp.appendChild(backgroundInput);
        } else {
            descrInpBckgrnd.innerHTML = "Entrez le code hexadecimal de votre couleur :";

            containerBckgrndInp.appendChild(descrInpBckgrnd);
            containerBckgrndInp.appendChild(backgroundInput);
        }
        backgroundInput.value = '';
    };

    let url = document.createElement("option");
    url.value = "url";
    url.innerHTML = "Image";

    let couleur = document.createElement("option");
    couleur.value = "couleur";
    couleur.innerHTML = "Couleur de fond";

    let defaultSelection = document.createElement("option");
    defaultSelection.value = "r";
    defaultSelection.innerHTML = "-- Choisir --";

    questionSelect.innerHTML = "Quel thème de fond ?"

    gm.innerHTML = "";

    gm.appendChild(containerBckgrndSelect);
    containerBckgrndSelect.appendChild(questionSelect);
    containerBckgrndSelect.appendChild(typeBckgrnd);
    typeBckgrnd.appendChild(defaultSelection);
    typeBckgrnd.appendChild(url);
    typeBckgrnd.appendChild(couleur);

    gm.appendChild(containerBckgrndInp);
    ///\\\///\\\///\\\///\\\///\\\///\\\xxxxxxxxxx///\\\///\\\///\\\///\\\///\\\///\\\

    /**/

    ///\\\///\\\///\\\///\\\///\\\///\\\Question///\\\///\\\///\\\///\\\///\\\///\\\
    let containerQuestionInp = document.createElement("div");

    let questionInput = document.createElement("input");
    questionInput.type = "text";

    let descrInpQuestion = document.createElement("p");
    descrInpQuestion.innerHTML = "Posez votre question ici :"

    gm.appendChild(containerQuestionInp);
    containerQuestionInp.appendChild(descrInpQuestion);
    containerQuestionInp.appendChild(questionInput);
    ///\\\///\\\///\\\///\\\///\\\///\\\xxxxxxxx///\\\///\\\///\\\///\\\///\\\///\\\

    /**/

    ///\\\///\\\///\\\///\\\///\\\///\\\Réponse///\\\///\\\///\\\///\\\///\\\///\\\
    let containerReponseInp = document.createElement("div");

    let reponseInput = document.createElement("input");
    reponseInput.type = "text";

    let descrInpReponse = document.createElement("p");
    descrInpReponse.innerHTML = "Entrez ici la réponse :";

    gm.appendChild(containerReponseInp);
    containerReponseInp.appendChild(descrInpReponse);
    containerReponseInp.appendChild(reponseInput);
    ///\\\///\\\///\\\///\\\///\\\///\\\xxxxxxx///\\\///\\\///\\\///\\\///\\\///\\\

    /**/

    ///\\\///\\\///\\\///\\\///\\\///\\\Validation///\\\///\\\///\\\///\\\///\\\///\\\

    var getValue = function (champ) { //champ = background (1) ; question (2) ; reponse (3)

        if (champ == 1) {
            if (typeBckgrnd.value == "url") {
                return [0, backgroundInput.value];
            } else if (typeBckgrnd.value == "couleur") {
                return [1, backgroundInput.value];
            } else {
                return [-1, null];
            }
        } else if (champ == 2) {
            return questionInput.value;
        } else { //champ == 3
            return reponseInput.value;
        }

    }

    let containerValider = document.createElement("div");

    //formulaire POST :
    let formz = document.createElement("form");
    formz.style.display = "none";
    formz.setAttribute('action', "./VueParcours.php?" + IDparcours);
    formz.setAttribute('method', "post");
    formz.setAttribute('id', "formPourBDD");

    var ENIGME_TYPE = document.createElement("input");
    ENIGME_TYPE.name = "ENIGME_TYPE";
    ENIGME_TYPE.type = "text";

    var QText_question = document.createElement("input");
    QText_question.name = "QText_question";
    QText_question.type = "text";

    var QText_reponse = document.createElement("input");
    QText_reponse.name = "QText_reponse";
    QText_reponse.type = "text";

    var QText_bgType = document.createElement("input");
    QText_bgType.name = "QText_bgType";
    QText_bgType.type = "text";

    var QText_bgInfo = document.createElement("input");
    QText_bgInfo.name = "QText_bgInfo";
    QText_bgInfo.type = "text";

    var ENIGME_TITRE = document.createElement("input");
    ENIGME_TITRE.name = "ENIGME_TITRE";
    ENIGME_TITRE.type = "text";

    document.body.appendChild(formz);

    formz.appendChild(ENIGME_TYPE);
    formz.appendChild(ENIGME_TITRE);
    formz.appendChild(QText_question);
    formz.appendChild(QText_reponse);
    formz.appendChild(QText_bgType);
    formz.appendChild(QText_bgInfo);
    //\\
    let boutonValider = document.createElement('span');
        boutonValider.className = "bouton";
        boutonValider.innerHTML = "Valider";
        boutonValider.onclick = function () { //lorsque je clique sur le bouton valider
            var ttl = prompt("Quel Titre ?");

            ENIGME_TITRE.setAttribute('value', ttl);

            ENIGME_TYPE.setAttribute('value', "2");

            QText_question.setAttribute('value', getValue(2));

            QText_reponse.setAttribute('value', getValue(3));

            QText_bgType.setAttribute('value', getValue(1)[0]);

            QText_bgInfo.setAttribute('value', getValue(1)[1]);

            formz.submit();

        }

    gm.appendChild(containerValider);
    containerValider.appendChild(boutonValider);
    ///\\\///\\\///\\\///\\\///\\\///\\\xxxxxxxxxx///\\\///\\\///\\\///\\\///\\\///\\\

    /**/

    ///\\\///\\\///\\\///\\\///\\\///\\\Attribution des classes///\\\///\\\///\\\///\\\///\\\///\\\
    containerBckgrndSelect.className    = "containerGM";
    containerBckgrndInp.className       = "containerGM";
    containerQuestionInp.className      = "containerGM";
    containerReponseInp.className       = "containerGM";
    containerValider.className          = "containerGM";

    backgroundInput.className   = "textInput";
    questionInput.className     = "textInput";
    reponseInput.className      = "textInput";
    ///\\\///\\\///\\\///\\\///\\\///\\\xxxxxxxxxxx xxx xxxxxxx///\\\///\\\///\\\///\\\///\\\///\\\


    /*
     * PANNEAU DE PRÉVISUALISATION : 
     */
    zp.innerHTML = "";


    /*
     petites fonctions :
     */

    isHexColor = hex => typeof hex === 'string' && hex.length === 6 && !isNaN(Number('0x' + hex));

    /*
        fin des petites fonctions 
     */


    let questionp = document.createElement("span");
    let reponsep = document.createElement("span");

    zp.appendChild(questionp);
    zp.appendChild(br);
    zp.appendChild(reponsep);

    var actualiser = function () {
        let background = getValue(1);
        let question = getValue(2);
        let reponse = getValue(3);

        questionp.innerHTML = question;
        reponsep.innerHTML = reponse;

        questionp.style.backgroundColor = "rgba(255,255,255, .5)"
        reponsep.style.backgroundColor = "rgba(255,255,255, .5)"

        questionp.style.fontSize = "200%";
        reponsep.style.fontSize = "150%";

        questionp.style.padding = "2%";
        reponsep.style.padding = "2%";

        if (background[0] != -1) {
            if (background[0] == 0) {
                zp.style.backgroundColor = "";
                //image
                zp.style.backgroundImage = "url('" + background[1] + "')";
                zp.style.backgroundRepeat = "no-repeat";
                zp.style.backgroundSize = "100%";
                zp.style.backgroundPosition = "center";
                backgroundInput.style.backgroundColor = "blue";
                backgroundInput.style.color = "white";
            } else {
                zp.style.backgroundImage = "";
                backgroundInput.style.color = "white";
                //couleur
                if (isHexColor(background[1].split('#')[1])) {
                    zp.style.backgroundColor = background[1];
                    backgroundInput.style.backgroundColor = "green";

                    if (background[1].split('#')[1][0] <= 9) {
                        questionp.style.color = "white";
                        questionp.style.backgroundColor = "rgba(0,0,0, .5)"

                        reponsep.style.color = "white";
                        reponsep.style.backgroundColor ="rgba(0,0,0, .5)"
                    } else {
                        questionp.style.color = "black";
                        questionp.style.backgroundColor = "rgba(255,255,255, .5)"

                        reponsep.style.color = "black";
                        reponsep.style.backgroundColor = "rgba(255,255,255, .5)"
                    }
                } else {
                    backgroundInput.style.backgroundColor = "red";
                }
            }
        }

    }

    setInterval(actualiser, 100);
    ////////////////////////////////////////////

}

function gene3(hm, gm, zp) {
    geneHm(hm);
    

}

function gene4(hm, gm, zp) {
    geneHm(hm);
    

}

function gene5(hm, gm, zp) {
    geneHm(hm);
    

}

function gene6(hm, gm, zp) {
    geneHm(hm);
    

}