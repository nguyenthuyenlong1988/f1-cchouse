<?php namespace NhaThieuNhi;

/**
 * @author: Tien Nguyen
 * @version: $Id: Post.php,v 1.0 2015/06/21 03:29 htien Exp $
 */

class Post extends AModel
{
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
    // id auto_increment
    'post_author',
    'post_date',
    'post_type',
    'post_status',
    'post_title',
    'post_excerpt',
    'post_content',
    'post_name',
    'post_avatar',
  ];

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['post_date', 'deleted_at'];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function author()
  {
    return $this->belongsTo(User::class, 'post_author');
  }
}
