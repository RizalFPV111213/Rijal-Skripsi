<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use File;

class BankController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $banks = Bank::all();
    return view('banks.index', compact('banks'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('banks.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => ['required', 'string', Rule::unique('banks', 'name')->whereNull('deleted_at')],
      'number' => 'required|string',
      'description'   => 'required',
      'account_holder' => 'required|string',
    ]);
    $new_bank = new \App\Bank;
    $new_bank->name         = strtoupper($request->get('name'));
    $new_bank->number       = $request->get('number');
    $new_bank->description  = $request->get('description');
    $new_bank->account_holder = $request->get('account_holder');

    $new_bank->save();
    return redirect()->route('banks.index')->with('success', 'Bank successfully created');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\bank  $bank
   * @return \Illuminate\Http\Response
   */
  public function show(Bank $bank)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Bank  $bank
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $bank = \App\Bank::findOrFail($id);
      return view('banks.edit', ['bank' => $bank]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Bank  $bank
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $bank = \App\Bank::findOrFail($id);

    $validated = $request->validate([
        'name' => ['required', 'min:2', 'max:20', Rule::unique('banks')->ignore($bank->id)->whereNull('deleted_at')],
        'number' => 'required',
        'description' => 'required',
        'account_holder' => 'required|string',
    ]);

    $bank->name = strtoupper($request->get('name'));
    $bank->number = $request->get('number');
    $bank->description = $request->get('description');
    $bank->account_holder = $request->get('account_holder');


    $bank->save();
    return redirect()->route('banks.index')->with('success', 'Bank successfully updated');
}

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\bank  $bank
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $bank = Bank::findOrFail($id);
      $bank->delete();
      
      return redirect()->route('banks.index')
          ->with('success', 'Bank successfully deleted');
  }
}
