<?php

namespace App\Http\Controllers;

use App\Models\PaynowTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaynowTransferController extends Controller
{
    public function index()
    {
        $data['PaynowTransfer'] = PaynowTransfer::where('user_id', Auth::user()->id)->paginate(12);
        $data['totalpaynowTransfer'] = PaynowTransfer::where('user_id', Auth::user()->id)->sum('transfer_amount');

        return view('pages.paynowTransfer.index', $data);
    }

    public function create()
    {
        return view('pages.paynowTransfer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'transfer_title' => 'required',
            'transfer_amount' => 'required',
            'transfer_date'=> 'required'
        ]);

        $expense = new PaynowTransfer();
        $expense->transfer_title = $request->transfer_title;
        $expense->transfer_amount = $request->transfer_amount;
        $expense->transfer_date = $request->transfer_date;
        $expense->user_id = Auth::user()->id;
        $expense->save();

        return redirect('/paynowTransfer')->with('message', 'New paynowTransfer Added');
    }

    public function edit($id)
    {
        $data['paynowTransfer'] = PaynowTransfer::findOrFail($id);
        return view('pages.paynowTransfer.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
          'transfer_title' => 'required',
            'transfer_amount' => 'required',
            'transfer_date'=> 'required'
        ]);

        $expense = PaynowTransfer::findOrFail($request->paynowTransfer_id);
        $expense->transfer_title = $request->transfer_title;
        $expense->transfer_amount = $request->transfer_amount;
        $expense->transfer_date = $request->transfer_date;
        $expense->update();

        return redirect('/paynowTransfer')->with('message', 'paynowTransfer details updated successfully');
    }

    public function destroy($id)
    {
        PaynowTransfer::findOrFail($id)->delete();
        return back()->with('message', 'PaynowTransfer details deleted successfully');
    }
}
