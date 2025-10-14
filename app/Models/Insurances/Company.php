<?php

namespace App\Models\Insurances;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'insurances_companies';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'icd';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'attention',
        'effective_date',
        'termination_date',
        'participating',
        'self_pay',
        'do_not_bill',
        'do_not_import',
        'payer_id',
        'payer_id_eligibility',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'icd',
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
            'effective_date' => 'timestamp',
            'termination_date' => 'timestamp',
            'participating' => 'boolean',
            'self_pay' => 'boolean',
            'do_not_bill' => 'boolean',
            'do_not_import' => 'boolean',
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
}
