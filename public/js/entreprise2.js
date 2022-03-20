$(document).ready(function () {
    var en2 = document.getElementById('datalist2E');

    function communes() {
        var request = $.ajax({
            url: "https://geo.api.gouv.fr/communes", method: "GET", dataType: "json",
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
                option.setAttribute("id", e.codesPostaux);
                option.innerText = e.nom + " - " + e.codesPostaux;
                en2.appendChild(option);
            });
        });
        en2.addEventListener("change", function () {
            console.log(option.value = e.codesPostaux);
        });
        request.fail(function (jqXHR, textStatus) { alert('erreur'); });
    }
    communes();
});