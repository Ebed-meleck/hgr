<?php //require "../controller/fiche.php"
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<div class="register-patient">
  <div class="title-register">
    <h5>Fiche médical</h5>
  </div>
  <div class="errors-form" style="display: none">
    <p>Veuillez remplir le champs vide </p>
  </div>
  <div class="form">
    <form id="form" class="needs-validation"  action="../controller/fiche.php" method="POST">
      <fieldset>
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" name="patient_name" id="nom" class="input-lg" placeholder="Bueyasa">
          <label for="last_name">Post-Nom</label>
          <input type="text" name="post_nom" id="last_name" class="input-lg" placeholder="Makambu"><br>
        </div>
        <div class="form-group">
          <label for="date">Date de naissance</label>
          <input type="date" name="date" id="date" class="input-lg">
          <label for="lieu">Lieu</label>
          <input type="text" name="lieu" id="lieu" class="input-lg" placeholder="Kinshasa"><br>
        </div>
        <div class="form-group">
          <label for="sexe">Sexe</label>
          <select name="sexe" id="sexe" class="input-lg">
            <option selected disabled value="">Choisir...</option>
            <option value="">Masculin</option>
            <option value="">Féminin</option>
          </select>
        </div>

        <div class="vital">
          <h5>Signes vitaux</h5>
        </div>
        <div class="form-group">
          <label for="temperature">T (*C)</label>
          <input type="number" name="tempete" id="temperature" class="input-lg" min="30" max="45" size="10" placeholder="35">
          <label for="tension">T.A</label>
          <input type="text" name="tension" id="tension" class="input-lg" size="" placeholder="145/90 mmHg ou 14/9">
          <label for="pulsation">Pulsation</label>
          <input type="text" name="pulsation" id="pulsation" class="input-sm" size="13" placeholder="60 ou 100 bpm">
        </div>
        <div class="btn-register">
          <button type="submit" class=" button is-link" name="send" id="btn">Soumettre</button>
        </div>
      </fieldset>
  </div>


  </form>
</div>
</div>

