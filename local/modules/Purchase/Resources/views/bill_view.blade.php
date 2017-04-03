@extends('layouts.layout')

@section('content')
<div class="container" style="">
    <div class="row">
        <div class="col-md-12 abc">
       
        <a href="{{url('purchase')}}">
            <button type='button' class='btn btn-primary pull-right'>View Bills</button>   
        </a>
         </div>
        @if(count($bills) > 0)
       
        <div class="col-md-12">
            <div class="col-md-3">
                <h5><b contenteditable='true'>{{$supplier->supplier_name}}</b></h5>
                <h5><b>New Baneshwor-10, Kathmandu</b></h5>
                <h5><b>Phone: 014469367</b></h5>
                <h5><b>Fax: 977-1-4469068</b></h5>
                <h5><b>Pan No: 302831731</b></h5>
            </div>
            <div class="col-md-6" style="margin-top:50px;text-align:center">
                <p>Schedule-3</p>

                <p>Relating to Sub-Regulation (1) of Regulation 16</p>
                <p>Information not to clients on execution of transaction</p>
            </div> 
        </div>
        <hr style="border:1px solid grey">
        <div class="col-md-12">
            
            <div class="col-md-3" ><p>&nbsp;&nbsp;&nbsp;&nbsp;Bill No:{{$supplier->bill_no}}</p></div>
            <div class="col-md-3" ><p>Bill Date:{{$supplier->bill_date}}</p></div>
            <div class="col-md-3"><p>Miti: {{$supplier->bill_miti}}</p></div>
            <div class="col-md-3"><p>Fiscal Year: 2072/2073</p></div>
            <div class="col-md-3">
                <p> &nbsp;&nbsp;&nbsp;&nbsp;Customer: <b>{{$supplier->customer_name}}</b></p>
            </div>
            <div class="col-md-3 col-md-offset-6">
                Customer: M. No 9841600464 T. No
            </div>
            <div class="col-md-12">
                <p>Nepse Code: {{$supplier->nepse_code}}</p> 
            </div>
            <div class="col-md-12">
                <p>As per your order dated <b>{{$supplier->bill_date}}</b> we have <b>{{$supplier->type}}</b> these undernoted stocks</p> 
            </div>

            <div class="col-md-12">

                {{csrf_field()}}
                <table class="table table-border" id="table1">
                    <thead>
                    <th>Transaction No</th>
                    <th>No of Shares</th>
                    <th>Company Name</th>
                    <th>Share Rate</th>
                    <th>Base Price</th>
                    <th>Amount</th>
                    <th>Commission</th>
                    <th>Commission Amount</th>
                    <th>Capital Gain</th>

                    </thead>

                    <tbody id="tbody">
                          @foreach($bills as $bill)
                        <tr>
                            <td>{{$bill->transaction_no}}</td>
                            <td>{{$bill->no_of_shares}}</td>
                            <td>{{$bill->company_name}}</td>
                            <td>{{$bill->share_rate}}</td>
                            @if($supplier->type=="Purchase")
                            <td></td>
                            @endif
                            @if($supplier->type=="Sales")
                            <td>{{$bill->base_price}}</td>
                            @endif
                            <td class="amount">{{$bill->amount}}</td>
                            <td>{{$bill->commission}}</td>
                            <td class="commission_amount">{{$bill->commission_amount}}</td>
                            @if($supplier->type=="Purchase")
                            <td></td>
                            @endif
                            @if($supplier->type=="Sales")
                            <td>{{$bill->capital_gain}}</td>
                            @endif
                            

                        </tr>

                   @endforeach
                    </tbody>

                </table>


            </div>

            <div class="col-md-12" id="calculagftion">
                <div class="col-md-5">
                    <div class="col-md-6" id="info">
                        <p>Share Amount:</p> 
                        <p>SEBO Commission:</p> 
                        <p>Commission Amount:</p> 
                        <p>Name Transfer Amount:</p> 
                        <p>DP Fee:</p> 
                        <p>Capital Gain Tax:</p> 
                        <p>Net Receivable Amount:</p> 
                        <p>Net Payable Amount:</p> 
                    </div>
                    <div class="col-md-4" id="info">
                        <p id="share_amount">0.00</p>
                        <p id="sebo_commission">0.00</p>
                        <p id="commission_amt">{{round($sum_com,2)}}</p>
                        <p id="name_transfer_amt">{{$supplier->name_transfer_amount}}</p>
                        <p id="dp_fee">{{$supplier->dp_fee}}</p>
                        <p id="capital_gain_tax">0.00</p>
                        <p id="net_receivable_amt">0.00</p>
                        <p id="net_payable_amt">0.00</p>
                    </div>
                </div>
                <div class="col-md-7" style="text-align:right">

                    <div class="col-lg-5 col-md-offset-3">
                        <p>
                            Date of clearance:07-APR-16
                        </p> 
                    </div>
                    <div class="col-lg-4">
                        <p>
                            Miti:2072-12-25
                        </p> 
                    </div>
                    <div class="col-lg-5 col-md-offset-3">
                        <p>
                            Transaction Date:{{$supplier->bill_date}}
                        </p> 
                    </div>
                    <div class="col-lg-4">
                        <p>
                            Miti: {{$supplier->bill_miti}}
                        </p> 
                    </div>

                    <div class="col-md-5 col-md-offset-7"><br/>
                        <hr style="border:1px solid lightgrey">
                        <p> (Authorized Signature)</p>
                        <p>{{$supplier->supplier_name}}</p>
                        <p>Broker Code No. 41</p>
                        <p>Nepal Stock Exchange </p>
                    </div>

                </div>
            </div>


        </div>
       
        @endif
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var cls = document.getElementById("table1").getElementsByTagName("td");
        var amount = 0;
        var commission = 0;
        for (var i = 0; i < cls.length; i++) {
            if (cls[i].className == "amount") {
                amount += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
                $("#share_amount").html(amount);
            }
            if (cls[i].className == "commission_amount") {
                commission += isNaN(cls[i].innerHTML) ? 0 : parseInt(cls[i].innerHTML);
                $("#commission_amt").html(commission);
            }
        }
      
    var shareamt=$("#share_amount").html();
    var sebo=shareamt * 0.0015;
    $("#sebo_commission").html(sebo);
    
    var commission_amt1=$("#commission_amt").html();
    var name_transfer_amt=$("#name_transfer_amt").html();
    var dp=$("#dp_fee").html();
   
   var receiveable=+shareamt + +sebo + +commission_amt1 + +name_transfer_amt + +dp;
   var payable=shareamt - sebo - commission_amt1 - name_transfer_amt - dp;
   var mode = '{{$supplier->type}}';
   if(mode=="Purchase"){
      
   $("#net_payable_amt").html("0.00");
   $("#net_receivable_amt").html(receiveable);
   }else{
        $("#net_payable_amt").html("0.00");
       $("#net_payable_amt").html(payable);
        }
    


    });


//
//
//    $("#tbody").on("keyup", '.no_of_shares', function () {
//        var vall = $(this).closest("tr").find("#no_of_shares").val();
//        var share_rate = $(this).closest("tr").find("#share_rate").val();
//        var commission_rate = $(this).closest("tr").find("#commission").val();
//        var amt = vall * share_rate;
//
//        $("#amount").val(amt);
//        var commission = amt * commission_rate / 100;
//
//        $("#commission_amt").val(commission);
//
//    });

</script>
@stop