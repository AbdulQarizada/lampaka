<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    protected $fillable =
    [
        'Type_ID',
        'Item_ID',
        'Currency_ID',
        'Bill',
        'Description',
        'Amount',
        'Date',
        'created_at',
        'Created_By',
        'Owner',
    ];
  
}
