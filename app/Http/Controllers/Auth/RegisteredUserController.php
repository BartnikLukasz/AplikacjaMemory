<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Utilities\UnlockCategoryUtil;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nickname' => ['required', 'string', 'max:255', 'unique:user'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = $this->createUser($request);

        event(new Registered($user));

        Auth::login($user);

        $this->unlockCategories();

        return redirect()->route('dashboard');
    }

    private function createUser($request){

        $position = User::orderBy('position', 'desc')->first()->position;

        if($position){
            $position++;
        }
        else{
            $position = 1;
        }

        return User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'position' => $position,
            'password' => Hash::make($request->password),
        ]);
    }

    private function unlockCategories(){
        UnlockCategoryUtil::unlockCategoryOnRegistration(Auth::user()->id);
    }
}
