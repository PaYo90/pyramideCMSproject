<?php

use Aplikacja as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);

//var_dump($edit);
if(isset($zmienne["edit"]) AND $zmienne["edit"]=="on"){
	$profile_active = "";
	$profile_edit_active = "show active";
	$profile_link_2_active = "active";
}else{
	$profile_active ="show active";
	$profile_edit_active = "";
	$profile_link_1_active = "active";
}
?><script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react-dom.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<style>
    #new_post {
        max-height: 50vh;
    }

    #new_comment {
        max-height: 10vh;
    }
</style>
    <script>


        document.addEventListener('input', function (event) {
            if (event.target.tagName.toLowerCase() !== 'textarea') return;
            autoExpand(event.target);
        }, false);

        var autoExpand = function (field) {

            // Reset field height
            field.style.height = 'inherit';

            // Get the computed styles for the element
            var computed = window.getComputedStyle(field);

            // Calculate the height
            var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
                + parseInt(computed.getPropertyValue('padding-top'), 10)
                + field.scrollHeight
                + parseInt(computed.getPropertyValue('padding-bottom'), 10)
                + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

            field.style.height = height + 'px';

        };



    </script>
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ul class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=SITE_NAME;?></a></li>
                            <li class="breadcrumb-item">Profile</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ul>

                        <div class="row">

			                <div class="col-12 panel">
                                <div class="col-12 d-flex justify-content-center py-6 my-6">

                                    @$komiksy = \Aplikacja\WEB_TOON::getIndexComics($id)

                                    @FOREACH($komiksy as $komiks)

                                            <div class='mx-6 text-center'>
                                                {{$komiks["name"]}}<br>
                                                <img src="http://{{ROOT_APP_URL}}/uploads/{{$komiks['id']}}/{{$komiks['cover_file_name']}}" width="140" height=\"160\">


                                            </div>

                                    @ENDFOREACH

                                </div>
                            </div>
								

                        </div>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content --><?php

app\Page::lowerContent();

?>