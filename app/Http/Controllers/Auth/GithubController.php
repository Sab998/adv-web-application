<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Str;
use Illuminate\Support;

class GithubController extends Controller
{
    public function redirect(){
        return Socialite::driver('github')->redirect();


    }
    public function callback(){
        $githubUser = Socialite::driver('github')->user();

        $user = $this->FindOrCreateUser($githubUser);
        Support\Facades\Auth::login($user);
        return redirect(route('index'));

    }

    /**
     * @param \Laravel\Socialite\Contracts\User $githubUser
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|Authenticatable
     */
    public function FindOrCreateUser(\Laravel\Socialite\Contracts\User $githubUser)
    {
        try {
            return User::query()
                ->where('email', $githubUser->getEmail())
                ->where('github_id', $githubUser->getId())
                ->firstOrFail();


        } catch (ModelNotFoundException $exception) {
            return  User::create([
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'password' => Hash::make(\Illuminate\Support\Str::random(32)),
                'github_id' => $githubUser->getId()

            ]);

        }

    }
}
