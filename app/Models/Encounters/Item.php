<?php

namespace App\Models\Encounters;

use App\Models\Codes\Custom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'encounters_items';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'itm';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['code_detail'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fee',
        'units',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'itm',
        'enc_itm',
        'code',
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
            'fee' => 'decimal:2',
            'units' => 'integer',
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['formatted_fee'];

    /**
     * Accessor / mutator for the date of discharge.
     */
    protected function formattedFee(): ?Attribute
    {
        return Attribute::make(
            get: fn($value) => '$'.number_format($this->fee, 2, ',', '.'),
        );
    }

    /**
     * Get the items relationship
     *
     * @return HasOne
     */
    public function code_detail(): HasOne
    {
        return $this->hasOne(Custom::class, 'id', 'code');
    }
}
