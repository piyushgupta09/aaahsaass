<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // User login view
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // New user registration view
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Reset user password request
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot');
        });

        // Reset password view
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset', [
                'request' => $request,
            ]);
        });

        // Verify email
        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });

        // Confirm password
        Fortify::confirmPasswordView(function () {
            return view('auth.confirm');
        });

        // 2FA
        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor');
        });

    }
}
