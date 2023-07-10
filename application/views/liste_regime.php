<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Regimes existants</h4>
<!-- Examples -->
        <div class="row mb-5">
            <?php
                for($i=0; $i<count($regime); $i++) {
                    ?>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?php echo base_url("assets/img/elements/2.jpg"); ?>" alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $regime[$i]['nom_regime']; ?></h5>
                                <p class="card-text">
                                    Objectif : <?php echo $regime[$i]['nom_objectif']; ?>
                                </p>
                                <p class="card-text">
                                    Prix : <?php echo number_format($regime[$i]['prix'], 0, ',', ' ')." ar"; ?>
                                </p>
                                <p class="card-text">
                                    Poid perdu/gagner : <?php echo $regime[$i]['poid']; ?>
                                </p>
                                <a href="<?php echo site_url("Admin/getMenuOfRegime?id_regime=".$regime[$i]['id_regime']); ?>" class="btn btn-outline-primary">Voir les menus</a>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    <!-- Examples -->
    </div>
<!-- / Content -->