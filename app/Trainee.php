<?php namespace NhaThieuNhi;
/**
 * @author: Tien Nguyen
 * @version: $Id: Trainee.php,v 1.0 2015/06/21 00:57 htien Exp $
 */

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
  protected $table = 'trainees';

  /**
   * The storage format of the model's date columns.
   *
   * @var string
   */
  protected $dateFormat = 'U';
}