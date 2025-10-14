<?php

namespace App\Models\Insurances;

use Carbon\Carbon;
use App\Enum\InsuranceType;
use App\Models\Commons\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'insurances_subscribers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sub';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['companies', 'profile'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sub',
        'icd_sub',
        'pid_sub',
        'profile_id',
        'type',
        'effective_date',
        'termination_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'sub',
        'icd_sub',
        'pid_sub',
        'profile_id',
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
            'type' => InsuranceType::class,
            'effective_date' => 'timestamp',
            'termination_date' => 'timestamp',
        ];
    }

    /**
     * Accessor / mutator for effective date.
     */
    protected function effectiveDate(): ?Attribute
    {
        return Attribute::make(
            get: static fn($value) => ($value) ? Carbon::parse($value)->format('M d, Y H:i') : null,
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Accessor / mutator for termination date.
     */
    protected function terminationDate(): ?Attribute
    {
        return Attribute::make(
            get: static fn($value) => ($value) ? Carbon::parse($value)->format('M d, Y H:i') : null,
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Get the insurances relationship
     *
     * @return HasOne
     */
    public function companies(): HasOne
    {
        return $this->hasOne(Company::class, 'icd', 'icd_sub')
            ->withDefault();
    }

    /**
     * Get the profile relationship
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'id', 'profile_id')
            ->withDefault();
    }
}
