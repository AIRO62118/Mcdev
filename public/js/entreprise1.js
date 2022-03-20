$(document).ready(function () {
    var en1 = document.getElementById('datalistE');

    function regionE() {
        var request = $.ajax({
            url: "https://geo.api.gouv.fr/regions", method: "GET", dataType: "json",
            beforeSend: function (xhr) {
                xhr.overrideMimeType("application/json; charset=utf-8");
            }
        });
        request.done(function (msg) {
            msg.sort(function (a, b) {
                if (a.nom < b.nom) {return -1;}
                else {return 1;}});

            $.each(msg, function (index, e) {
                option = document.createElement('option');
                option.setAttribute("id", e.code);
                option.innerText = e.nom;
                en1.appendChild(option);
            });
        });
        en1.addEventListener("change", function () {
            console.log(option.value = e.code);
        });
        request.fail(function (jqXHR, textStatus) { alert('erreur'); });
    }
    regionE();
});