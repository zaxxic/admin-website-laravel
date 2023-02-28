<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        $gambar = '';
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('img/',$request->file('gambar')->getClientOriginalName());
            $gambar = $request->file('gambar')->getClientOriginalName();
        }
        $logo = '';
        if($request->hasFile('logo')){
            $request->file('logo')->move('logo/',$request->file('logo')->getClientOriginalName());
            $logo = $request->file('logo')->getClientOriginalName();
        }

        $user = User::create([
            
        
            'name' => $request->name,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'gambar' => $gambar,
            'logo' => $logo,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'koordinat' => $request->koordinat,
            'password' => Hash::make($request->password),
            
        ]);
        
        
        



        return redirect('login');
    }
}
