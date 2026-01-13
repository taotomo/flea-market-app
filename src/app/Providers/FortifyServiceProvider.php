<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Requests\LoginRequest;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\EmailVerificationNotificationSentResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // 会員登録完了後のレスポンス設定（最初に設定）
        $this->app->singleton(
            \Laravel\Fortify\Contracts\RegisterResponse::class,
            function () {
                return new class implements \Laravel\Fortify\Contracts\RegisterResponse {
                    public function toResponse($request)
                    {
                        return redirect()->route('verification.notice');
                    }
                };
            }
        );

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // ログインバリデーションのカスタマイズ（LoginRequestを使用）
        Fortify::authenticateUsing(function (Request $request) {
            // LoginRequestでバリデーション
            $loginRequest = LoginRequest::createFrom($request);
            $validated = $loginRequest->validate($loginRequest->rules());

            $user = \App\Models\User::where('email', $validated['email'])->first();

            if ($user && \Illuminate\Support\Facades\Hash::check($validated['password'], $user->password)) {
                return $user;
            }

            // ログイン情報が誤っている場合のエラーメッセージ
            throw ValidationException::withMessages([
                'email' => ['ログイン情報が登録されていません'],
            ]);
        });

        // ビューの設定
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::verifyEmailView(function () {
            return view('auth.email-verification');
        });

        // メール認証完了後のリダイレクト先を設定
        $this->app->singleton(
            \Laravel\Fortify\Contracts\VerifyEmailResponse::class,
            function () {
                return new class implements \Laravel\Fortify\Contracts\VerifyEmailResponse {
                    public function toResponse($request)
                    {
                        return redirect('/mypage/profile');
                    }
                };
            }
        );
    }
}
