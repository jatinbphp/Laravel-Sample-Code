@extends($layoutTheme)

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">

<style type="text/css">
        .pos-btn {
            position: fixed;
            bottom: 45px;
            right: 20px;
            z-index: 9;
            width: fit-content;
            width: -webkit-fit-content;
            width: -moz-fit-content;
            width: -ms-fit-content;
            width: -o-fit-content;
            height: fit-content;
            height: -webkit-fit-content;
            height: -moz-fit-content;
            height: -ms-fit-content;
            height: -o-fit-content;
        }
        .pos-btn a.btn-pos {
            display: inline-block;
            width: auto;
            height: 48px;
            line-height: 48px;
            padding: 0px 16px;
            text-align: center;
            background-color: rgb(79, 59, 170);
            color: #fff;
            font-size: 18px;
            border-radius: 5px;
            box-shadow: 0px 3px 8.46px 0.54px rgb(0 0 0 / 24%);
            text-transform: unset;
        }
        .police-cnt-main {
            width: 98%;
            height: 600px;
            margin: 20px auto;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            flex-flow: column;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 5px 9px 1px rgb(0 0 0 / 10%);
            overflow-y: scroll;
        }
        /*#main.police-height-for {
            min-height: auto;
        }*/
        footer.pos-fix {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .police-align-center {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            flex-flow: column;
            align-items: center;
            justify-content: center;
            padding-bottom: 51px;
        }

        .k-input-text {
            width: 100%;
            /*border: 1px solid #ccc;*/
            border-radius: 5px;
            background-color: #fff;
            /*box-shadow: 0 5px 9px 1px rgb(0 0 0 / 10%);*/
        }
    </style>

@endpush

@section('content')

<div class="row pos-r">
    <div class="col s12">
        <div class="container">
            <section class="tabs-vertical mt-0 section">
                <div class="row">
                    <div class="col left-content-panel pl-0">
                        <!-- tabs  -->
                        <div class="card-panel custom-panel">
                            <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
                                <ul class="leftTab sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out2" data-menu="menu-navigation" data-collapsible="menu-accordion">
                                    <li class="tab bold mainTab">
                                        <a href="#first" class="collapsible-header filterBar active">
                                            <i class="material-icons">person</i>
                                            <span>{{trans('message.profile')}}</span>
                                        </a>
                                    </li>
                                    <li class="indicator" style="left: 0px; right: 0px;">
                                    </li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                    <div class="col right-content-block">
                        <div id="first">
                            @include('profile.list',['op' => 'first'])
                            <div id="profile-tab">
                                <div class="content">
                                    @include("profile.profile")
                                </div>
                            </div>

                            @if(Session::has('impersonate'))
                                <div id="profile-permission-tab">
                                    <div class="content">
                                        @include("profile.permission")
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('js/signature_pad.min.js')}}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript">
    $(".filterNewData.filterdate-block").mCustomScrollbar({
        axis: "x",
        theme: "light-3",
        advanced: {
            autoExpandHorizontalScroll: true
        },
    });

    $(function() {
        var drEvent = $('.dropify-event').dropify();
        $.ajax({
            url: publicPath + "user/card-id",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                myShow();
            },
            complete: function() {
                myHide();
            },
            success: function(response) {
                if (response.success && response.card_id != "") {
                    let input    = $('input[name="card"]');
                    let wrapper  = input.closest('.dropify-wrapper');
                    let preview  = wrapper.find('.dropify-preview');
                    let filename = wrapper.find('.dropify-filename-inner');
                    let render   = wrapper.find('.dropify-render').html('');

                    input.val('').attr('title', 'Image.jpg');
                    wrapper.removeClass('has-error').addClass('has-preview');
                    filename.html('Image.jpg');

                    render.append($('<img />').attr('src', response.card_id).css('max-height', input.data('height') || ''));
                    preview.fadeIn();
                }
            },
        });

        $(document).on("click", ".profileFirstTabSave", function(e) {
            e.preventDefault();
            localStorage.setItem('profileActiveHref', $(this).attr('href'));
            localStorage.setItem('profileActiveTab', "#" + $(this).data('name'));
        });
        var profileActiveHref = localStorage.getItem('profileActiveHref');
        var profileActiveTab = localStorage.getItem('profileActiveTab');
        if (profileActiveHref != null && profileActiveTab != null) {
            $(".leftTab").tabs("select", profileActiveTab.replace("#", ""));
            $(".profileTab").tabs("select", profileActiveHref.replace("#", ""));
            $(".profileTab").find("a[href='" + profileActiveHref + "']").find(".filterBar").trigger("click");
                setTimeout(function() {
            }, 200);
        } else {
            localStorage.setItem('profileActiveHref', "#profile-tab");
            localStorage.setItem('profileActiveTab', "#first");
        }
    });

    var canvas = document.querySelector("canvas");
    var signaturePad = new SignaturePad(canvas);
    signaturePad.fromDataURL("{{ auth()->user()->signature}}");

    signaturePad.penColor = "rgb(0, 0, 255)";
    var saveSignature = document.getElementById('btnUserSignature');
    var clearSignature = document.getElementById("clearSignature");
    clearSignature.addEventListener('click', function(e) {
        signaturePad.clear();
    });
    saveSignature.addEventListener('click', function(e) {
        e.preventDefault();
        var img = signaturePad.toDataURL('image/png');
        $.ajax({
            url: publicPath + "user/signature",
            type: 'post',
            data: {
                'signature':img,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                myShow();
            },
            complete: function() {
                myHide();
            },
            error: function(response) {
                if (response.status == 400) {
                    $.each(response.responseJSON.errors, function(k, v) {
                        $('#' + k + '_error').text(v);
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    M.toast({
                        html: response.message
                    });
                }
            },
        });
    });

    $(document).on('change', '.permissionModule', function() {
        var sts = false;
        if ($(this).is(':checked')) {
            sts = true;
        }
        $('.permissionList').find(".permission_" + $(this).data("id")).prop('checked', sts);
    });
    $(document).on('click', '.permissionCheck', function() {
        var parentId = $(this).parents(".permissionList").data("id");
        var sts = false;
        if (!$(this).is(':checked')) {
            sts = false;
        }
        if ($(this).is(':checked') && $(this).parents(".permissionList").find(".permissionCheck").length == $(this).parents(".permissionList").find(".permissionCheck:checked").length) {
            sts = true;
        }
        $(".module_" + parentId).prop('checked',sts);
    });
</script>
@endpush
