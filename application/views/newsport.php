<div class="col-6 d-flex justify-content-center" style = "justify-content:center;">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Inserer un nouveau sport</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url("Admin/nouveauSport"); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Nom du sport</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                        <input
                        type="text"
                        class="form-control"
                        id="basic-icon-default-fullname"
                        placeholder="Nom du sport"
                        aria-label="Nom du sport"
                        aria-describedby="basic-icon-default-fullname2"
                        name="nom_sport"
                        />
                    </div>
                </div>
                <!-- checkbox -->
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
                </div>
                <div class="input-group">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    <input type="file" class="form-control" id="inputGroupFile01" name="image_sport" />
                </div>
                <button type="submit" class="btn btn-primary">Inserer</button>
            </form>
        </div>
    </div>
</div>