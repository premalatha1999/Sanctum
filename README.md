### Steps to run

```
git clone https://github.com/premalatha1999/Sanctum.git
cd Sanctum
composer update
Set your environment variables
php artisan migrate
Now you have a basic setup for sanctum . create a authorization tokens for your user and utilize your other api services securely by using authorization tokens .

```

### Sanctum For Api Tokens

Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications), 	mobile applications, and simple, token based APIs.

Sanctum allows each user of your application to generate multiple API tokens for their account.

These tokens may be granted abilities / scopes which specify which actions the tokens are allowed to perform.

### Implement Sanctum For Api Tokens

1 . create a new laravel 7 project
2 . composer update
3 . composer require laravel/sanctum
4 . php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
5 . php artisan migrate
6 . add the follwing in app/Http/Kernel.php
	
	use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

	'api' => [
	    EnsureFrontendRequestsAreStateful::class,
	    'throttle:60,1',
	    \Illuminate\Routing\Middleware\SubstituteBindings::class,
	],

7 . Add following in user model 

	use Laravel\Sanctum\HasApiTokens;

	class User extends Authenticatable
	{
	    use HasApiTokens, Notifiable;
	}

8 . Add sanctum middleware to apis
	
	Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	    return $request->user();
	});

9 . Issuing API Tokens

	$token = $user->createToken('token-name');

10 . Token Abilities

	$token = $user->createToken('token-name', ['server:update'])->plainTextToken;

11 . To check abilities

	if ($user->tokenCan('server:update')) {
	    //
	}

12 . for delete tokens 

	// Revoke all tokens...
	$user->tokens()->delete();

	// Revoke the user's current token...
	$request->user()->currentAccessToken()->delete();

	// Revoke a specific token...
	$user->tokens()->where('id', $id)->delete();