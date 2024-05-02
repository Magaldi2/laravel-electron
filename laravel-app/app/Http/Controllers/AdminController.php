<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('role','=','user')->get();
        return view('admin_dashboard', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cep'=>['required', 'string','max:10']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cep'=>$request->cep,
        ]);
        event(new Registered($user));

        return redirect(route('admin.dashboard'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $name =  $request->name;
        $email = $request->email;
        $cep = $request->cep;

        $user->name = $name;
        $user->email = $email;
        $user->cep = $cep;

        $data = $user->save();
        return redirect(route('admin.dashboard'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();
        if ($user) 
        {
            session()->flash('success', 'user deleted Successfully');
            return redirect(route('admin.dashboard'));
        }
        else
        {
            session()->flash('error', 'user not deleted Successfully');
            return redirect(route('admin.dashboard'));
        }
    }
}
