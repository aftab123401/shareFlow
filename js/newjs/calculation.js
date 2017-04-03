$(document).ready(function () {

    var dat = "Please select date";
    var orderdate = "Please select date";

    $(".opt").on("change", function () {
        var mode = $(this).val();

        if (mode == "Purchase") {
            $(".base_price").attr('readonly', 'readonly');
        } else {
            $(".base_price").removeAttr('readonly');
        }
    });

    $("#calculation").hide();

    $(".subBtn").hide();

    $(".addTr").on("click", function () {
        $("#calculation").show();

        event.preventDefault();
        $(".subBtn").show();

        $(".tbody").append("<tr  class='abc' >\n\
                           <td ><input name='transaction_no[]' value='" + dat + "' class='form-control input-sm transaction_no'/></td>\n\
                           <td class='no_of_shares'><input type='number' name='no_of_shares[]' class='form-control input-sm' id='no_of_shares' required='true'/></td>\n\
                           <td id='company_name' ><input name='company_name[]' id='company' class='form-control input-sm' required/></td>\n\
                           <td ><input name='share_rate[]' id='share_rate' class='form-control input-sm' required/></td>\n\
                           <td ><input name='base_price[]' id='base_price' class='form-control input-sm base_price'x/></td>\n\
                           <td ><input name='amount[]' id='amount' class='form-control input-sm' readonly/></td>\n\
                           <td ><input name='commission[]' id='commission' class='form-control input-sm' required/></td>\n\
                           <td  ><input name='commission_amount[]' id='commission_amt' class='form-control input-sm' type='text' readonly/></td>\n\</td>\n\
                           <td  ><input name='capital_gain[]' id='capital_gain' class='form-control input-sm' /></td>\n\</td>\n\
                           <td  ><button class='btnclose' id=''><i class='fa fa-minus'></i></button></td>\n\
                           </tr>");
        var mode = $('#opt').val();
        $(".base_price").attr('readonly', 'readonly');
        if (mode == "Purchase" || mode == "") {
            $(".base_price").attr('readonly', 'readonly');
        } else {
            $(".base_price").removeAttr('readonly');
        }

    });

//on share change
    var amt1 = 0;
    $(".tbody").on("change", "#share_rate,#no_of_shares", function () {

        var share_rate = $(this).closest("tr").find("#share_rate").val();
        var vall = $(this).closest("tr").find("#no_of_shares").val();
        var amt = vall * share_rate;
        amt1 = +amt + +amt1;

        $(this).closest("tr").find("#amount").val(amt);
        $("#share_amount").html(amt1);
    });

    //on commission change
    var commissions1 = 0;
    $(".tbody").on("change", "#commission,#share_rate", function () {

        var amt = $(this).closest("tr").find("#amount").val();

        var commission_rate = $(this).closest("tr").find("#commission").val();
        var commiss = amt * commission_rate / 100;
        var commission = commiss.toFixed(2);
        commissions1 = +commission + +commissions1;
        var comsn = commissions1.toFixed(2);
        //alert(commissions1)
        $(this).closest("tr").find("#commission_amt").val(commission);
        $("#commission_amt1").html(comsn);

    });


    $(".tbody").on("click", '.btnclose', function () {

        $(this).closest('tr').remove();
    });

    //for capital gain
    var mode = $('#opt').val();
    $(".tbody").on("change", "#base_price,#share_rate,#no_of_shares", function () {
        var base_price = $(this).closest("tr").find("#base_price").val();
        var share_rate = $(this).closest("tr").find("#share_rate").val();
        var no_of_shares = $(this).closest("tr").find("#no_of_shares").val();
        var difference = share_rate - base_price;

        var mode = $(".opt").val();
        if (mode == "Purchase") {
            
        } else {
            if (base_price > 0 && difference > 0) {
            var capital_gain = difference * no_of_shares;
            $(this).closest("tr").find("#capital_gain").val(capital_gain);
        } else {
            $(this).closest("tr").find("#capital_gain").val("");
        }
        }


        
    });

//for english-nepali date
    $("#englishDate").datepicker({
        format: 'yyyy-mm-dd',
        'cursor': 'pointer',
        'setDate': 0

    }).on('changeDate', function (e) {

        $(this).datepicker('hide');

    });


    $('#nepaliDate').nepaliDatePicker({
        npdMonth: true,
        npdYear: true,
        npdYearCount: 10,
        ndpEnglishInput: 'englishDate',
        onChange: function () {
            var ed = $("#englishDate").val();
            dat = moment(ed).format("YYYYMMDD");
            var nmonth = $("#nepaliDate").val();
            var month = moment(nmonth).format("M");
            var year = moment(nmonth).format("Y");
            if (month < 4) {
                $("#fiscal_year").val(year - 1 + "/" + year);
            } else {
                var next_year = +year + +1;
                $("#fiscal_year").val(year + "/" + next_year);
            }
            orderdate = moment(ed).format("YYYY-MM-DD");
            $(".orderdate").html(orderdate);
            $("#transaction_date").val(orderdate);
            $(".transaction_no").val(dat);
            $("#transaction_miti").val(nmonth);
        }
    });
    $('#englishDate').change(function () {
        $('#nepaliDate').val(AD2BS($('#englishDate').val()));
        var date = $("#englishDate").val();
        dat = moment(date).format("YYYYMMDD");
        orderdate = moment(date).format("YYYY-MM-DD");
        $("#transaction_date").val(orderdate);
        var nmonth = $("#nepaliDate").val();
        var month = moment(nmonth).format("M");
        var year = moment(nmonth).format("Y");
        if (month < 4) {
            $("#fiscal_year").val(year - 1 + "/" + year);
        } else {
            var next_year = +year + +1;
            $("#fiscal_year").val(year + "/" + next_year);
        }
        $("#transaction_miti").val(nmonth);
        $(".orderdate").html(orderdate);
        $(".transaction_no").val(dat);

    });

    //for receivable amount
    $("#dp_fee").on("change", function () {
        var shareamt = $("#share_amount").html();
        var sebo = shareamt * 0.0015;
        $("#sebo_commission").html(sebo);
        var commission_amt1 = $("#commission_amt1").html();
        var name_transfer_amt = $("#name_transfer_amount").val();
        var dp = $(this).val();

        var receiveable = +shareamt + +sebo + +commission_amt1 + +name_transfer_amt + +dp;
        var payable = shareamt - sebo - commission_amt1 - name_transfer_amt - dp;
        var mode = $('#opt').val();
        if (mode == "Purchase") {
            $("#net_payable_amt").html("0.00");
            $("#net_receivable_amt").html(receiveable);
        } else {
            $("#net_payable_amt").html("0.00");
            $("#net_payable_amt").html(payable);
        }
    });

});