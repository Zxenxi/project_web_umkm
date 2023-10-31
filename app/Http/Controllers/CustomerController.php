<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function index()
    // {
    //     $customer = Customer::all();
    //     return view('home.index', compact('customer'));
    // }
    public function customer()
    {
        $customer = Customer::all();
        return view('home.customer.tambah_customer', compact('customer'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required'
        ], [
            'name' => 'Nama tidak boleh kosong',
            'phone_number' => 'Nomor tidak boleh kosong'
        ]);
        $customer = new Customer;
        $customer->name = $validatedData['name'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->save();

        return redirect('/home/add-customer');
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        $customers = Customer::all();
        return view('home.customer.edit_customer', compact('customer', 'customers'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required'
        ], [
            'name' => 'Nama tidak boleh kosong',
            'phone_number' => 'Nomor tidak boleh kosong'
        ]);
        $customer = Customer::find($id);

        $customer->name = $validatedData['name'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->save();

        return redirect('/home/add-customer')->with('succes', 'Anda berhasil mengupdate customer'); // Redirect to the desired page after successful update
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/home/add-customer')->with('success', 'Product deleted successfully.');
    }
}
