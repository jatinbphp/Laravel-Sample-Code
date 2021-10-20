@extends('layouts.app')
@section('content')
<div class="section">
    <div class="row">
        <div class="col s12">
            <div class="container">

                <div class="content-area content-right">
                    <div class="app-wrapper">
                        <a href='{{route("contract.download",$contract->id)}}' class="download-btn_block">
                            <span>
                                <i class="material-icons">cloud_download</i>
                            </span>
                            Download
                        </a>
                        {!! $contract->contract->contract !!}

                        <div class="signature-box">
                            <div class="signature-box-inner">

                                <form id="form-user-signature" name="form-user-signature" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="file" id="input-file-photo" class="dropify-event userSignature"
                                    data-default-file='{{$contract->user_contract_document}}'/>
                                </form>
                                <p>Authorizied Signature</p>
                            </div>
                        </div>
                        <!-- <div class="col s12" id="user-contract">
                            <div class="col s12 m4 l4">
                                <div class="row">
                                    <div class="card card card-default scrollspy" id="prefixes">
                                        <div class="card-content">
                                            <h4 class="card-title">
                                            <i class="material-icons prefix">
                                            image
                                            </i>{{trans('message.signature')}}
                                            </h4>
                                            <hr>

                                            <form id="form-user-signature" name="form-user-signature" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input type="file" id="input-file-photo" class="dropify-event userSignature"
                                                data-default-file='{{$contract->user_contract_document}}'/>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect btnSignatureSave waves-light right" name="action" type="submit" data-id="{{$contract->id}}">
                                                        Submit
                                                        <i class="material-icons right">
                                                        send
                                                        </i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Used events
        var drEvent = $('.dropify-event').dropify();
    });
</script>
@endsection
