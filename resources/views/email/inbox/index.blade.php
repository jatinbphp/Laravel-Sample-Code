<div class="app-email emailDetails">
    <div class="content-area content-right">
        <div class="app-wrapper">
            <div class="fixed-width">
                <div class="card-content p-0 pb-2">
                    <div class="email-header">
                        <div class="left-icons">
                            <span class="header-checkbox">
                                <label>
                                    <input onclick="emailToggle(this)" type="checkbox" class="headEmailCheck" />
                                    <span>
                                    </span>
                                </label>
                            </span>
                            <span class="action-list-icons">
                                <i class="material-icons refreshEmailTab" data-type="{{$type}}">refresh</i>
                                <i class="material-icons delete-mails deleteEmailTab" data-type="{{$type}}">delete_sweep</i>
                            </span>
                        </div>
                        <div class="list-content"></div>
                        <div class="email-action">
                            <div class="pagination-block">
                                <h6>
                                @if(count($emails) > 0)
                                1-{{count($emails)}} of {{count($emails)}}
                                @endif
                                </h6>
                                <span class="email-options"><i class="material-icons">chevron_left</i></span>
                                <span class="email-options"><i class="material-icons">chevron_right</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="collection email-collection emailFilter">
                        @include("email.inbox.filter",['emails' => $emails])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="send-mail-modal" class="modalx bottom-sheet modal-custom hidden">
    <div class="modal-header">
        <h4>{{trans('message.send')}} {{trans('message.mail')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-send-mail-modal">
                <img src="{{asset('img/icon-close.png')}}" alt="" />
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>
