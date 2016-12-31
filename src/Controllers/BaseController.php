<?php namespace H34\Core\Controllers;

#use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class BaseController extends Controller{

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
