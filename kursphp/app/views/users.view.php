<?php

use Wesel\Shortener;

\Wesel\Shortener\Page::displayHeader("Twoje linki w skracamy.com");
\Wesel\Shortener\Page::displayNavigation();
?>

            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Zarejestrowani użytkownicy</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                

                <div class="col-md-6 col-md-offset-3">
                <?php Wesel\Shortener\Messages::flashMessages(); ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Użytkownicy
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">
                                    <table id="table-links" class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Adres e-mail</th>
                                                <th>Data dołączenia</th>
                                                <th>Dostęp do systemu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><?=$user['id'];?></td>
                                                <td><?=$user['email'];?></td>
                                                <td><?=$user['dateCreated'];?></td>
                                                <?php if ($user['isBanned']): ?>
                                                <td ><a href="https://<?=ROOT_APP_URL;?>/unlockUser?id=<?=$user['id'];?>">Odblokuj</a></td>
                                                <?php endif; ?>
                                                <?php if (!$user['isBanned']): ?>
                                                <td ><a href="https://<?=ROOT_APP_URL;?>/banUser?id=<?=$user['id'];?>">Zablokuj</a></td>
                                                <?php endif; ?>
                                            </tr>
                                        <? endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /#page-wrapper -->

<?php

\Wesel\Shortener\Page::displayFooter();

?>
