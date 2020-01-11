<?php
use Aplikacja\CodeParser;
use Aplikacja\FileReader;
use Aplikacja as app;
app\Page::upperContent( $title, $ActiveMenuCategory, $ActiveMenuSubCategory,1,0, 0,0);
?>
@IF(SIMPLE == 1)
<style>
    #fake_textarea_sendmsg {
        resize:vertical;
        overflow:auto;
        border:1px solid silver;
        border-radius:5px;
        min-height:100px;
        box-shadow: inset 0 0 10px silver;
        padding:1em;
        background: white;
        margin: 0 auto;
        width: 90%;
    }
</style>
@ENDIF
@IF(SUMMERNOTE == 1)
<link rel="stylesheet" media="screen, print" href=<?="http://".ROOT_APP_URL."/themes/smartadmin/css/formplugins/summernote/summernote.css";?>>
<style>
    .note-editable.card-block{
        box-shadow: inset 0 0 10px silver;
    }

</style>
@ENDIF
<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <!-- Page heading removed for composed layout -->
    <div class="d-flex flex-grow-1 p-0">
        <!-- left slider -->
        @include ("themes/smartadmin/left_slider_inbox.php")
        <!-- end left slider -->
        <!-- inbox container -->
        <div class="d-flex flex-column flex-grow-1 bg-white">
            <!-- inbox header -->
            <div class="flex-grow-0">
                <!-- inbox button shortcut -->
                <div class="d-flex flex-wrap align-items-center pl-2 pr-3 py-2 px-sm-4 pr-lg-5 pl-lg-0 border-faded border-top-0 border-left-0 border-right-0">
                    <div class="flex-1 d-flex align-items-center">
                        <a href="http://{{ROOT_APP_URL}}/inbox" class="btn btn-icon rounded-circle mr-2 mr-lg-3">
                            <i class="fas fa-arrow-left fs-lg"></i>
                        </a>
                        <a href="./{{$id}}" class="btn btn-icon rounded-circle mr-1">
                            <i class="fas fa-redo fs-md"></i>
                        </a>
                        <a href="page_inbox_general.html" class="btn btn-icon rounded-circle mr-1">
                            <i class="fas fa-exclamation-circle fs-md"></i>
                        </a>
                        <a href="page_inbox_general.html" id="js-delete-selected" class="btn btn-icon rounded-circle mr-1">
                            <i class="fas fa-trash fs-md"></i>
                        </a>
                    </div>
                    <div class="text-muted mr-1 mr-lg-3 ml-auto">
                        <span class="hidden-lg-down"> 1 - 50 of 135 </span>
                        <div class="btn-group hidden-lg-up" role="group">
                            <button type="button" class="btn btn-default">Reply</button>
                            <div class="btn-group" role="group">
                                <button id="dropdown-reply" type="button" class="btn btn-default dropdown-toggle px-2 js-waves-off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu p-0" aria-labelledby="dropdown-reply">
                                    <a class="dropdown-item" href="#">Reply to all</a>
                                    <a class="dropdown-item" href="#">Forward</a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="#">
                                        Move to...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap hidden-lg-down">
                        <button class="btn btn-icon rounded-circle"><i class="fal fa-chevron-left fs-md"></i></button>
                        <button class="btn btn-icon rounded-circle"><i class="fal fa-chevron-right fs-md"></i></button>
                    </div>
                </div>
                <!-- end inbox button shortcut -->
            </div>
            <!-- end inbox header -->
            <!-- inbox message -->
            <div class="flex-wrap align-items-center flex-grow-1 position-relative bg-white">
                <div class=" position-absolute pos-top pos-bottom w-100 custom-scroll">
                    <div class="d-flex h-100 flex-column">
                        <!-- inbox title -->
                        <div class="d-flex align-items-center pl-2 pr-3 py-3 pl-sm-3 pr-sm-4 py-sm-4 px-lg-5 py-lg-3 flex-shrink-0">
                            <!-- button for mobile -->
                            <a href="javascript:void(0);" class="pl-3 pr-3 py-2 d-flex d-lg-none align-items-center justify-content-center mr-2 btn" data-action="toggle" data-class="slide-on-mobile-left-show" data-target="#js-inbox-menu">
                                <i class="fal fa-ellipsis-v h1 mb-0 "></i>
                            </a>
                            <!-- end button for mobile -->
                            <h1 class="subheader-title mb-0 ml-2 ml-lg-5">
                                {{$conversation['subject']}}
                            </h1>
                            <span class="badge badge-primary ml-2 hidden-sm-down">INBOX</span>
                            <div class="d-flex position-relative ml-auto">
                                <a href="#" title="starred" class="btn btn-icon ml-1 fs-lg">
                                    <i class="fas fa-star color-warning-500"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-icon ml-1 fs-lg" data-toggle="collapse" data-target=".js-collapse">
                                    <i class="fas fa-arrows-v"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-icon ml-1 fs-lg hidden-lg-down">
                                    <i class="fas fa-print"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end inbox title -->

                        @$msgnr=1
                        @foreach($messages as $message)
                        <?php $user = app\PW::takeUserCre($message['user_id']); ?>
                        <?php $message['content'] = str_replace("&quot;", "\"", $message['content']); ?>
                        <?php $read = app\PW::checkIfRead($message['id']); ?>
                        <!-- message -->
                        <a name="msg-{{$message['id']}}"></a>
                        <div id="msg-{{$message['id']}}" class="d-flex flex-column border-faded border-top-0 border-left-0 border-right-0 py-3 px-3 px-sm-4 px-lg-0 mr-0 mr-lg-5 flex-shrink-0">
                            <div class="d-flex align-items-center flex-row">
                                <div class="ml-0 mr-3 mx-lg-3">
                                    <img src="http://{{ROOT_APP_URL}}/IMAGES/avatars/<?=$message['user_id'];?>/<?=$user['username'];?>_sm.{{$user['avatar']}}" class="profile-image profile-image-md rounded-circle" alt="{{$user['username']}}">
                                </div>
                                <div class="fw-500 flex-1 d-flex flex-column cursor-pointer" data-toggle="collapse" data-target="#msg-{{$message['id']}} > .js-collapse" >
                                    <div class="fs-lg">
                                        {{$user['username']}}
                                        <span class="fs-nano fw-400 ml-2">{{$user['profesja']}}</span>
                                    </div>
                                    <div class="fs-nano">
                                        to {{$message['adresat_name']}}
                                    </div>
                                </div>
                                <div class="color-fusion-200 fs-sm">
                                    {{$message['made_date']}} <span class="hidden-sm-down">(12 hours ago)</span>
                                </div>
                                <div class="collapsed-reveal">
                                    <a href="javascript:void(0);" class="btn btn-icon ml-1 fs-lg rounded-circle">
                                        <i class="fal fa-reply"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse js-collapse <?php if($read['ifread'] == 0) { echo "show"; app\PW::readMsg($message['id']); }elseif ($msgcount == $msgnr) { echo "show"; } ?>">
                                <div class="pl-lg-5 ml-lg-5 pt-3 pb-4">
                                    {{$message['content']}}
                                </div>
                            </div>
                        </div>
                        <!-- end message -->
                        <?php $msgnr++; //todo: dodac iteracje do code parser?>
                        @endforeach
                        <!-- ANSWER OPTION -->
                        <div class="row">
                            <div class="col-12">
                                @IF(SUMMERNOTE == 1)
                                <div class="panel-container show " style="width: 98%"><br>
                                    <div class="panel-content">
                                        <form action="http://<?=ROOT_APP_URL;?>/sendMessage" method="post">
                                            <input name="conid" type="hidden" value="{{$id}}">
                                            <input name="adresat" type="hidden" value="{{$adresat}}">
                                            <input id="sendmsg_tresc" name="tresc" type="hidden" value="">
                                            
                                            <textarea class="js-summernote" id="saveToLocal" name="tresc"></textarea>
                                            <div class="mt-2 clearfix">
                                                <div class="custom-control mt-3 custom-checkbox float-left">
                                                    <input type="checkbox" class="custom-control-input" id="autoSave" checked="checked">
                                                    <label class="custom-control-label" for="autoSave">Autosave changes to LocalStorage <span class="fw-300">(every 3 seconds)</span></label>
                                                </div>
                                                <div class="float-right">
                                                    <button class="btn btn-light">Send</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                @ENDIF
                                @IF(SIMPLE == 1)
                                <form id="simple_msg" action="http://<?=ROOT_APP_URL;?>/sendMessage" method="post">
                                    <input name="conid" type="hidden" value="{{$id}}">
                                    <input name="adresat" type="hidden" value="{{$adresat}}">
                                    <input id="sendmsg_tresc" name="tresc" type="hidden" value="">

                                <div id="editparent" class=""><BR>
                                    <div id='editControls' style='text-align:center; padding:5px;'>
                                        <div class='btn-group btn-group-sm'>
                                            <a class='btn btn-secondary ' data-role='undo' href='#'><i class='fa fa-undo'></i></a>
                                            <a class='btn btn-secondary ' data-role='redo' href='#'><i class='fa fa-repeat'></i></a>
                                        </div>
                                        <div class='btn-group btn-group-sm'>
                                            <a class='btn btn-secondary' data-role='bold' href='#'><b>Bold</b></a>
                                            <a class='btn btn-secondary' data-role='italic' href='#'><em>Italic</em></a>
                                            <a class='btn btn-secondary' data-role='underline' href='#'><u><b>U</b></u></a>
                                            <a class='btn btn-secondary' data-role='strikeThrough' href='#'><strike>abc</strike></a>
                                        </div>
                                        <div class='btn-group btn-group-sm'>
                                            <a class='btn btn-secondary' data-role='justifyLeft' href='#'><i class='fa fa-align-left'></i></a>
                                            <a class='btn btn-secondary' data-role='justifyCenter' href='#'><i class='fa fa-align-center'></i></a>
                                            <a class='btn btn-secondary' data-role='justifyRight' href='#'><i class='fa fa-align-right'></i></a>
                                            <a class='btn btn-secondary' data-role='justifyFull' href='#'><i class='fa fa-align-justify'></i></a>
                                        </div>
                                        <div class='btn-group btn-group-sm'>
                                            <a class='btn btn-secondary' data-role='indent' href='#'><i class='fa fa-indent'></i></a>
                                            <a class='btn btn-secondary' data-role='outdent' href='#'><i class='fa fa-indent'></i></a>
                                        </div>
                                        <div class='btn-group btn-group-sm'>
                                            <a class='btn btn-secondary' data-role='insertUnorderedList' href='#'><i class='fa fa-list-ul'></i></a>
                                            <a class='btn btn-secondary' data-role='insertOrderedList' href='#'><i class='fa fa-list-ol'></i></a>
                                        </div>
                                        <div class='btn-group btn-group-sm'>
                                            <a class='btn btn-secondary' data-role='h1' href='#'>h<sup>1</sup></a>
                                            <a class='btn btn-secondary' data-role='h2' href='#'>h<sup>2</sup></a>
                                            <a class='btn btn-secondary' data-role='p' href='#'>p</a>
                                        </div>
                                        <div class='btn-group btn-group-sm'>
                                            <a class='btn btn-secondary' data-role='subscript' href='#'><i class='fa fa-subscript'></i></a>
                                            <a class='btn btn-secondary' data-role='superscript' href='#'><i class='fa fa-superscript'></i></a>
                                        </div>
                                    </div>
                                    <div id='fake_textarea_sendmsg' style='' contenteditable>
                                    </div>
                                    <div class="clearfix m-auto" style="width: 90%;"><br><a href="javascript:sendForm()" class="btn btn-secondary float-right">Send</a></div>
                                </div><br><br>
                                </form>
                                @ENDIF
                            </div></div>
                        <!-- END OF ANSWER OPTION -->
                    </div>
                </div>
            </div>
            <!-- end inbox message -->
        </div>
        <!-- end inbox container -->
        <!-- compose message -->
        <div id="panel-compose" class="panel w-100 position-fixed pos-bottom pos-right mb-0 z-index-cloud mr-lg-4 shadow-3 border-bottom-left-radius-0 border-bottom-right-radius-0 expand-full-height-on-mobile expand-full-width-on-mobile shadow" style="max-width:40rem; height:35rem; display: none;">
            <div class="position-relative h-100 w-100 d-flex flex-column">
                <!-- desktop view -->
                <div class="panel-hdr bg-fusion-600 height-4 d-none d-sm-none d-lg-flex">
                    <h4 class="flex-1 fs-lg color-white mb-0 pl-3">
                        New Message
                    </h4>
                    <div class="panel-toolbar pr-2">
                        <a href="javascript:void(0);" class="btn btn-icon btn-icon-light fs-xl mr-1" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen" data-placement="bottom">
                            <i class="fal fa-expand-alt"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon btn-icon-light fs-xl" data-action="toggle" data-class="d-flex" data-target="#panel-compose" data-toggle="tooltip" data-original-title="Save & Close" data-placement="bottom">
                            <i class="fal fa-times"></i>
                        </a>
                    </div>
                </div>
                <!-- end desktop view -->
                <!-- mobile view -->
                <div class="d-flex d-lg-none align-items-center px-3 py-3 bg-faded  border-faded border-top-0 border-left-0 border-right-0 flex-shrink-0">
                    <!-- button for mobile -->
                    <!-- end button for mobile -->
                    <h3 class="subheader-title">
                        New message
                    </h3>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-outline-danger" data-action="toggle" data-class="d-flex" data-target="#panel-compose">Cancel</button>
                    </div>
                </div>
                <!-- end mobile view -->
                <div class="panel-container show rounded-0 flex-1 d-flex flex-column">
                    <div class="px-3">
                        <input id="message-to" type="text" placeholder="Recipients" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 pr-5" tabindex="2">
                        <a href="javascript:void(0)" class="position-absolute pos-right pos-top mt-3 mr-4" data-action="toggle" data-class="d-block" data-target="#message-to-cc" data-focus="message-to-cc" data-toggle="tooltip" data-original-title="Add Cc recipients" data-placement="bottom">Cc</a>
                        <input id="message-to-cc" type="text" placeholder="Cc" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2 d-none" tabindex="3">
                        <input type="text" placeholder="Subject" class="form-control border-top-0 border-left-0 border-right-0 px-0 rounded-0 fs-md mt-2" tabindex="4">
                    </div>
                    <div class="flex-1" style="overflow-y: auto;">
                        <div id='fake_textarea' class="form-control rounded-0 w-100 h-100 border-0 py-3" contenteditable tabindex="5">
                            <br>
                            <br>
                            <div class="d-flex d-column align-items-start mb-3">
                                <img src="img/logo.png" alt="SmartAdmin WebApp" class="mr-3 mt-1">
                                <div class="border-left pl-3">
                                    <span class="fw-500 fs-lg d-block l-h-n">Dr. Codex Lantern</span>
                                    <span class="fw-400 fs-nano d-block l-h-n mb-1">Orthopedic Surgeon</span>
                                    <a href="#" class="mr-1 fs-xl" style="color:#3b5998"><i class="fab fa-facebook-square"></i></a>
                                    <a href="#" class="mr-1 fs-xl" style="color:#38A1F3"><i class="fab fa-twitter-square"></i></a>
                                    <a href="#" class="mr-1 fs-xl" style="color:#0077B5"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="mr-1 fs-xl" style="color:#ff0000"><i class="fab fa-youtube-square"></i></a>
                                </div>
                            </div>
                            <div class="text-muted fs-nano">
                                ​PRIVATE AND CONFIDENTIAL. This e-mail, its contents and attachments are private and confidential and is intended for the recipient only. Any disclosure, copying or unauthorized use of such information is prohibited. If you receive this message in error, please notify us immediately and delete the original and any copies and attachments.
                            </div>
                        </div>
                    </div>
                    <div class="px-3 py-4 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                        <a href="javascript:void(0);" class="btn btn-info mr-3">Send</a>
                        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Formatting options" data-placement="top">
                            <i class="fas fa-font color-fusion-300"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
                            <i class="fas fa-paperclip color-fusion-300"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
                            <i class="fas fa-camera color-fusion-300"></i>
                        </a>
                        <div class="ml-auto">
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl" data-toggle="tooltip" data-original-title="Disregard draft" data-placement="top">
                                <i class="fas fa-trash color-fusion-300"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
                                <i class="fas fa-ellipsis-v-alt color-fusion-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end compose message -->
    </div>
