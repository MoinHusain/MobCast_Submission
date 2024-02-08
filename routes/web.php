<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Crypt;
Route::get('/', [ApiController::class, 'getDataFromApi']);

