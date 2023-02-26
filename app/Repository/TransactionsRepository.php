<?php

namespace App\Repository;

use App\Models\Transaction;
use App\Models\Restriction;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Dingo\Api\Routing\Helpers;


class TransactionsRepository
{
    public function getAll(){
        $transactions = Transaction::all();
        return $transactions;
    }
    public function suggestionList(){
        $transactions = Transaction::distinct()->get(['description']);
        return $transactions;
    }

    public function suggestionListFiltered($word)
    {
        $filterData = DB::table('transactions')->where('description','LIKE',"%{$word}%")->distinct()->get(['description']);
        return $filterData;
    }


    public function getByDate(Request $request){
        $from = $request['dateStart'];
        $to = $request['dateEnd'];
        $service_id = $request['service_id'];
        $uID = $request['id'];
        $restriction = [];

        $restriction = Restriction::where('user_id', $uID)->get(['client_id']);

        $transactions = Transaction::whereBetween('date', [$from, $to])

        ->when($service_id , function ($query, $service_id ) {
            return $query->where('service_id', $service_id );
        })
        ->whereIn('client_id', $restriction)
        ->orderBy('service_id', 'asc')
        ->orderBy('created_at', 'asc')
        
        // ->orwhere('client_id', 2)
                // ->where('service_id', $service_id)
        ->orderBy('date', 'asc')
        ->get();
      
        return $transactions;
    }
    public function store(Request $request){
        $transaction = new Transaction();
        $transaction->client_id = $request['client_id'];
        $transaction->shift = $request['shift'];
        $transaction->unit_id = $request['unit_id'];
        $transaction->service_id = $request['service_id'];
        $transaction->user_id = $request['user_id'];
        $transaction->description = $request['description'];
        $transaction->quantity = $request['quantity'];
        $transaction->remarks = $request['remarks'];
        $transaction->date = $request['date'];
        $transaction->save();
        return $transaction;
    }

}
