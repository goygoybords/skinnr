<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Customer;
use App\Product;
use App\CashInvoice;
use App\User;
use App\CashInvoiceDetail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        //session_start();
    }   
    public function index()
    {
        $title = "Menu View For Sales System";
        $customer_list = $this->listCustomer();
        $product_list = $this->listProduct();
        $invoice_number = CashInvoice::count();
        return view('admin.menu')->with(compact('title' , 'customer_list' , 
                                    'invoice_number','product_list'));
    }

    public function addCustomer(Request $request)
    {
        $data = $request->only('name' , 'address' , 'contact_person' , 'contact_number' , 'credit_limit');
        $rules = [ 'name' => 'required', 
                   'contact_number' => 'required'
                 ];
        $this->validate($request,$rules);
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->address = $data['address'];
        $customer->contact_person = $data['contact_person'];
        $customer->contact_number = $data['contact_number'];
        $customer->credit_limit = $data['credit_limit'];
        $customer->record_status = Customer::STATUS_ACTIVE;
        $customer->save();
        return redirect('home')->with('msg' , 'Customer Recorded');
    }

    public function listCustomer()
    {
        $customer_list = Customer::where('record_status', 1)
                        ->orderBy('customer_id')
                        ->get();
        return $customer_list;
    }

    public function addProduct(Request $request)
    {
        $data = $request->only('description' , 'category' , 'unit_of_measurement' , 
            'unit_price' , 'quantity_on_hand');
        
        $product = new Product();
        $product->description = $data['description'];
        $product->category = $data['category'];
        $product->unit_of_measurement = $data['unit_of_measurement'];
        $product->unit_price = $data['unit_price'];
        $product->quantity_on_hand = $data['quantity_on_hand'];
        $product->record_status = Product::STATUS_ACTIVE;
        $product->save();
        return redirect('home')->with('msg' , 'Product Recorded');
    }

    public function listProduct()
    {
        $product_list = Product::where('record_status', 1)
                        ->orderBy('product_id')
                        ->get();
        return $product_list;
    }

    public function addCashInvoice(Request $request)
    {
        $ci_data = $request->only('invoice_number', 'customer' ,'order_date' ,'vat_sales' 
                    ,'vat' ,'total' , 'prepared_by' , 'received_by'); 

        $product = $request->input('product');
        $quantity = $request->input('quantity');
        $uprice = $request->input('unit_price');
        $amount = $request->input('amount');    
        
        // Cash Invoice Header Entries
        $employee = User::where('name' , $ci_data['prepared_by'])->first();
        $ci = new CashInvoice();
        $ci->ci_date = date('Y-m-d', strtotime($ci_data['order_date']));
        $ci->customer_id = $ci_data['customer'];
        $ci->total = $ci_data['total'];
        $ci->vat = $ci_data['vat'];
        $ci->vat_sales = $ci_data['vat_sales'];
        $ci->prepared_by = $employee->id;
        $ci->received_by = $ci_data['received_by'];
        $ci->record_status = CashInvoice::STATUS_ACTIVE;
        $ci->save();
       
        //Cash Invoice Detail Entries
        for($i=0; $i < count($product) ; $i++)
        {
            $cid = new CashInvoiceDetail();
            $cid->ci_no = $ci_data['invoice_number'];
            $cid->product_id = $product[$i];
            $cid->quantity = $quantity[$i];
            $cid->unit_price = $uprice[$i];
            $cid->amount = $amount[$i];
            $cid->record_status = CashInvoiceDetail::STATUS_ACTIVE;
            $cid->save();
        }
        return redirect()->route('home')->with('msg' , 'Order Saved');
    }

    // Ajax Controller
    public function test(Request $request)
    {
        $id = $request->input('id');
        $customer = Customer::where('customer_id', $id)->first();
        $address =  $customer->address;
        return $address;
    }
    public function getItem(Request $request)
    {
        $item = $request->input('item');
        $product = Product::where('product_id' , $item)->first();
        $uom = $product->unit_of_measurement;
        $uprice = $product->unit_price;

        return array($uom,$uprice);
    }

}
