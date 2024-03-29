<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SmsController;
Route::get('/clearCache', function () {
    Artisan::call('cache:clear');
});
Route::get('/clearViewCache', function () {
    Artisan::call('view:clear');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [UserController::class, 'login']);
Route::get('/resetPassword', [UserController::class, 'resetPassword']);
Route::get('/newPassword', [UserController::class, 'newPassword']);

// --------admin ---------
Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/customersList', [UserController::class, 'customersList']);
    Route::get('/newCustomer', [UserController::class, 'newCustomer']);
    Route::post('/saveGym', [UserController::class, 'saveGym']);
    Route::get('/customerDetails/{id}', [UserController::class, 'customerDetails']);
    Route::post('/saveGymBarcode', [UserController::class, 'saveGymBarcode']);
    Route::get('/barcodesOfGym/{id}', [UserController::class, 'barcodesOfGym']);
    Route::get('/addedByAdmin/{id}', [UserController::class, 'addedByAdmin']);
    Route::get('/usedBarcodes/{id}', [UserController::class, 'usedBarcodes']);
    Route::get('/remBarcodes/{id}', [UserController::class, 'remBarcodes']);
    Route::get('/advertisement', [UserController::class, 'advertisement']);
    Route::post('/saveAd', [UserController::class, 'saveAd']);
    Route::get('/deleteAds/{id}', [UserController::class, 'deleteAds']);
    Route::get('/updateGym/{id}', [UserController::class, 'updateGym']);
    Route::post('/editGym', [UserController::class, 'editGym']);
});

// -----------gym-----------
Route::group(['middleware' => ['GymMiddleware']], function () {
    Route::get('/newMember', [GymController::class, 'newMember']);
    Route::get('/member', [GymController::class, 'member']);
    Route::post('/savemember', [GymController::class, 'savemember']);
    Route::get('/updateMember/{id}', [GymController::class, 'updateMember']);
    Route::post('/editmember', [GymController::class, 'editmember']);
    Route::post('/saveRequestBarcode', [GymController::class, 'saveRequestBarcode']);
    Route::post('/ann', [GymController::class, 'ann']);
    Route::get('/gymsTiming', [GymController::class, 'gymsTiming']);
    Route::post('/saveTiming', [GymController::class, 'saveTiming']);
    Route::post('/saveSendMail', [GymController::class, 'saveSendMail']);
    Route::post('/saveSendPhone', [GymController::class, 'saveSendPhone']);
    Route::get('/checkBarcode', [GymController::class, 'checkBarcode']);
});
// Route::get('/sendbasicemail', [MailController::class, 'basic_email']);
// Route::get('/sendhtmlemail', [MailController::class, 'html_email']);
// Route::get('/sendattachmentemail', [MailController::class, 'attachment_email']);
Route::get('send-sms', [ SmsController::class, 'index' ])->name('get.sms.form');
Route::post('send-sms', [ SmsController::class, 'sendMessage' ])->name('send.sms');