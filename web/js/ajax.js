let speedEditButtons = document.querySelectorAll('.tariff-speed-edit');

for (let button of speedEditButtons) {
    button.addEventListener('click', speedEdit)
}

function speedEdit(event) {
    let saveButton = event.target.parentElement.querySelector('.tariff-speed-save')
    let speedField = event.target.parentElement.querySelector('.tariff-speed-input')

    saveButton.hidden = false;
    event.target.hidden = true;
    speedField.disabled = false;
    speedField.classList.remove('form-control-plaintext');
}

// TODO Переписать c jQuery на чистый JS
$(document).ready(function () {
    $('form').on('beforeSubmit', function () {
        var $speedform = $(this);

        $.ajax({
            type: $speedform.attr('method'),
            url: $speedform.attr('action'),
            data: $speedform.serializeArray()
        }).done(function (data) {
            if (data.error == null) {
                $("#output").text(data.data.speed)
                var $input = $speedform.find("input[name='Tariff[speed]']");
                var $saveButton = $speedform.find("button.tariff-speed-save");
                var $editButton = $speedform.find("button.tariff-speed-edit");
                $input.prop("disabled", true);
                $input.addClass('form-control-plaintext')
                $saveButton.attr("hidden",true);
                $editButton.removeAttr("hidden");
                alert('Изменения скорости тарифа успешно сохранены');
            } else {
                $("#output").text(data.error)
            }
        }).fail(function () {
            $("#output").text("error3");
        })
        return false;
    })
})
