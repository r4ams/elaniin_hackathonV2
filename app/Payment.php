<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
*/
class Payment extends Model
{
    protected $fillable = ['email', 'merchant', 'amount'];
    
    public function setAmountAttribute($input)
    {
        if ($input != '') {
            $this->attributes['amount'] = $input;
        } else {
            $this->attributes['amount'] = null;
        }
    }
    
}
