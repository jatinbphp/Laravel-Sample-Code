@extends('layouts.app')
@section('content')
<!-- BEGIN: Page Main-->

    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="row">
        <div class="col s12">
            <div class="container">
                <!-- Account settings -->
                <div class="top-profile-content-block">
                    <div class="sidebar-left sidebar-fixed">
                      <div class="sidebar">
                        <div class="sidebar-content">
                            <div class="sidebar-header">
                                <div class="sidebar-details">
                                  <h5 class="m-0 sidebar-title"><i class="material-icons app-header-icon text-top">check_box</i> To-Do</h5>
                                  <div class="row valign-wrapper mt-5 pt-2 animate fadeLeft">
                                    <div class="col s3 media-image">
                                      <img src="../../../app-assets/images/user/2.jpg" alt="" class="circle z-depth-2 responsive-img">
                                      <!-- notice the "circle" class -->
                                    </div>
                                    <div class="col s9">
                                      <p class="m-0 subtitle font-weight-700">Lawrence Collins</p>
                                      <p class="m-0 text-muted">lawrence.collins@xyz.com</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <section class="tabs-vertical mt-1 section">
                        <div class="row">
                            <div class="col left-content-panel">
                                <!-- tabs  -->
                                <div class="card-panel custom-panel">
                                    <ul class="tabs">
                                        <li class="tab">
                                            <a href="#general" class="active">
                                            <i class="material-icons">brightness_low</i>
                                            <span>General</span>
                                            </a>
                                        </li>
                                        <li class="tab">
                                            <a href="#change-password">
                                            <i class="material-icons">lock_open</i>
                                            <span>Change Password</span>
                                            </a>
                                        </li>
                                        <li class="tab">
                                            <a href="#info">
                                            <i class="material-icons">error_outline</i>
                                            <span> Info</span>
                                            </a>
                                        </li>
                                        <li class="tab">
                                            <a href="#social-link">
                                            <i class="material-icons">chat_bubble_outline</i>
                                            <span>Social Links</span>
                                            </a>
                                        </li>
                                        <li class="tab">
                                            <a href="#connections">
                                            <i class="material-icons">link</i>
                                            <span>Connections</span>
                                            </a>
                                        </li>
                                        <li class="tab">
                                            <a href="#notifications">
                                            <i class="material-icons">notifications_none</i>
                                            <span> Notifications</span>
                                            </a>
                                        </li>
                                        <li class="indicator" style="left: 0px; right: 0px;"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col right-content-block">
                                <!-- tabs content -->
                                <div id="general" class="active">
                                    <div class="card-panel">
                                        <div class="display-flex">
                                            <div class="media">
                                                <img src="../../../app-assets/images/avatar/avatar-12.png" class="border-radius-4" alt="profile image" height="64" width="64">
                                            </div>
                                            <div class="media-body">
                                                <div class="general-action-btn">
                                                    <button id="select-files" class="btn indigo mr-2">
                                                    <span>Upload new photo</span>
                                                    </button>
                                                    <button class="btn btn-light-pink">Reset</button>
                                                </div>
                                                <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                                <div class="upfilewrapper">
                                                    <input id="upfile" type="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider mb-1 mt-1"></div>
                                        <form class="formValidate" method="get" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="uname" class="active">Username</label>
                                                        <input type="text" id="uname" name="uname" value="hermione007" data-error=".errorTxt1">
                                                        <small class="errorTxt1"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="name" class="active">Name</label>
                                                        <input id="name" name="name" type="text" value="Hermione Granger" data-error=".errorTxt2">
                                                        <small class="errorTxt2"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="email" class="active">E-mail</label>
                                                        <input id="email" type="email" name="email" value="granger007@hogward.com" data-error=".errorTxt3">
                                                        <small class="errorTxt3"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="card-alert card orange lighten-5">
                                                        <div class="card-content orange-text">
                                                            <p>Your email is not confirmed. Please check your inbox.</p>
                                                            <a href="javascript: void(0);">Resend confirmation</a>
                                                        </div>
                                                        <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <input id="company" type="text">
                                                        <label for="company">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col s12 display-flex justify-content-end form-action">
                                                    <button type="submit" class="btn indigo  mr-2">
                                                    Save changes
                                                    </button>
                                                    <button type="button" class="btn btn-light-pink  mb-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="change-password" style="display: none;">
                                    <div class="card-panel">
                                        <div class="display-flex">
                                            <div class="media">
                                                <img src="../../../app-assets/images/avatar/avatar-12.png" class="border-radius-4" alt="profile image" height="64" width="64">
                                            </div>
                                            <div class="media-body">
                                                <div class="general-action-btn">
                                                    <button id="select-files" class="btn indigo mr-2">
                                                    <span>Change Password</span>
                                                    </button>
                                                    <button class="btn btn-light-pink">Reset</button>
                                                </div>
                                                <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                                <div class="upfilewrapper">
                                                    <input id="upfile" type="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider mb-1 mt-1"></div>
                                        <form class="formValidate" method="get" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="uname" class="active">Username</label>
                                                        <input type="text" id="uname" name="uname" value="hermione007" data-error=".errorTxt1">
                                                        <small class="errorTxt1"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="name" class="active">Name</label>
                                                        <input id="name" name="name" type="text" value="Hermione Granger" data-error=".errorTxt2">
                                                        <small class="errorTxt2"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="email" class="active">E-mail</label>
                                                        <input id="email" type="email" name="email" value="granger007@hogward.com" data-error=".errorTxt3">
                                                        <small class="errorTxt3"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="card-alert card orange lighten-5">
                                                        <div class="card-content orange-text">
                                                            <p>Your email is not confirmed. Please check your inbox.</p>
                                                            <a href="javascript: void(0);">Resend confirmation</a>
                                                        </div>
                                                        <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <input id="company" type="text">
                                                        <label for="company">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col s12 display-flex justify-content-end form-action">
                                                    <button type="submit" class="btn indigo  mr-2">
                                                    Save changes
                                                    </button>
                                                    <button type="button" class="btn btn-light-pink  mb-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="info" style="display: none;">
                                    <div class="card-panel">
                                        <div class="display-flex">
                                            <div class="media">
                                                <img src="../../../app-assets/images/avatar/avatar-12.png" class="border-radius-4" alt="profile image" height="64" width="64">
                                            </div>
                                            <div class="media-body">
                                                <div class="general-action-btn">
                                                    <button id="select-files" class="btn indigo mr-2">
                                                    <span>Information</span>
                                                    </button>
                                                    <button class="btn btn-light-pink">Reset</button>
                                                </div>
                                                <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                                <div class="upfilewrapper">
                                                    <input id="upfile" type="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider mb-1 mt-1"></div>
                                        <form class="formValidate" method="get" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="uname" class="active">Username</label>
                                                        <input type="text" id="uname" name="uname" value="hermione007" data-error=".errorTxt1">
                                                        <small class="errorTxt1"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="name" class="active">Name</label>
                                                        <input id="name" name="name" type="text" value="Hermione Granger" data-error=".errorTxt2">
                                                        <small class="errorTxt2"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <label for="email" class="active">E-mail</label>
                                                        <input id="email" type="email" name="email" value="granger007@hogward.com" data-error=".errorTxt3">
                                                        <small class="errorTxt3"></small>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="card-alert card orange lighten-5">
                                                        <div class="card-content orange-text">
                                                            <p>Your email is not confirmed. Please check your inbox.</p>
                                                            <a href="javascript: void(0);">Resend confirmation</a>
                                                        </div>
                                                        <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col s12">
                                                    <div class="input-field">
                                                        <input id="company" type="text">
                                                        <label for="company">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col s12 display-flex justify-content-end form-action">
                                                    <button type="submit" class="btn indigo  mr-2">
                                                    Save changes
                                                    </button>
                                                    <button type="button" class="btn btn-light-pink  mb-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->

@endsection

@push('js')

<script type="text/javascript" src="{{asset('app-assets/js/scripts/todo.js')}}"></script>
<script type="text/javascript">
    $(function() {
        var drEvent = $('.dropify-event').dropify();
    });
</script>
@if($user->role_id=="4")
<script type="text/javascript">
    $(function() {



    jQuery('#frm_filter').submit(function(e) {
        myShow();
        e.preventDefault();
        var redrawtable = jQuery('#product').dataTable();
        redrawtable.fnDraw();
        jQuery("#chkname").html("Search");
    });
    jQuery('#btn_reset').click(function() {
        myShow();
        jQuery('#frm_filter')[0].reset();
        var redrawtable = jQuery('#product').dataTable();
        redrawtable.fnDraw();
    });
    });


</script>
@endif
@endpush
