<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;
use Sunra\PhpSimple\HtmlDomParser;
use App\Services\sabaService;


class SabaController extends Controller
{

	public function setfiledata($brand,$filename)
	{

		new sabaService($brand,$filename);
	}
}
