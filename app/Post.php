<?php namespace NhaThieuNhi;

/**
 * @author: Tien Nguyen
 * @version: $Id: Post.php,v 1.0 2015/06/21 03:29 htien Exp $
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'posts';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'post_author',
      'post_date',
      'post_type',
      'post_status',
      'post_title',
      'post_excerpt',
      'post_content',
      'post_name'
  ];

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * The storage format of the model's date columns.
   *
   * @var string
   */
  protected $dateFormat = 'U';

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function author()
  {
    return $this->belongsTo(User::class, 'post_author');
  }
}
