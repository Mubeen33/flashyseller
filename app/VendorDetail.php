<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class VendorDetail extends Model
{
    protected $table = 'vendor_details';
    protected $fillable = [
        'vendor_id', 'legal_name', 'business_type', 'registration_no', 'document', 'recipient_name', 'street_address', 'street_no', 'city', 'country', 'postal_code', 'fullname', 'bank_name', 'account_no', 'branch_code', 'debit_order', 'date_created', 'date_modified','updated_at', 'is_disabled'
    ];
}