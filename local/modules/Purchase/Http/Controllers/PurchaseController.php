<?php

namespace Modules\Purchase\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Input;
use DB;
use App\Purchase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Factory;
use App\Bills;
use App\Customer;
use Carbon;
use ZipArchive;
use Zipper;

class PurchaseController extends Controller {

    public function index() {
//        $data = array();
//        $data['i'] = 1;
//        $data['bills'] = DB::table('bills')->select('*')->get();
//
//        $data['current_nav'] = 'purchase';
//        return view('purchase::index', $data);

        $data = array();
        $data['current_nav'] = 'purchase';
        $data['bills'] = DB::table('bills as B')
                ->select('B.*')
                ->orderBy('B.bill_date', 'desc')
                ->get();
        $data['sum'] = '';
         $input=Input::get('q');
        
        $data['query']=DB::table('purchase')->where('company_name','LIKE','%'.$input.'%')->get();
        
        foreach ($data['bills'] as $bil) {
            $id = $bil->id;

            $data['sum'] = DB::table('purchase')
                    ->where('bill_id', $id)
                    ->sum('amount');
        }
        return view('purchase::index', $data);
    }

    public function addbill() {
        $data = array();
        $data['date'] = str_replace('-', '', date('Y-m-d'));
        $data['current_nav'] = 'purchase';
        return view('purchase::purchase_bill', $data);
    }

    public function create() {
        $validation = Validator::make(Input::all(), [
                    'transaction_no' => 'required',
                    'no_of_shares' => 'required',
                    'company_name' => 'required',
                    'commission' => 'required',
                    'share_rate' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect('purchase/create')->withInput()->withErrors($validation);
        } else {

            $tran = Input::get('transaction_no');
            $customer = [
            ];
            Customer::insert($customer);

            $bill = [
                'supplier_name' => Input::get('supplier_name'),
                'bill_no' => Input::get('bill_no'),
                'bill_date' => Input::get('bill_date'),
                'customer_name' => Input::get('customer_name'),
                'nepse_code' => Input::get('nepse_code'),
                'type' => Input::get('type'),
                'name_transfer_amount' => Input::get('name_transfer_amount'),
                'dp_fee' => Input::get('dp_fee'),
                'bill_miti' => Input::get('bill_miti')
            ];
            Bills::insert($bill);
            $lid = DB::getPdo()->lastInsertId();

            for ($i = 0; $i < count($tran); $i++) {
                $data = [
                    'bill_id' => $lid,
                    'transaction_no' => Input::get('transaction_no')[$i],
                    'no_of_shares' => Input::get('no_of_shares')[$i],
                    'company_name' => Input::get('company_name')[$i],
                    'amount' => Input::get('amount')[$i],
                    'base_price' => Input::get('base_price')[$i],
                    'capital_gain' => Input::get('capital_gain')[$i],
                    'commission_amount' => Input::get('commission_amount')[$i],
                    'share_rate' => Input::get('share_rate')[$i],
                    'commission' => Input::get('commission')[$i],
                ];
                Purchase::insert($data);
            }


            return redirect('purchase');
        }
    }

    public function view($id) {
        $data = array();
        $data['current_nav'] = 'purchase';
        $data['supplier'] = DB::table('bills')->where('id', $id)->first();
        $data['bills'] = DB::table('purchase as P')
                ->join('bills as B', 'B.id', '=', 'P.bill_id')
                ->where('P.bill_id', $id)
                ->select('P.*', 'B.supplier_name as s_name', 'B.bill_no as b_no', 'B.bill_date as b_date')
                ->get();
        $data['sum_com'] = DB::table('purchase')
                ->where('bill_id', $id)
                ->sum('commission_amount');
        return view('purchase::bill_view', $data);
    }

    public function delete($id) {
        Bills::find($id)->delete();
        Session::flash('success_message', 'deleted');
        return redirect('purchase');
    }

    public function autocomplete() {

        $term = Input::get('q');
        $result = array();
        $queries = DB::table('company')->where('company_name', 'LIKE', '%' . $term . '%')->take(5)->get();
        foreach ($queries as $query) {
            $results[] = [ 'id' => $query->id, 'company_name' => $query->company_name];
        }

        return $result;
    }

    public function test() {
        $data = array();
        $data['current_nav'] = 'purchase';
       
        $data['bills'] = DB::table('purchase as P')
                ->join('bills as B', 'B.id', '=', 'P.bill_id')
                ->select('P.*', 'B.supplier_name as s_name', 'B.bill_no as b_no', 'B.bill_date as b_date','B.bill_miti as miti','B.customer_name as c_name','B.nepse_code as n_code','B.name_transfer_amount as t_amount','B.dp_fee as dp_fee','B.type as type')
                ->orderBy('P.id','desc')
                 
                ->get();
        return view('purchase::test',$data);
//         $files = array();
//        
//            $files[] = 'public/files/abs.mp4';
//          $ran=  rand(4, 10);
////dd($files);
//        $zip = \Zipper::make('public/uploads/'.$ran.'brochure.zip')->add($files);
//       
////                 return response()->json(['status' => true, 'file' => 'public/uploads/'.$ran.'brochure.zip']);
//   return response()->download('public/uploads/'.$ran.'brochure.zip');
   
    }

    public function search(){
        $input=Input::get('q');
        $data=array();
        $data['query']=DB::table('bills')->where('supplier_name','LIKE','%'.$input.'%')->get();
        return view('purchase::index',$data);
    }
}
