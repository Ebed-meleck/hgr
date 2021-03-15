
$(document).ready(function () {
  //charge la fiche médical
  let linkFiche = $('#fiche')
  linkFiche.click(function (e) {
    e.preventDefault();
    $('#main-content').load('fiche.php');
  });
  //charger la consultation
  let consult = $('#consult');
  consult.click(function (event) {
    event.preventDefault();
    $('#main-content').load('consult.php') //.replaceWith('consult.php');
  });





});