<?php

use Info\Installer\Http\Controllers\{
    UserController,
    FinalController,
    WelcomeController,
    DatabaseController,
    PermissionsController,
    RequirementsController
};


if (!env('APP_INSTALL')) {
    Route::get('/', [WelcomeController::class, 'welcome'])->name('installers.index');
}

Route::group(['prefix' => 'installer', 'middleware' => ['web', 'installed'], 'as' => 'installers.'], function () {
    Route::get('database', [DatabaseController::class, 'create']);
    Route::get('requirements', [RequirementsController::class,'requirements'])->name('check.requirements');
    Route::get('permissions', [PermissionsController::class,'checkPermissions'])->name('check.permissions');
    Route::get('seed-migrate', [DatabaseController::class,'seedMigrate']);
    Route::post('database', [DatabaseController::class,'store']);
    Route::get('register', [UserController::class,'createUser']);
    Route::post('register', [UserController::class,'storeUser']);
    Route::get('finish', [FinalController::class,'finish']);
});

if (!cache('a_s_k') ||  !env('INSTALL_APP_SECRET')) {
    Route::match(array('GET', 'POST'), 'install/veri]fy-envato-purchase-code',[PermissionsController::class, 'verifyPurchaseCode']);
}

Route::post('install/clear-cache', [PermissionsController::class, 'clearCache']);

