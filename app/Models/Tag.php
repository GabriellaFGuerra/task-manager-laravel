<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;


protected $fillable = [
        'name',
        'color',
    ];

    /**
     * The tasks that belong to the tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Task>
     */
    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }
}
