<?php

namespace App\Livewire;

use Livewire\Component;

class TestWire extends Component
{
    public $datas = [];

    public function getDatas(){
        $this->datas = [1,2,3,4,5];
    }

    public function render()
    {
        return view('livewire.test-wire');
    }
}
