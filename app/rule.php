<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rule extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class , 'id');
    }
}
