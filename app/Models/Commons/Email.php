<?php

namespace App\Models\Commons;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commons_emails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['id', 'verified_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Accessor / mutator for the verifiedAt field.
     */
    protected function verifiedAt(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Carbon::parse($value)->format('M d, Y'),
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d')
                : $value,
        );
    }
}
