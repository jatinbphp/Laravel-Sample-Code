<html>
    <head>
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
            .right{
                width: 40%;
                float: right;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>Invoice# ~invoice_no~</td>
                <td class="text-right">
                    Date Issue: ~issue_date~ | Date Due: ~due_date~
                </td>
            </tr>
            <tr>
                <td class="invoice">
                    Activity Report
                </td>
                <td  class="text-right">
                    ~studio_logo~
                </td>
            </tr>
        </table>
        <hr>
        <table>
            <tr class="bold">
                <td>From</td>
                <td>To</td>
            </tr>
            <tr>
                <td>~company_from_name~</td>
                <td> ~company_to_name~ </td>
            </tr>
            <tr>
                <td>~company_from_address~</td>
                <td>~company_to_address~</td>
            </tr>
            <tr>
                <td>~company_from_email~</td>
                <td>~company_to_email~</td>
            </tr>
            <tr>
                <td>~company_from_phone_no~</td>
                <td>~company_to_phone_no~</td>
            </tr>
        </table>
        <hr>
        <table class="produse">
            <thead>
                <tr>
                    <td>Activity Name</td>
                    <td>Price Per Hour/Day</td>
                    <td>Working Hours</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <tr><td colspan="4" align="center">~activity_list~</td></tr>
            </tbody>
        </table>
        <hr>
        <div class="right">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>~currency~ ~sub_total~</td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td>- ~currency~ ~discount_value~ (-~discount_percentage~%)</td>
                </tr>
            </table>
            <hr>
            <table>
                <tr>
                    <td>Total</td>
                    <td>~currency~ ~total~</td>
                </tr>
            </table>
        </div>
    </body>
</html>
