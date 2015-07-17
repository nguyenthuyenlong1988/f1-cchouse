<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: AModel.php,v 1.0 2015/06/24 07:00 htien Exp $
 */

namespace NhaThieuNhi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class AModel extends Model
{
    use SoftDeletes;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';
}
