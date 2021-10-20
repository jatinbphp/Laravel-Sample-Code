<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <style>
        @page { size: 21cm 29.7cm;  }

        body{
            font-family: 'Roboto';
                color: #6b6f82;
        }
        table{
            width: 100%;
        }
        tr{
            border:unset !important;
        }
        td{
            padding:0;
            padding-left:15px;
        }
        .invoice{
            font-size: 2.28rem;
            font-weight: 400;
            color: #3f51b5 !important;
            margin: 1.14rem 0 .912rem;
        }
        .text-right{
            text-align: right;
        }
        .bold{
            font-size: 16px;
            font-weight: 700;
            color: #6b6f82;
            padding: 0px 0 6px;
        }
        thead{
            font-weight: bold;
            text-transform: capitalize;
        }
        .produse tr{
            line-height: 40px;
            font-size: 14px;

        }
        .produse td{
            padding:0;
            padding-left: 15px;
        }
        .produse tr:nth-child(2n) {
            background-color: rgba(242,242,242,.5);
        }
        hr{
            border: 0px;

            border-bottom: 1px solid #979797;
            margin: 20px auto;
        }
        .dright{
            width: 40%;
            float: right;
        }

        .twidth {
            width: 50%;
        }
    </style>
    </head>
    <body>
        {!! $content !!}
        <form class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data" id="form-add-service-request" name="form-add-service-request">
            <div class="row">
                <div class="input-field col s12">
                    <div class="modal_button_center">
                        <button class="btn k-button-fill saveAcceptActivityReport" data-id="{{$activityReportId}}" type="button">
                            <i class="material-icons left">
                                assignment_turned_in
                            </i>
                            <span>
                                {{trans('message.accept')}} {{trans('message.activity')}} {{trans('message.report')}}
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
