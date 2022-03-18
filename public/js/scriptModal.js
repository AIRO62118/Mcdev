alert("Start")

var modal = document.getElementById("modalDemande");
var btn = document.getElementById("boutonDemande");
var span = document.getElementsByClassName("close")[0];

//Ouvre le modal
btn.onclick = function() {
  modal.style.display = "block";
}

//Ferme le modal
span.onclick = function() {
  modal.style.display = "none";
}

//Ferme le modal si on clique à l'extérieur du modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}