<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{

    public function save()
    {
        $post = Home::create([
            'user' => $this->title
        ]);

        return redirect()->to('/posts')
            ->with('status', 'Post created!');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.home');
    }
}
