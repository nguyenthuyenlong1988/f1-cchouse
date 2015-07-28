<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: TermRelationship.php,v 1.0 2015/07/26 12:37 htien Exp $
 */

namespace NhaThieuNhi;

class PostTaxonomy extends AModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_taxonomy';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = ['object_id', 'term_taxonomy_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'object_id',
        'term_taxonomy_id',
        'term_order'
    ];
}