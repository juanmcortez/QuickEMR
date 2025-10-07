<?php

namespace App\Models\Patients;

use App\Models\Commons\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pid';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['profile'];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'profile_id',
        'accession_number_ptlvl',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'pid',
        'profile_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the profile relationship
     *
     * @return HasOne
     */
    public function profile(): hasOne
    {
        return $this->hasOne(Profile::class, 'id', 'profile_id')
            ->withDefault();
    }
}
