<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public $name;
    public $email;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $cardNumber;
    public $expMonth;
    public $expYear;
    public $cvc;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'address' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'zip' => 'required|string',
        'cardNumber' => 'required|string',
        'expMonth' => 'required|string',
        'expYear' => 'required|string',
        'cvc' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        // Code to save order to database goes here

        session()->flash('success', 'Your order has been placed!');

        return redirect()->to('/thank-you');
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
