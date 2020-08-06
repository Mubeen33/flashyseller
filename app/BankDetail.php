<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class BankDetail extends Model
{
    protected $table = 'bank_details';
    protected $fillable = [
        'vendor_id', 'fullname', 'bank_name', 'street_no', 'account_no', 'branch_code', 'debit_order_form', 'approval_status', 'is_deleted', 'date_created','updated_at', 'date_modified'
    ];
}