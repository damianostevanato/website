$("#registrazione").click(function () {
    $("#div1").load("./includes/view/registrazione_form.php", function () {
        $("#nomeutenter").keyup(function () {
            controlloNome();
        });
        getProvince();

    });
});

function controlloNome() {

    console.log($("#nomeutenter").val());

    var dati = "nome=" + $("#nomeutenter").val();
    $.ajax({
        url: 'index.php?controller=page1Controller&action=controlloNome',
        type: "GET",
        dataType: "JSON",
        data: dati,
        success: function (response) {
            console.log(response);
            if (response === true) {
                showLabelNomeErrato();
            } else {
                hideLabelNomeErrato();
            }
        },
        error: function (xhr, status, error) {

        },
        complete: function (response) {

        },
    });

}

function showLabelNomeErrato() {
    $("#errorenome").show();
}

function hideLabelNomeErrato() {
    $("#errorenome").hide();
}

function getProvince() {
    $.ajax({
        url: 'index.php?controller=page1Controller&action=getProvince',
        type: "GET",
        dataType: "JSON",
        success: function (response) {

            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+0',
                dateFormat: "yy-mm-dd",
            });

            loadProvince(response);
            $("#provincer").change(function () {
                getComuni();

            });
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            console.log(status);
            console.log(error);
        },
        complete: function (response) {

        },
    });
}

function getComuni() {

    var dati = "provincia=" + $("#provincer option:selected").text();
    if (dati['provincia'] === 'Seleziona Provincia') {

    } else {
        $.ajax({
            url: 'index.php?controller=page1Controller&action=getComuni',
            type: "GET",
            dataType: "JSON",
            data: dati,
            success: function (response) {
                loadComuni(response);
                showSelectComune();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            },
            complete: function (response) {

            },
        });
    }
}

function loadProvince(province) {
    for (let i = 0; i < province.length; i++) {
        $("#provincer").append("<option>" + province[i] + "</option>");
    }
}

function loadComuni(comuni) {
    var html = "<option selected>Seleziona Comune</option>";
    for (let i = 0; i < comuni.length; i++) {
        html += "<option>" + comuni[i] + "</option>";
    }
    $("#comunir").html(html);
}

function showSelectComune() {
    $("#comunir").show();
    $("#labelcomune").show();

}
