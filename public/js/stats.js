var liste = document.getElementsByName('salaire');
var liste2 = document.getElementsByName('niveau');


const listeTravail = [];
const listeTravail2 = [];
const listeNiveauMoyenne = [];
const listeSalaire = [];
const listeCompetence = [];
const listeSalaireMoyenne = [];



var cpt = 0;
for (let y = 0; y < liste.length; y++) {
    listeTravail.push(liste[y].value)
}
for (let index = 0; index < liste2.length; index++) {
    listeTravail2.push(liste2[index].value)
}


for (let i = 0; i < listeTravail.length; i++) {
    for (let j = 0; j < listeTravail[i].length; j++) {
        if (listeTravail[i][j] === "-") {
            var salaire = listeTravail[i].substring(0, cpt)
            listeSalaire.push(salaire)
            var competence = listeTravail[i].substring(cpt + 1, listeTravail[i].length)
            listeCompetence.push(competence)
        }
        cpt++;
    }
    cpt = 0;
}

for (let i = 0; i < listeTravail2.length; i++) {
    for (let j = 0; j < listeTravail2[i].length; j++) {
        if (listeTravail2[i][j] === "-") {
            var niveau = listeTravail2[i].substring(cpt + 1, listeTravail2[i].length)
            listeNiveauMoyenne.push(niveau)
        }
        cpt++;
    }
    cpt = 0;
}



listeCompetence.forEach(element => {
    var compar = element, cptC = 0, toto = 0, finish = 0;
    for (let k = 0; k < listeCompetence.length; k++) {
        if (listeCompetence[k].match(compar)) {
            toto += Number(listeSalaire[k]);
            cptC++;
        }
    }
    finish = toto / cptC;
    listeSalaireMoyenne.push(finish)
});


const listeSalaireFin = listeSalaireMoyenne.filter(function (ele, pos) {
    return listeSalaireMoyenne.indexOf(ele) == pos;
})

const listeLabels = listeCompetence.filter(function (ele, pos) {
    return listeCompetence.indexOf(ele) == pos;
})



var ctx = document.getElementById('graph1').getContext('2d');
var data = {
    labels: listeLabels,
    datasets: [{
        label: "Salaire en moyenne",
        data: listeSalaireFin,
        backgroundColor: [
            "crimson",
            "gold",
            "purple",
            "green",
            "lightblue",
            "red",
            "tomato",
            "black",
        ],
    }]
}
var options = {

}

console.log(options);
var config = {
    type: 'bar',
    data: data,
    options: options
}
var graph1 = new Chart(ctx, config)


console.log(listeNiveauMoyenne);
var ctx = document.getElementById('graph2').getContext('2d');
var data = {
    labels: listeLabels,
    datasets: [{
        label: "Salaire en moyenne",
        data: listeNiveauMoyenne,
        backgroundColor: [
            "crimson",
            "gold",
            "purple",
            "green",
            "lightblue",
            "red",
            "tomato",
            "black",
        ],
    }]
}
var options = {

}

console.log(options);
var config = {
    type: 'polarArea',
    data: data,
    options: options
}
var graph2 = new Chart(ctx, config)