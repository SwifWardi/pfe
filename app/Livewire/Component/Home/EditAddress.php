<?php

namespace App\Livewire\Component\Home;

use Livewire\Component;

class EditAddress extends Component
{
    public $address;
    public $profile;
    public $editing = false;

    public function mount($profile)
    {
        $this->profile = $profile;
        $this->address = $profile->address;
    }

    public function toggleEdit()
    {
        $this->editing = !$this->editing;
    }

    public function saveAddress()
    {
        $this->validate([
            'address' => 'required|min:3|max:255',
        ]);

        $this->profile->address = $this->address;
        $this->profile->save();

        $this->editing = false; // Hide the form after saving
    }
    public function render()
    {
        return view('livewire.component.home.edit-address');
    }
}
