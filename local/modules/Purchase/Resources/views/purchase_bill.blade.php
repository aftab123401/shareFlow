@extends('layouts.layout')

@section('content')
<div class="container" style="">
    <div class="row">
        <div class="col-md-12" style="margin-top: -60px">

            <a href="{{url('purchase')}}">
                <button type='button' class='btn btn-primary pull-right'>View Bills</button>   
            </a>
        </div>
        <div class="purchaseform">
            <form action="{{route('purchase.create')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                    <div class="col-md-3">
                        <h5>
                            <b> <input class="form-control input-sm" placeholder="Linch Stock Market Ltd" name="supplier_name" required/></b>
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
                    <div class="col-md-6" style="margin-top:50px;text-align:center">
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
                <hr style="border:1px solid grey">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-3" >
                            <div class="col-md-4">
                                Bill No:
                            </div>
                            <div class="col-md-8">
                                <input name="bill_no" class="form-control input-sm" placeholder="7273-12331" required/>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="col-md-4">
                                Bill Date:
                            </div>
                            <div class="col-md-8">
                                <input name="bill_date" placeholder="04-APR-16" class="form-control input-sm" id="englishDate">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="col-md-4">
                                Bill Miti:
                            </div>
                            <div class="col-md-8">
                                <input name="bill_miti" placeholder="04-Magh-16" class="form-control input-sm" id="nepaliDate" >  

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-4">
                                Fiscal Year:
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm" id="fiscal_year" value="--" readonly="readonly"></t>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="col-md-4">
                                Customer:  
                            </div>
                            <div class="col-md-8">

                                <input class="form-control input-sm customer" name="customer_name" placeholder="Customer Name"/>

                            </div>

                        </div>
                        <div class="col-md-3 col-md-offset-6">

                            Customer: M. No 9841600464 T. No
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-3">
                            Nepse Code:  
                        </div>
                        <div class="col-md-9 inputForNepseCode">
                            <input name="nepse_code" class="form-control input-sm nepse-code" placeholder="Nepse Code"/>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4 AsPerOrderDate">
                            As per your order dated 
                            <b class="orderdate">
                                Select date
                            </b>
                            we have 
                        </div>
                        <div class="col-md-2 selectTrasaction">
                            <b>
                                <select name="type" id="opt" class="form-control input-sm opt" style="width: 160px">
                                    <option value=""><b>Select mode of transaction </b></option>
                                    <option id="pur" value="Purchase">Purchase</option>
                                    <option id="sales" value="Sales">Sales</option>
                                </select>

                            </b>
                        </div>
                        <div class="col-md-3">
                            &nbsp; these undernoted stocks
                        </div>



                    </div>

                    <div class="col-md-12">


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
                            <th>
                                <span class="addTr">
                                    <i class="fa fa-plus"></i>
                                </span>
                            </th>
                            </thead>

                            <tbody class="tbody">

                            </tbody>

                        </table>

                        <button type="submit" id="" class="btn btn-success subBtn">
                            Submit
                        </button>        
                    </div>

                    <div class="col-md-12" id="calculation">
                        <div class="col-md-5">
                            <div class="col-md-6" id="info">
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
                            <div class="col-md-4" id="info">
                                <p id="share_amount">0.00</p>
                                <p id="sebo_commission">0.00</p>
                                <p id="commission_amt1">0.00</p>
                                <p id=""><input name="name_transfer_amount" class="form-control input-sm name_transfer_amount" placeholder="0.00" id="name_transfer_amount"/></p>
                                <p id=""><input name="dp_fee" class="form-control input-sm dp_fee" placeholder="0.00" id="dp_fee"/></p>
                                <p id="capital_gain_tax">0.00</p>
                                <p id="net_receivable_amt">0.00</p>
                                <p id="net_payable_amt">0.00</p>
                            </div>
                        </div>
                        <div class="col-md-7" style="text-align:right">

                            <div class="col-lg-5 col-md-offset-2">
                                 <div class="col-md-8">
                                    Date of clearance:
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" id="clearance_date" value="2017-12-12" readonly="readonly"></t>
                                </div>
                                                              
                                
                            </div>
                            <div class="col-lg-5">
                                 <div class="col-md-8">
                                    Miti:
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" id="clearance_miti" value="2072-12-12" readonly="readonly"></t>
                                </div>
                               
                            </div>
                            <div class="col-lg-5 col-md-offset-2">
                                
                                <div class="col-md-8">
                                    Transaction Date:
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" id="transaction_date" readonly="readonly"></t>
                                </div>
                            </div>
                            <div class="col-lg-5">
                               <div class="col-md-8">
                                  Miti:
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" id="transaction_miti" readonly="readonly"></t>
                                </div>
                            </div>

                            <div class="col-md-5 col-md-offset-7"><br/>
                                <hr style="border:1px solid lightgrey">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.js"></script>
<script type="text/javascript" src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
<script type="text/javascript">

</script>
@stop