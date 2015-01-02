<?php

namespace CachetHQ\Cachet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Watson\Validating\ValidatingTrait;

/**
 * @property int            $id
 * @property int            $component_id
 * @property int            $group_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Group extends Model
{
    use SoftDeletingTrait, ValidatingTrait;

    protected $rules = [
        'name' => 'required',
    ];

    protected $fillable = ['name'];

    /**
     * A group can have many components.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function components()
    {
        return $this->hasMany('CachetHQ\Cachet\Models\Component', 'id', 'group_id');
    }
}
