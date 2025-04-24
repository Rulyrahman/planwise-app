<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use App\Mail\CustomNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('pages/homepage');
})->name('homepage');

Auth::routes(['verify' => true]);

Route::get('/dashboard', function () {
    return view('pages/dashboard');
})->middleware('auth', 'verified')->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::findOrFail($id);

    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403, 'Invalid verification link.');
    }

    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        event(new Verified($user));
    }

    return redirect()->route('login')->with('status', 'Email verified successfully!');
})->middleware(['signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $user = User::where('email', $request->email)->first();

    if ($user && !$user->hasVerifiedEmail()) {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $user->id,
                'hash' => sha1($user->getEmailForVerification())
            ]
        );

        Mail::to($user->email)->send(new CustomNotification($user, $verificationUrl));

        return back()->with('status', 'A verification link has been sent to your email');
    }

    return back()->with('verify_error', 'Email not found or already verified.');
})->name('verification.send');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/dashboard/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/dashboard', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/dashboard/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/dashboard/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});