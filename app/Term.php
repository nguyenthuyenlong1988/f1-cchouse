<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: Term.php,v 1.0 2015/07/26 12:11 htien Exp $
 */

namespace NhaThieuNhi;

class Term extends AModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'terms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // id auto_increment
        'term_name',
        'term_slug',
        'term_group',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxonomy()
    {
        return $this->hasMany(TermTaxonomy::class, 'term_id');
    }
}