<?php

use Wesel\Shortener;

\Wesel\Shortener\Page::displayHeader("Twoje linki w skracamy.com");
\Wesel\Shortener\Page::displayNavigation();
?>

            
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dodaj nowy link</h1>
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
                                Skracasz nowego linka
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form role="form" method="POST" action="https://<?=ROOT_APP_URL;?>/addUrl">
                                            <div class="form-group">
                                                <label>Długi URL</label>
                                                <input name="url" class="form-control">
                                                <p class="help-block">Wklej URL celem jego skrócenia.</p>
                                            </div>
                                            <button type="submit" class="btn btn-success">Skróć linka</button>
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
