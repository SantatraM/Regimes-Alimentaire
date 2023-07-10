<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Horizontal -->
        <h5 class="pb-1 mb-4">Liste des menus du regime <?php echo $regime['nom_regime']; ?></h5>
        <div class="row mb-5">
            <?php
                for($i=0; $i<count($menu); $i++) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $menu[$i]['nom_menu']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</div>
<!--/ Horizontal -->