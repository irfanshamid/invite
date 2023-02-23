$(function () {
	
var cIndex = 0;
var indexLanders = 4;

$(document).ready(function() {
    renderingIndex()

    if (cIndex > 1) {
        $("#landersBtnBack").show();
    } else {
        $("#landersBtnBack").hide();
    }

    if (cIndex < 2) {
        $("#landersBtnNextInsight").hide();
    } else {
        $("#landersBtnNextInsight").show();
        $("#landersBtnNext").hide();
    }

});

function renderingIndex() {
    for (let i = 0; i < indexLanders; i++) {
        $(`.landers_cl_index`).append(`
         <div class="landers_cl_item ${i === cIndex ? ' active' : null}"><div>
      `);
    }
}

function stepper(act) {
    if (act) {
        if (cIndex < 3) {
            cIndex += 1;
            $(`.landers_cl_index`).html('');
            renderingIndex();
            $("#landersBtnBack").show();
            if (cIndex > 1) {
                $('#landersBtnNext').hide();
                $("#landersBtnNextInsight").show();
            }
        }
    } else {
        if (cIndex > 0) {
            cIndex -= 1;
            $(`.landers_cl_index`).html('');
            renderingIndex();

            if (cIndex < 1) {
                $("#landersBtnBack").hide();
            } else {
                $("#landersBtnBack").show();
            }

            if (cIndex < 2) {
                $('#landersBtnNext').show();
                $("#landersBtnNextInsight").hide();
            }
        }
    }
}
})