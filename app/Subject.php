<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: Subject.php,v 1.0 2015/06/20 15:27 htien Exp $
 */

namespace NhaThieuNhi;

class Subject extends AModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'subject_name',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}