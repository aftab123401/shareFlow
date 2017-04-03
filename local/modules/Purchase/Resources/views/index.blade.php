@extends('layouts.layout')

@section('content')
<div class="container" style="">
    <div class="row">
        <div class="col-md-12" style="margin-top: -60px;">
            <div class="col-md-8">

            </div>  
            <div class="col-md-4">
                <a href="{{url('purchase/addbill')}}">
                    <button type='button' class='btn btn-primary pull-right'><i class="fa fa-plus"></i> Add Bill</button>  
                </a> 
            </div>

        </div>

        <div class="col-md-12 " id="maincont">
            <h1 class="text-success"><center>Timeline</center></h1>
            <section id="cd-timeline" class="cd-container" >
                @if(count($bills)>0)

                @foreach($bills as $bill)
                
                <div class="cd-timeline-block wrapper">
                    <div class="cd-timeline-img cd-picture">
                        {{date('M d', strtotime($bill->bill_date))}}
                       
                    </div> <!-- cd-timeline-img -->
                    <a href="#" class="bill_id" id="{{$bill->id}}">
                        <div class="col-md-12 cd-timeline-content ">

                        <div class="fillForm" id="includedContent">
                            <div class="insidefit">
                                <div class="container mainContainer" style="">
                                    <div class="row rowpercent">
                                        <div class="purchaseform">
                                            <form action="" method="post">
                                                <div class="col-md-12 col-sm-12 col-xs-12 pForm">
                                                    <div class="col-md-3 col-sm-1 col-xs-1">
                                                        <h5>
                                                            <div class=""><span class="fruit">{{ucfirst($bill->supplier_name)}}</span></div>
                                                        </h5>
                                                        <h5>
                                                            <b>
                                                                New Baneshwor-10, Kathmandu
                                                            </b>
                                                        </h5>
                                                        <h5>
                                                            <b>
                                                                Phone: 014469367
                                                            </b>
                                                        </h5>
                                                        <h5>
                                                            <b>
                                                                Fax: 977-1-4469068
                                                            </b>
                                                        </h5> 
                                                        <h5>
                                                            <b>
                                                                Pan No: 302831731
                                                            </b>
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-6" style="text-align:center">
                                                        <p>
                                                            Schedule-3
                                                        </p>
                                                        <p>
                                                            Relating to Sub-Regulation (1) of Regulation 16
                                                        </p>
                                                        <p>
                                                            Information not to clients on execution of transaction
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 smallfont">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    Bill No:
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    {{$bill->bill_no}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    Bill Date:
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    {{$bill->bill_date}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    Bill Miti:
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    {{$bill->bill_miti}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    Fiscal Year:
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    --
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 AsPerOrderDate">
                                                            As per your order dated
                                                            <b class="orderdate">
                                                                {{$bill->bill_date}}
                                                            </b>
                                                            we have
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-2 selectTrasaction">
                                                            <b>{{$bill->type}}</b>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                            &nbsp; these undernoted stocks
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row rowpercent">
                                                            <table class="table table-border smalltable" id="table1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Transaction No</th>
                                                                        <th>No of Shares</th>
                                                                        <th>Company Name</th>
                                                                        <th>Share Rate</th>
                                                                        <th>Base Price</th>
                                                                        <th>Amount</th>
                                                                        <th>Commission</th>
                                                                        <th>Commission Amount</th>
                                                                        <th>Capital Gain</th>
                                                                        <th>
                                                                            +
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="tbody">
                                                                    <tr>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                        <td> No</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12" id="calculation">
                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                            <div class="col-md-6 col-sm-6 col-xs-6" id="info">
                                                                <p>
                                                                    Share Amount:
                                                                </p>
                                                                <p>
                                                                    SEBO Commission:
                                                                </p>
                                                                <p>
                                                                    Commission Amount:
                                                                </p>
                                                                <p>
                                                                    Name Transfer Amount:
                                                                </p>
                                                                <p>
                                                                    DP Fee:
                                                                </p>
                                                                <p>
                                                                    Capital Gain Tax:
                                                                </p>
                                                                <p>
                                                                    Net Receivable Amount:
                                                                </p>
                                                                <p>
                                                                    Net Payable Amount:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-xs-4" id="info">
                                                                <p id="share_amount">0.00</p>
                                                                <p id="sebo_commission">0.00</p>
                                                                <p id="commission_amt1">0.00</p>
                                                                <p id="">0.00</p>
                                                                <p id="">0.00</p>
                                                                <p id="capital_gain_tax">0.00</p>
                                                                <p id="net_receivable_amt">0.00</p>
                                                                <p id="net_payable_amt">0.00</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7" style="text-align:right">
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-md-offset-2">
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    Date of clearance:
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    2017
                                                                </div>


                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    Miti:
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    2017
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-md-offset-2">

                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    Transaction Date:
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    --
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                                    Miti:
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                                    --
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 col-md-offset-7">
                                                                <p>
                                                                    (Authorized Signature)
                                                                </p>
                                                                <p>
                                                                    Linch Stock Market Ltd.
                                                                </p>
                                                                <p>
                                                                    Broker Code No. 41
                                                                </p>
                                                                <p>
                                                                    Nepal Stock Exchange
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- cd-timeline-content -->
                    </a>
                    
                </div> <!-- cd-timeline-block -->
                @endforeach
                @endif


            </section> <!-- cd-timeline -->
            <div class="ab"></div>
        </div>
    </div>
</div>
<style>
    .mainContainer { width: 100%; padding: 0px; font-size: 4px; } 
</style>
<script type="text/javascript">
    var $rows = $('.wrapper');
    var rowsTextArray = [];

    var i = 0;
    $.each($rows, function () {
        rowsTextArray[i] = $(this).find('.fruit').text().replace(/\s+/g, ' ').toLowerCase();
        i++;
    });

    $('#search').keyup(function () {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        $rows.show().filter(function (index) {
            return (rowsTextArray[index].indexOf(val) === -1);
        }).hide();
    });
    var url='{{route("purchase.test")}}';
    $(".bill_id").on("click",function(){
        $('.ab').load('{{route("purchase.test")}}');
    });
</script>
@stop


