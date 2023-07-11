<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulaire des objectifs</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Veullez remplir les champs</h5>
            <small class="text-muted float-end"></small>
          </div>
          <div class="card-body">
          <form action="<?php echo site_url('Client/insertPlanning') ;?>" method="post">
            <div class="mb-3">
              
                <label class="form-label" for="basic-default-fullname" name="objectif">Choix des objectifs</label>
                
                  
                  <select name="id_objectif" id="">
                    <?php foreach ($objectif as $ob)  { ?>
                    <option value="<?php echo $ob['id_objectif']; ?> "> <?php echo $ob['nom_objectif']; ?>  </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Poids a viser</label>
                  <input type="text" class="form-control" id="basic-default-fullname" placeholder="Poids a viser" name="poids_demander" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Date de debut</label>
                    <input type="date" class="form-control" id="basic-default-company" placeh="Date de debut" name="date_debut" />
                </div>
                
                </div>
                <button type="submit" class="btn btn-primary">Envoyers</button>
              </form>
          </div>
        </div>
      </div>