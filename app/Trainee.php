<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: Trainee.php,v 1.0 2015/06/21 00:57 htien Exp $
 */

namespace NhaThieuNhi;

class Trainee extends AModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trainees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'birthday',
        'sex',
        'address_line1',
        'address_line2',
        'note',
    ];
}