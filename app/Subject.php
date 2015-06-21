<?php namespace NhaThieuNhi;
/**
 * @author: Tien Nguyen
 * @version: $Id: Subject.php,v 1.0 2015/06/20 15:27 htien Exp $
 */

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  protected $table = 'subjects';

  public $timestamps = false;
}