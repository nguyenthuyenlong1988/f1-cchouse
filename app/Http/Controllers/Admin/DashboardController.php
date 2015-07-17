<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: DashboardController.php,v 1.0 2015/06/21 06:07 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers\Admin;

use NhaThieuNhi\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin_index');
    }
}
