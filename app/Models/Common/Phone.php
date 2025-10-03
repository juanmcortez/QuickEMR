<?php

namespace App\Models\Common;

use Attribute;
use App\Enum\PhoneType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commons_phones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_primary',
        'type',
        'country_code',
        'area_code',
        'number_code',
        'number_line',
        'notes',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'is_primary',
        'country_code',
        'area_code',
        'number_code',
        'number_line',
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
            'is_primary' => 'boolean',
            'type' => PhoneType::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_number'];

    /**
     * Verified at accessor and mutator.
     *
     * @return Attribute
     */
    protected function fullNumber(): Attribute
    {
        return Attribute::make(
            get: static fn() => $this->country_code.' ('.$this->area_code.') '.$this->number_code.'-'.$this->number_line,
        );
    }
}
