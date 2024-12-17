<?php

use App\Http\Controllers\AssemblyProcessorController;
use App\Http\Controllers\CylinderCoverController;
use App\Http\Controllers\CylinderUpdateController;
use App\Http\Controllers\DisassemblyProcessorController;
use App\Http\Controllers\FinishingProcessorController;
use App\Http\Controllers\GroovingProcessorController;
use App\Http\Controllers\LmdProcessorController;
use App\Http\Controllers\OrderNumberController;
use App\Http\Controllers\ScanHistoryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StorageProcessorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:sanctum")->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('storages', StorageProcessorController::class);
    // ->middleware(['auth:sanctum']);

Route::apiResource('disassembly', DisassemblyProcessorController::class);

Route::apiResource('grooving', GroovingProcessorController::class);

Route::apiResource('lmd', LmdProcessorController::class);

Route::apiResource('finishing', FinishingProcessorController::class);

Route::apiResource('assembly', AssemblyProcessorController::class);

Route::apiResource('site', SiteController::class);

Route::apiResource('cylinder', CylinderCoverController::class);

Route::apiResource('scan-history', ScanHistoryController::class);

Route::apiResource('users', UserController::class);

Route::apiResource('order-number', OrderNumberController::class);

Route::apiResource('cylinder-update', CylinderUpdateController::class);