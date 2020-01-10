
<div id="js-inbox-menu" class="flex-wrap position-relative bg-white slide-on-mobile slide-on-mobile-left">
    <div class="position-absolute pos-top pos-bottom w-100">
        <div class="d-flex h-100 flex-column">
            <div class="px-3 px-sm-4 px-lg-5 py-4 align-items-center">
                <div class="btn-group btn-block" role="group" aria-label="Button group with nested dropdown ">
                    <button type="button" class="btn btn-danger btn-block fs-md" data-action="toggle" data-class="d-flex" data-target="#panel-compose" data-focus="message-to">Compose</button>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle px-2 js-waves-off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu p-0" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="#">Compose Long</a>
                            <a class="dropdown-item" href="#">Contacts</a>
                            <a class="dropdown-item" href="#">Edit signature</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 pr-3">
                <a href="page_inbox_generasdal.html" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md font-weight-bold d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0 ">
                    <div>
                        <i class="fas fa-folder-open width-1"></i>Inbox
                    </div>
                    <div class="fw-400 fs-xs text-black-50"><b><?php echo Aplikacja\PW::countNewConversations($_SESSION['user']->id); ?></b></div>
                </a>
                <a href="javascript:void(0)" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                    <div>
                        <i class="fas fa-star width-1"></i>Starred
                    </div>
                    <div class="fw-400 fs-xs">(6)</div>
                </a>
                <a href="javascript:void(0)" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                    <div>
                        <i class="fas fa-edit width-1"></i>Draft
                    </div>
                    <div class="fw-400 fs-xs">(5)</div>
                </a>
                <a href="javascript:void(0)" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                    <div>
                        <i class="fas fa-paper-plane width-1"></i>Sent
                    </div>
                </a>
                <a href="javascript:void(0)" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                    <div>
                        <i class="fas fa-exclamation-triangle width-1"></i>Spam
                    </div>
                </a>
                <a href="javascript:void(0)" class="dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md font-weight-bold d-flex justify-content-between rounded-pill border-top-left-radius-0 border-bottom-left-radius-0">
                    <div>
                        <i class="fas fa-trash width-1"></i>Trash
                    </div>
                </a>
            </div>
            <div class="px-5 py-3 fs-nano fw-500">
                1.5 GB (10%) of 15 GB used
                <div class="progress mt-1" style="height: 7px;">
                    <div class="progress-bar" role="progressbar" style="width: 11%;" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="slide-backdrop" data-action="toggle" data-class="slide-on-mobile-left-show" data-target="#js-inbox-menu"></div>