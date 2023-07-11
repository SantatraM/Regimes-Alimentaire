<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Regimes existants</h4>
<!-- Examples -->
        <div class="row mb-5">
            <?php
                for($i=0; $i<count($sport); $i++) {
                    ?>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?php echo base_url("assets/img/".$sport[$i]['image_activite_sportive']); ?>" alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $sport[$i]['nom_activite_sportive']; ?></h5>
                                <p class="card-text">
                                    Objectif : <?php echo $sport[$i]['nom_objectif']; ?>
                                </p>
                                <p class="card-text">
                                    Poid perdu/gagner : <?php echo $sport[$i]['poid']; ?>
                                </p>
                                <a href="<?php echo site_url("Admin/supprimerSport?id_activite_sportive=".$sport[$i]['id_activite_sportive']); ?>" class="btn btn-red">Supprimer</a>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    <!-- Examples -->
    </div>
<!-- / Content -->