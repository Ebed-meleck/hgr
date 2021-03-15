$(document).ready(function () {
  $('form').submit(function (event) {
    if ($('#valid') === 0) {
      $('#valid').after('<span>Veuillez le code réçu par email</span>')
      event.preventDefault();

    } else {
      let chaine = $('form').serialiez();
    }
  })
});