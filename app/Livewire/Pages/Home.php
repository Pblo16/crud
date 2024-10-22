<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{

    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.home');
    }
}
