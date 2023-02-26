<?php

namespace App\Imports;

use App\Transaction;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


 /**
 * Transform a date value into a Carbon object.
 *
 * @return \Carbon\Carbon|null
 */
public function transformDate($value, $format = 'yyy-mm-dd')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}

    public function model(array $row)
    {
      
        return new Transaction([
        //     $transaction = new Transaction(),
        // $transaction->timestamps = false,
            'client_id' =>  $row[0],
            'shift' =>  $row[1],
            'unit_id' =>  $row[2],
            'service_id' =>  $row[3],
            'user_id' =>  $row[4],
            'description' =>  $row[5],
            'quantity' =>  $row[6],
            'remarks' =>  $row[7],
            // 'date' =>  $this->transformDate($row[8])
            'date' =>  $row[8]
        ]);
    }
}
