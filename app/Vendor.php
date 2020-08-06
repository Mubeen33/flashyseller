<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Vendor extends Model
{
    protected $table = 'vendor';
    protected $fillable = [
        'first_name','last_name','username','company_name', 'email', 'password','is_active'
    ];
}