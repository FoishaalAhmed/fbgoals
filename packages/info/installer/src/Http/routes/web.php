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
    Route::get('database', [DatabaseController::class, 'create'])->name('database.create');
    Route::post('database', [DatabaseController::class, 'store'])->name('database.store');
    Route::get('seed-migrate', [DatabaseController::class, 'seedMigrate'])->name('database.seed');
    Route::get('requirements', [RequirementsController::class,'requirements'])->name('check.requirements');
    Route::get('permissions', [PermissionsController::class,'checkPermissions'])->name('check.permissions');
    Route::get('register', [UserController::class,'create'])->name('user.create');
    Route::post('register', [UserController::class,'store'])->name('user.store');
    Route::get('finish', [FinalController::class,'finish'])->name('finish');
});

if (!env('INSTALL_APP_SECRET')) {
    Route::match(array('GET', 'POST'), 'installer/verify-envento-purchase-code',[PermissionsController::class, 'verifyPurchaseCode'])->name('installers.verify.purchase');
}

Route::post('install/clear-cache', [PermissionsController::class, 'clearCache']);

