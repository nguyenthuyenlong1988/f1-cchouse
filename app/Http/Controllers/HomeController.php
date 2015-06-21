<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: HomeController.php,v 1.0 2015/05/27 03:14 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

class HomeController extends Controller
{
  public function index()
  {
    return view('home.index');
  }
}
