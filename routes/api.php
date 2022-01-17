<?php

use App\Http\Controllers\API\v1\StepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->namespace('API\v1')->prefix('v1/')->group(function(){
    Route::get('/get-students', [StepController::class, 'getStudents']);
    Route::get('/get-faculties', [StepController::class, 'getFaculties']);
});


Route::middleware('auth:api')->post('/logout', function (Request $request) {

    $tokens = $request->user()->tokens;

    $tokenRepository = app(TokenRepository::class);
    $refreshTokenRepository = app(RefreshTokenRepository::class);

    foreach($tokens as $token)
    {
        // Revoke an access token...
        $tokenRepository->revokeAccessToken($token->id);

        // Revoke all of the token's refresh tokens...
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($token->id);
        $token->revoke();
    }

    if(Auth::check()){
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
    }

    return ['messege' => 'Success'];
});
