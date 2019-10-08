<?php

namespace Wesel\Shortener;

class RequestProcessor
{
    public function processShortRequest($request) {
        $shortener = new Shortener();
        $shortener->RedirectToDestinationUrl(str_replace('/', '', $request));
    }

    public function processAppRequest($request) {
        $dashboard = new Dashboard($request);
        $dashboard->ProcessRequest();
    }

    public function processLandingRequest($request) {
        require("landing.view.php");
    }
}