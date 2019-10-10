<?php

use Wesel\Shortener;

\Wesel\Shortener\Page::displayHeader("Twoje linki w skracamy.com");
\Wesel\Shortener\Page::displayNavigation();
?>

            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Zmień hasło</h1>
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
                                Zmień hasło
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form role="form" method="POST" action="https://<?=ROOT_APP_URL;?>/changePassword">
                                            <div class="form-group">
                                                <input name="oldPassword" placeholder="Obecne hasło" type="password" class="form-control">
                                            </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nowe hasło" name="password" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Powtórz nowe hasło" name="password2" type="password" value="">
                                    
                                                <p class="help-block">Podaj stare oraz nowe hasło, by je zmienić.</p>
                                            </div>
                                            <button type="submit" class="btn btn-success">Zmień hasło</button>
                                        </form>
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
