<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function get_log($id)
    {
        $data = Transaction::GET_BY_ID($id);
       return $data['data'];
    }
}
