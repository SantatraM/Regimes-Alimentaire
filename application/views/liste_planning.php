<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
    <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                    <th>Numero de planning</th>
                    <th>Objectif</th>
                    <th>Objectif-poid</th>
                    <th>Date de debut</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                        for($i=0; $i<count($planning); $i++) {
                            ?>
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $planning[$i]['id_planning']; ?></strong></td>
                                <td><?php echo $planning[$i]['nom_objectif']; ?></td>
                                <td><?php echo $planning[$i]['poids_demander']; ?></td>
                                <td><?php echo $planning[$i]['date_debut']; ?></td>
                                <td>
                                    <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-trash me-1"></i> Delete</a
                                        >
                                    </div>
                                    </div>
                                </td>
                                <td>
                                    <a href=<?php echo site_url("Client/proposition_regime?id_planning=".$planning[$i]['id_planning']); ?>>
                                        Liste de regimes proposer
                                    </a>
                                </td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
</div>
<!-- / Content -->