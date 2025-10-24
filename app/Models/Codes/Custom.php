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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['formatted_default_fee'];

    /**
     * Accessor / mutator for the date of discharge.
     */
    protected function formattedDefaultFee(): ?Attribute
    {
        return Attribute::make(
            get: fn($value) => '$'.number_format($this->default_fee, 2, ',', '.'),
        );
    }

    /**
     * Retrieve the model via keybinding multiple columns.
     * This allows for URLs to be like /master/code/cpt4:49669/details
     * The cpt4:49669 is binding the model
     *
     * @param $value
     * @param $field
     * @return Model|null
     */
    public function resolveRouteBinding($value, $field = null): ?Model
    {
        // Split the value by a delimiter (e.g., hyphen)
        $parts = explode(config('defaults.slug_split'), $value);
        if (count($parts) !== 2) {
            return null;
        }
        [$column1Value, $column2Value] = $parts;
        return $this->where('type', $column1Value)
            ->where('code', $column2Value)
            ->firstOrFail();
    }
}
