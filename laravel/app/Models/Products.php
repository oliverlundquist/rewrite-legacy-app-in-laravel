<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * Table definition variable.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Mass-assign guarded keys.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Set primary key for table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Auto-increment primary key.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Toggle insertion of timestamps.
     *
     * @var bool
     */
    public $timestamps = false;
}
