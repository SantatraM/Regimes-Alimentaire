
<div class="card mb-4">
<h5 class="card-header">Charger votre compte</h5>
<div class="card-body">
    <?php if(isset($error)): ?>
        <p style="color:red"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="<?php echo site_url('Client/save') ?>" method="post">
        <div class="row gx-3 gy-2 align-items-center">
            <div class="col-md-3">
                <label class="form-label" for="selectTypeOpt">Entrez le code</label>
                <input type="text" name="numero" id="selectTypeOpt" >
            </div>
            <div class="col-md-3">
                <label class="form-label" for="showToastPlacement">&nbsp;</label>
                <button id="showToastPlacement" class="btn btn-primary d-block">Insert</button>
            </div>
        </div>
    </form>
</div>

<div class="card">
    <h5 class="card-header">Liste des codes disponibles</h5>
    <div class="table-responsive text-nowrap">
    <?php if (!empty($code)) { ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Numero</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($code as $codes) { ?>
                    <tr>
                        <td><?php echo $codes['id_code'] ?></td>
                        <td><?php echo $codes['numero'] ?></td>
                        <td><?php echo $codes['montant'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }else{ echo "aucun code disponible"; } ?>
    </div>
</div>