<div class="card">
                <h5 class="card-header">Listes des codes choisis par les clients</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Code</th>
                        <th>Montant</th>
                        <th>Actions</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($pm as $p_m) { ?>
                      <tr>
                            <td><?php if(isset($p_m['user'])) { 
                                echo $p_m['user'] ;
                             }else {
                                 echo "null";
                            } ?></td>
                            <td><?php echo $p_m['numero']; ?></td>
                            <td><?php echo $p_m['montant']; ?> Ar</td>
                            <td><a href="<?php echo site_url('Admin/valide_porte_monaie/'.$p_m['user']."/".$p_m['id_code'] ); ?>">Valider</a> </td>
                            <td><a href="">Refuser</a> </td>
                      </tr>
                            <?php } ?>
                            
                    </tbody>
                  </table>
                </div>
              </div>