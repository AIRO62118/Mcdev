$(document).ready(function () {
    var ok = document.getElementById('region');

    var ok1 = document.getElementById('datalist');

    ok1.addEventListener("change",function(){
        console.log("uwu");
    });


    function region() {
        var request = $.ajax({
            url: "https://geo.api.gouv.fr/regions",
            method: "GET",
            dataType: "json",
            beforeSend: function (xhr) {
                xhr.overrideMimeType("application/json; charset=utf-8");
            }
        });
        request.done(function (msg) {

            msg.sort(function (a, b) {

                if (a.nom < b.nom) {
                    return -1;
                }
                else {
                    return 1;
                }
            });

            $.each(msg, function (index, e) {
                option = document.createElement('option');
                option.setAttribute("id", e.code);
                option.innerText = e.nom;
                ok1.appendChild(option);
            });
        });


        ok1.addEventListener("change", function () {
            console.log(option.value = e.code);
        });
        request.fail(function (jqXHR, textStatus) { alert('erreur'); });
    }

    region();
});

