<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserLogin extends Component
{
    public $email, $password;


    public function mount(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    protected function rules()
    {
        return [
            'password' => 'required|min:6',
            'email' => 'required|email',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function login()
    {
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
                return redirect()->route('admin.home');
        }else{
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function render()
    {
        return view('livewire.user-login');
    }

}
