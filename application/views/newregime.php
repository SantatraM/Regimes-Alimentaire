          <div class="col-6 d-flex justify-content-center" style = "justify-content:center;">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Inserer un nouveau regime</h5>
              </div>
              <div class="card-body">
                <form action="<?php echo site_url("Admin/nouveauRegime"); ?>" method="post">
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Nom du regime</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <input
                        type="text"
                        class="form-control"
                        id="basic-icon-default-fullname"
                        placeholder="Nom du regime"
                        aria-label="Nom du regime"
                        aria-describedby="basic-icon-default-fullname2"
                        name="nom_regime"
                      />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Prix</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class="bx bx-buildings"></i
                      ></span>
                      <input
                        type="number"
                        id="basic-icon-default-company"
                        class="form-control"
                        placeholder="Prix"
                        aria-label="Prix"
                        aria-describedby="basic-icon-default-company2"
                        name="prix_regime"
                      />
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="col-md">
                    <small class="text-light fw-semibold">Choisir les menus</small>
                    <?php
                      for($i=0; $i<count($menu); $i++) {
                        ?>
                        <div class="form-check mt-3">
                          <input class="form-check-input" name="id_menu[]" type="checkbox" value="<?php echo $menu[$i]['id_menu']; ?>" id="defaultCheck1" />
                          <label class="form-check-label" for="defaultCheck1"> <?php echo $menu[$i]['nom_menu']; ?> </label>
                        </div>
                      <?php }
                    ?>
                  </div>
                  <small class="text-light fw-semibold">Choisissez l'objectif correspondant</small>
                  <?php
                    for($i=0; $i<count($objectif); $i++) {
                      ?>
                      <div class="form-check mt-3">
                        <input
                          name="id_objectif"
                          class="form-check-input"
                          type="radio"
                          value="<?php echo $objectif[$i]['id_objectif']; ?>"
                          id="defaultRadio1"
                        />
                        <label class="form-check-label" for="defaultRadio1"> <?php echo $objectif[$i]['nom_objectif']; ?> </label>
                      </div>
                    <?php }
                  ?>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Poid gagner/perdu</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="number"
                        class="form-control"
                        aria-describedby="basic-icon-default-email2"
                        placeholder="Poid gagner/perdu"
                        name="poid"
                      />
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Inserer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
