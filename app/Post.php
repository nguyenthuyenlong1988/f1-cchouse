<?php namespace NhaThieuNhi;
/**
 * @author: Tien Nguyen
 * @version: $Id: Post.php,v 1.0 2015/06/21 03:29 htien Exp $
 */

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';

  /**
   * The storage format of the model's date columns.
   *
   * @var string
   */
  protected $dateFormat = 'U';
}