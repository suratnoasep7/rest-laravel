<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Employee;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pay = Pay::all();
        return view('pay.index',compact('pay'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('pay.create',compact('employee'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pay = Pay::find($id);
        return view('pay.show',compact('pay'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store = array();

        $total_percentage = 0;
        foreach($request['id_employee'] as $key => $price)
        {
                $total = $request['price'] * $request['percentage'][$key] / 100;
                $total_price = $request['price_employee'][$key] - $total;
                $store[] = array(
                    'price' => $request['price'],
                    'id_employee' => $request['id_employee'][$key],
                    'name' => $request['name_employee'][$key],
                    'percentage' => $request['percentage'][$key],
                    'total' => $total_price
                );
                $total_percentage += $request['percentage'][$key];
        }

        if ($total_percentage > 100) {
            return back()->withErrors(["percentage" => "total melebihi"])->withInput();
        }

        Pay::insert($store);
        return redirect()->route('welcome.index')
                        ->with('success','Pay created successfully.');

    }
}
