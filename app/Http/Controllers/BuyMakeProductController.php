<?php
namespace App\Http\Controllers;
use App\BuyMakeProduct;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BuyMakeProductController extends Controller
{
    public function create(Request $request){
        /* inserting the  form request into buy_make_product table  with BuyMakeProduct Model*/
        $ProductController = BuyMakeProduct::create($request->all());
        return view('welcome');
    }

}
