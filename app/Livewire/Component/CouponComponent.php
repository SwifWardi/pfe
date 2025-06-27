<?php

namespace App\Livewire\Component;

use App\Models\Coupon;
use Livewire\Component;

class CouponComponent extends Component
{
    public $subtotal;
    public $coupon = "da";
    public $isExist;
    
    public function mount($subtotal){
        $this->subtotal = $subtotal;
    }

    public function submitCoupon(){
        $this->isExist = Coupon::where('coupon_name', $this->coupon)->first();

    }

    public function render()
    {
        return view('livewire.component.coupon-component');
    }
}
