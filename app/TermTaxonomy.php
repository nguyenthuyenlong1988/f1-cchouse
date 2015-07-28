<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: TermTaxonomy.php,v 1.0 2015/07/26 12:34 htien Exp $
 */

namespace NhaThieuNhi;

class TermTaxonomy extends AModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'term_taxonomy';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // id auto_increment
        'term_id',
        'taxonomy',
        'description',
        'parent',
        'count',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_taxonomy', 'term_taxonomy_id');
    }
}