</main>
<!-- this overlay is activated only when mobile menu is triggered -->
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->




<?php
//require_once("themes/smartadmin/includes/_page_footer.php");
?>

<?php
//require_once("themes/smartadmin/includes/_skroty.php");
?>

<?php
require_once("themes/smartadmin/includes/_color_stuuf.php");
?>

</div>
</div>
</div>
<!-- END Page Wrapper -->

<?php
//require_once("themes/smartadmin/includes/_quick_menu.php");
?>


<?php
require_once("themes/smartadmin/includes/_messenger.php");
?>

<?php
require_once("themes/smartadmin/includes/_ustawienia.php");
?>

<?php
require_once("themes/smartadmin/includes/_end_page_settings.php");
?>

<?php
require_once("themes/smartadmin/includes/summernote.php");
?>

<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<script type="text/javascript">
    // push settings with "false" save to local
    initApp.pushSettings("layout-composed", false);
</script>
@IF(SIMPLE == 1)
<script type="text/javascript">
    $(function() {
        $('#editControls a').click(function(e) {
            switch($(this).data('role')) {
                case 'h1':
                case 'h2':
                case 'p':
                    document.execCommand('formatBlock', false, $(this).data('role'));
                    break;
                default:
                    document.execCommand($(this).data('role'), false, null);
                    break;
            }

        });
    });

    function sendForm(){
        $("#sendmsg_tresc").val($("#fake_textarea_sendmsg").html());
        $("#simple_msg").submit();
    }
</script>
@ENDIF
</body>
</html>