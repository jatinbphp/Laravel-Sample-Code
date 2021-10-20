<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
</body>
<script type="text/javascript">
 window.onafterprint = window.close;
 window.print();
</script>
</html>
