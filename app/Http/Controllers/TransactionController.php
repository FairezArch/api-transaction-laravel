<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\TransactionDetail;
use App\Models\TransactionPaymentMethod;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    //

    public function index(): JsonResponse
    {
        $lists = Transaction::with(['customer' => function ($query) {
            $query->with('customer_address');
        },'transaction_details', 'transaction_payment_method'])->get();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $lists,
        ]);
    }

    public function store(Request $request): JsonResponse
    {

        try {
            //code...
            $now = Carbon::now()->toDateTimeString();
            $trans = Transaction::create([
                'customer_id' => $request->customer_id,
                'order_date' => $now
            ]);

            $lastID_transaction = $trans->id;

            $inputProduct = [];
            $total_price = 0;
            foreach($request->products as $key => $value){
                $currentPrice = Product::select('price')->firstWhere('id', $value['id'])->price;
                $inputProduct[$key]['transaction_id'] = $lastID_transaction;
                $inputProduct[$key]['product_id'] = $value['id'];
                $inputProduct[$key]['quantity'] = $value['quantity'];
                $inputProduct[$key]['subtotal'] = $value['quantity'] * $currentPrice;

                $inputProduct[$key]['created_at'] = $now;
                $inputProduct[$key]['updated_at'] = $now;

                $total_price = $total_price + ($value['quantity'] * $currentPrice);
            }

            $inputPayment = [];
            foreach($request->payment_method as $key => $value){
                $inputPayment[$key]['transaction_id'] = $lastID_transaction;
                $inputPayment[$key]['payment_method_id'] = $value['id'];
                $inputPayment[$key]['amount'] = $value['amount'];

                $inputPayment[$key]['created_at'] = $now;
                $inputPayment[$key]['updated_at'] = $now;
            }

            TransactionDetail::insert($inputProduct);

            TransactionPaymentMethod::insert($inputPayment);

            $transaction_price = Transaction::find($lastID_transaction);
            $transaction_price->update(['total_price' => $total_price]);

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => Transaction::with(['customer' => function ($query) {
                    $query->with('customer_address');
                },'transaction_details', 'transaction_payment_method'])->get()
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
