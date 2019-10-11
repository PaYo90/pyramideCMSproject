<div class="container">
                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        Unique <span class="fw-300"><i>Icon</i></span>
                                    </h2>
                                    <div class="panel-toolbar mr-2">
                                        <select id="js-select-layers" class="custom-select form-control custom-select-sm" style="width:8rem">
                                            <option value="2">Two layers</option>
                                            <option value="3">Three layers </option>
                                            <option value="4">Four layers</option>
                                            <option value="5">Five layers</option>
                                            <option value="6">Six layers</option>
                                            <option value="7">Seven layers</option>
                                        </select>
                                    </div>
                                    <div class="panel-toolbar">
                                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                    </div>
                                </div>
                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-12 col-xl-auto">
                                                <div class="d-flex align-items-center justify-content-center position-relative w-100 mb-g mb-xl-0" style="font-size: 250px; min-width: 301px; height: 351px; background: url(img/backgrounds/bg-5.png) #fff; border-left:0; border-top:0; ">
                                                    <h6 class="fw-300 position-absolute pos-top pos-left m-2 bg-fusion-100 p-2 rounded fs-sm opacity-70">Preview</h6>
                                                    <div id="icon-construct" class="icon-stack m-0 p-0"></div>
                                                </div>
                                            </div>
                                            <div class="flex-1 col-12 col-xl-auto">
                                                <ul class="mb-2 p-0 list-unstyled" id="construct-wrap"></ul>
                                                <div class="row">
                                                    <div class="col-12 text-right">
                                                        <button class="btn btn-success" onclick="copyIcon();">
                                                            Copy Icon
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <textarea id="js-icon-class" class="position-absolute" style="height:0px; width:0px; opacity:0;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>