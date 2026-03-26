<?php
use Illuminate\http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Auth\RegisteredUserController;

route::post('register', [RegisteredUserController::class , 'store']);