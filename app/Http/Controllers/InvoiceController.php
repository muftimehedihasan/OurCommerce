<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use App\Models\CustomerProfile;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    function InvoiceCreate(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id=$request->header('id');
            $user_id=$request->header('email');

            $tran_id=uniqid();
            $delivery_status='Pending';
            $payment_status='Pending';

            $Profile=CustomerProfile::where('user_id','=',$user_id)->first();
            $cus_details="Name:$Profile->cus_name,Address:$Profile->cus_add,City:$Profile->cus_city,Phone: $Profile->cus_phone";
            $ship_details="Name:$Profile->ship_name,Address:$Profile->ship_add ,City:$Profile->ship_city ,Phone: $Profile->cus_phone";

            DB::commit();

        }catch (\Exception $e) {
            DB::rollback();
            // return ResponseHelper::Out('Failed', $e->getMessage(), 500);
            return ResponseHelper::Out('fail',$e,200);
        }
    }
}
