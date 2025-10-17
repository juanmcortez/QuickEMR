<?php

namespace App\Models\Codes;

use App\Enum\CodeType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Custom extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'codes_custom_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'code',
        'code_short',
        'description',
        'default_modifier',
        'default_ndc',
        'default_units',
        'default_fee',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => CodeType::class,
            'default_units' => 'integer',
            'default_fee' => 'decimal:2',
        ];
    }

    /**
     * Accessor / mutator for the date of discharge.
     */
    protected function fee(): ?Attribute
    {
        return Attribute::make(
            get: static fn($value) => '$'.number_format($value, 2, ',', '.'),
        );
    }
}
