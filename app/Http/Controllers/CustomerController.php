<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if($request->search != ''){
            $search = $request->search;
        $customers = Customer::whereRaw("CONCAT(id_customer, ' ', nama, ' ', no_telepon, ' ', username, ' ', email, ' ', saldo, ' ', poin) LIKE ?", ["%{$search}%"])->get();  
        }else{
            $customers = Customer::all();
        }
        
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        if($request->password == ''){
            $customer->update([
                'nama' => $request->nama,
                'email'=> $request->email,
                'no_telepon'=> $request->no_telepon,
                'username'=> $request->username,
                'saldo'=> $request->saldo,
                'poin'=> $request->poin,
                'password'=> bcrypt($request->password),
            ]);
        }else{
            $customer->update($request->all());
        }

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }
    public function show(){}

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
