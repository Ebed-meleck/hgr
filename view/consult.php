<div class="container">
  <section class="section">
    <div class="search">
      <div class="title-search">
        <h6> Entrer le numéro du dossier </h6>
      </div>
      <div class="form-search">
        <form action="../controller/consult.php" id="search-patient" method="post">
          <div class="form-group">
            <input type="search" name="data" id="data" size="23">
          </div>
          <div class="form-group">
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>
      </div>

    </div>
</div>
<div class="data-patient">
  <div class="title-data">
    <h6>Fiche Médical</h6>
  </div>
  <div class="content-patient">
    <h6>Information du patient</h6>
  </div>
</div>
<div class="consult-docteur">
  <div class="title-consult">
    <h3>Consultation</h3>
  </div>
  <div class="form-consult">
    <form action="../controller/docter.php" method="post">
      <div class="form-group">
        <label for="histo">Historique</label>
        <textarea name="histo" id="histo" class="histo" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label for="examphysique">Examen physique</label>
        <textarea name="examephysique" id="examphysique" class="epy" cols="30" rows="10"></textarea>
      </div>
    </form>
  </div>
</div>
</section>
</div>
<script src="../public/js/consul.js"></script>

</body>