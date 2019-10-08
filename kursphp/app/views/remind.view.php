<?php

use Wesel\Shortener;

Wesel\Shortener\Page::displayHeader("Twoje linki w skracamy.com");

?>

<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
    <?php Wesel\Shortener\Messages::flashMessages(); ?>
                        <div class="panel-heading">
                            <h3 class="panel-title">Przypomnij hasło</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="https://<?=ROOT_APP_URL;?>/remind">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Podaj zarejestrowany adres E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Przypomnij hasło</button>
                                <div class="checkbox">
                                            <a href="https://<?=ROOT_APP_URL;?>/loginForm">Wróć do logowania</a>
                                    </div>
                                </fieldset>
                            </form>
                                            <a href="https://<?=ROOT_LANDING_URL;?>">Wróć na skracamy.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

Wesel\Shortener\Page::displayFooter();

?>
