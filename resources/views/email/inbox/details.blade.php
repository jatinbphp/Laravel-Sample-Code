<div class="app-email-content email-detail-info">
    <div class="content-area content-right">
        <div class="app-wrapper">
            <div class="fixed-width">
                <div class="card-content pt-0">
                    <!-- Email Header -->
                    <div class="email-header">
                        <div class="subject">
                            <div class="back-to-mails">
                                <a class="emailList" data-type="{{strtolower($type)}}" href="#">
                                    <i class="material-icons">
                                    arrow_back
                                    </i>
                                </a>
                            </div>
                            <div class="email-title">
                                {{$email['subject']}}
                            </div>
                        </div>
                        <div class="header-action">
                            <div class="favorite">
                                <i class="material-icons">
                                star_border
                                </i>
                            </div>
                            <div class="email-label">
                                <i class="material-icons">
                                label_outline
                                </i>
                            </div>
                        </div>
                    </div>
                    <!-- Email Header Ends -->
                    <!-- Email Content -->
                    <div class="email-content">
                        <div class="list-title-area">
                            <div class="user-media">
                                <img alt="" class="circle z-depth-2 responsive-img avtar" src="{{ asset('app-assets/images/user/9.jpg')}}">
                                <div class="list-title">
                                    <span class="name">
                                        {{$email['from']}}
                                    </span>
                                    <span class="to-person">
                                        to me
                                    </span>
                                </div>
                            </div>
                            <div class="title-right">
                                <span class="mail-time">
                                    {{$email['date']}} ({{$email['time_string']}})
                                </span>
                                <i class="material-icons">
                                reply
                                </i>
                                <i class="material-icons">
                                more_vert
                                </i>
                            </div>
                        </div>
                        <div class="email-desc">
                            {!! $email['content'] !!}
                        </div>
                    </div>
                    <!-- Email Content Ends -->
                    @if(count($email["attachment"]) > 0)
                    <!-- Email Footer -->
                    <div class="email-footer">
                        <h6 class="footer-title"> ({{count($email["attachment"])}})</h6>
                        <div class="footer-action">
                            <div class="attachment-list">
                                @foreach($email["attachment"] as $key => $img)
                                <div class="attachment">
                                    <img src='{{$img}}' alt="" class="responsive-img attached-image">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Email Footer Ends -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
