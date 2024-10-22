<?php

namespace App\Livewire\Pages;

use App\Imports\Userimport;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Users extends Component
{

    use WithFileUploads;
    use WithPagination;
    /* $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Nice Name'],
    ]; */
    public $users;
    public array $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'email', 'label' => 'Email'],
    ];
    public $file;
    public $selectedTab = 'users-tab';
    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);


        Excel::import(new Userimport, $this->file->path());

        $this->users = User::all();
        session()->flash('message', 'Inventory imported successfully.');
        $this->selectedTab = 'users-tab';
    }

    public function mount()
    {
        $this->users = User::all();
    }


    #[Layout('layouts.app')]
    public function render(): View
    {
        $items = User::paginate(5);
        return view('livewire.pages.users', [
            'items' => $items,
        ]);
    }
}
