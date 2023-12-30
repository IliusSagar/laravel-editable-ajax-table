<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function leadManage(Request $request){

        if($request->ajax()){
            $lead = Customer::find($request->pk);
            if ($lead) {
                $fieldName = $request->name;
                $fieldValue = $request->input('value');
               
                
                // Check the field name and update the corresponding field in the model
                if ($fieldName === 'name') {
                    $lead->update(['name' => $fieldValue]);
                } elseif ($fieldName === 'phone') {
                    $lead->update(['phone' => $fieldValue]);
                }
            }
            return response()->json(['success' => true]);
        }

    }
}
