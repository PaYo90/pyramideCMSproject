<?php

use Wesel\Shortener;

\Wesel\Shortener\Page::displayHeader("Twoje linki w skracamy.com");
\Wesel\Shortener\Page::displayNavigation();
?>

            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Twoje linki</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                

                <div class="col-md-6 col-md-offset-3">
                <?php Wesel\Shortener\Messages::flashMessages(); ?>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary">
                        
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-link fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$count;?></div>
                                        <div>Dodanych linków!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="https://<?=ROOT_APP_URL;?>/newUrl">Dodaj nowy link</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-arrow-up fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$clicks;?></div>
                                        <div>Kliknięć!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="https://<?=ROOT_APP_URL;?>/newUrl">Dodaj nowy link</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <v class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Twoje linki
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table">
                                    <table id="table-links" class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Krótki link</th>
                                                <th>Link docelowy</th>
                                                <th>Data dodania</th>
                                                <th>Kliknięcia</th>
                                                <th>Usuń</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($urls as $url): ?>
                                            <tr>
                                                <td>https://<?=ROOT_SHORT_URL;?>/<?=$url['shortForm'];?></td>
                                                <td style="max-width: 500px; word-wrap: break-word;"><?=$url['destinationUrl'];?></td>
                                                <td><?=$url['dateCreated'];?></td>
                                                <td><?=$url['clicks'];?></td>
                                                <td ><a href="https://<?=ROOT_APP_URL;?>/deleteUrl?id=<?=$url['id'];?>">USUŃ</a></td>
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
