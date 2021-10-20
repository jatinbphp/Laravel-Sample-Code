@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush

@section('filter')
  @include("layouts.common.filter",['closeCls' => 'closeUserFeedFilter','type' => 'userfeed','cls' => 'cronologieTab','clear' => 'clearUserFeedFilter'])
@endsection

@section('content')

<div class="row">
    <div class="col s12">
        <div class="container">
            <section class="tabs-vertical mt-0 section">
                <div class="row">
                    <input type="hidden" id="secretUserId" value="{{$user->id}}" />
                    <input type="hidden" id="secretId" value="{{$secretId}}" />
                    <div class="col left-content-panel">
                        <!-- tabs  -->
                        <div class="card-panel custom-panel">
                            <ul class="tabs">
                                <li class="tab" class="active">
                                    <a href="#cronologie-tab"  class="active filterBar cronologieTab" data-filter='userfeed' data-close="closeUserfeedFilter" data-cls="cronologieTab">
                                    <i class="material-icons">reorder</i>
                                    <span>{{trans('message.newsfeed')}}</span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#profile" class="filterBar profileTab">
                                    <i class="material-icons">person</i>
                                    <span>{{trans('message.setting')}}</span>
                                    </a>
                                </li>

                                @if($user->role_id == "4")
                                    <li class="tab">
                                        <a href="#userfeed-income-range"  class="filterBar incomeRangeTab" data-filter='userfeed_income_range' data-close="closeModelPaymentFilter" data-cls="incomeRangeTab">
                                        <i class="material-icons">payment</i>
                                        <span>{{trans('message.income')}} {{trans('message.range')}}  </span>
                                        </a>
                                    </li>
                                @endif

                                <li class="tab">
                                    <a href="#userfeed-payment-list"  class="filterBar userfeedPaymentTab" data-filter='userfeed_payment' data-close="closeUserfeedPaymentFilter" data-cls="userfeedPaymentTab">
                                    <i class="material-icons">payment</i>
                                    <span>{{trans('message.money')}}  </span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#userfeed-salary-loan-list" class="filterBar userfeedSalaryLoanTab" data-filter="userfeed_salary_loan" data-close="closeuserFeedSalaryLoanFilter" data-cls="userfeedSalaryLoanTab">
                                    <i class="material-icons">account_balance_wallet</i>
                                    <span>{{trans('message.salary')}} {{trans('message.loan')}}</span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#communication"  class="filterBar communicationTab" data-cls="communicationTab">
                                    <i class="material-icons">voice_chat</i>
                                    <span>{{trans('message.communication')}}  </span>
                                    </a>
                                </li>

                                <!-- <li class="tab">
                                    <a href="#custom-info"  class="filterBar">
                                    <i class="material-icons">assignment</i>
                                    <span>{{trans('message.custom_info')}}  </span>
                                    </a>
                                </li> -->

                                @if($user->role_id == "4")
                                    <li class="tab">
                                        <a href="#account_sites-info"  class="filterBar videoSiteTab" data-filter='userfeed_account_site' data-close="clearVideoSiteFilter" data-cls="videoSiteTab">
                                        <i class="material-icons">blur_linear</i>
                                        <span>{{trans('message.account_sites')}}  </span>
                                        </a>
                                    </li>
                                @endif

                                <li class="tab">
                                    <a href="#interview-info"  class="filterBar">
                                    <i class="material-icons">assignment</i>
                                    <span>{{trans('message.interview')}}  {{trans('message.info')}}</span>
                                    </a>
                                </li>

                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right-content-block">


                        <!--Tab 1 -->
                            @include("userfeed.cronologie")
                        <!--Tab 1 -->

                        <!--Tab 2 -->
                            @include("userfeed.profile")
                        <!-- Tab 2 -->

                        <div id="userfeed-income-range" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header modelPayment">
                                        <h4 class="k-h4">{{trans('message.payment')}} {{trans('message.income')}} {{trans('message.range')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("userfeed.model_payment.index")
                                </div>
                            </div>
                        </div>

                        <div id="userfeed-payment-list" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header userfeedPayment">
                                        <h4 class="k-h4">{{trans('message.payment')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("userfeed.payment.index")
                                </div>
                            </div>
                        </div>

                        <div id="userfeed-salary-loan-list" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header userFeedSalaryLoan">
                                        <h4 class="k-h4">
                                            {{trans('message.salary')}} {{trans('message.loan')}}
                                        </h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("userfeed.loan.index")
                                </div>
                            </div>
                        </div>

                        <div id="custom-info" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header">
                                        <h4 class="k-h4">{{trans('message.custom_info')}}</h4>
                                    </div>
                                    @include("userfeed.custome_info")
                                </div>
                            </div>
                        </div>

                        <div id="communication" style="display: none;">
                            <div class="content">
                                @include("userfeed.email.index")
                            </div>
                        </div>

                        <div id="account_sites-info" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header">
                                        <h4 class="k-h4">{{trans('message.account_sites')}}</h4>
                                    </div>
                                    <div class="col s12">
                                        <div class="post-wrapper  gallery-widget accounts-widget">
                                            <div class="accounts">
                                                <div class="show_accounts videoSiteData">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="interview-info" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header">
                                        <h4 class="k-h4">{{trans('message.interview')}} {{trans('message.info')}}</h4>
                                    </div>
                                    <div class="col s12">
                                        <div class="post-wrapper gallery-widget accounts-widget">
                                            <div class="accounts">
                                                <div class="show_accounts">
                                                    @include("userfeed.interview_info")
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<form id="userfeed-filter" name="userfeed-filter">
    <input type="hidden" name="staff_member" id="staff_member" class="resetUserFeed staffMember">
    <input type="hidden" name="staff_type" id="staff_type" class="resetUserFeed staffType">
    <input type="hidden" name="model_name" id="model_name" class="resetUserFeed modelName">
    <input type="hidden" name="post_type" id="post_type" class="resetUserFeed postType">
    <input type="hidden" name="date_filter" id="date_filter" class="resetUserFeed dateNewsFeedFilter">
</form>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css')}}">
@endpush

@push('js')
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/quill/quill.min.js')}}"></script>
<script type="text/javascript">
    $(".filterNewData.filterdate-block").mCustomScrollbar({
        axis: "x",
        theme: "light-3",
        advanced: {
            autoExpandHorizontalScroll: true
        },
    });

    var composeMailEditor = new Quill('.compose-editor', {
        modules: {
            toolbar: ".compose-quill-toolbar"
        },
        placeholder: "Write a Comment... ",
        theme: "snow"
    });
</script>
<script src="{{ asset('js/feed.js')}}"></script>
<script src="{{ asset('js/userfeed/userfeed.js')}}"></script>
<script src="{{ asset('js/userfeed/video-site.js')}}"></script>
<script src="{{ asset('js/userfeed/model_payment.js')}}"></script>
<script src="{{ asset('js/userfeed/payment.js')}}"></script>
<script src="{{ asset('js/userfeed/salary_loan.js')}}"></script>
@endpush
