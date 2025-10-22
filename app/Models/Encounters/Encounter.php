<?php

namespace App\Models\Encounters;

use Carbon\Carbon;
use App\Models\Doctors\Doctor;
use App\Models\Patients\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Encounter extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'date_of_entry';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'enc';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['rendering_doctor', 'referring_doctor', 'ordering_doctor', 'supervising_doctor', 'items'];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'date_of_service',
        'date_of_entry',
        'date_of_service_to',
        'date_of_admission',
        'date_of_discharge',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'pid_enc',
        'rendering_id',
        'referring_id',
        'ordering_id',
        'supervising_id',
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
            'date_of_service' => 'timestamp',
            'date_of_entry' => 'timestamp',
            'date_of_service_to' => 'date',
            'date_of_admission' => 'date',
            'date_of_discharge' => 'date',
        ];
    }

    /**
     * Accessor / mutator for the date of service.
     */
    protected function dateOfService(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Carbon::parse($value)->format('M d, Y H:i'),
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Accessor / mutator for the date of entry.
     */
    protected function dateOfEntry(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Carbon::parse($value)->format('M d, Y H:i'),
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Accessor / mutator for the date of service to.
     */
    protected function dateOfServiceTo(): ?Attribute
    {
        return Attribute::make(
            get: static fn($value) => ($value) ? Carbon::parse($value)->format('M d, Y H:i') : null,
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Accessor / mutator for the date of admission.
     */
    protected function dateOfAdmission(): ?Attribute
    {
        return Attribute::make(
            get: static fn($value) => ($value) ? Carbon::parse($value)->format('M d, Y H:i') : null,
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Accessor / mutator for the date of discharge.
     */
    protected function dateOfDischarge(): ?Attribute
    {
        return Attribute::make(
            get: static fn($value) => ($value) ? Carbon::parse($value)->format('M d, Y H:i') : null,
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Get the patient relationship
     *
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'pid', 'enc_pid')
            ->withDefault();
    }

    /**
     * Get the rendering doctor relationship
     *
     * @return BelongsTo
     */
    public function rendering_doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'rendering_id', 'did')
            ->withDefault();
    }

    /**
     * Get the referring doctor relationship
     *
     * @return BelongsTo
     */
    public function referring_doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'referring_id', 'did')
            ->withDefault();
    }

    /**
     * Get the ordering doctor relationship
     *
     * @return BelongsTo
     */
    public function ordering_doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'ordering_id', 'did')
            ->withDefault();
    }

    /**
     * Get the supervising doctor relationship
     *
     * @return BelongsTo
     */
    public function supervising_doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'supervising_id', 'did')
            ->withDefault();
    }

    /**
     * Get the items relationship
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'enc_itm', 'enc');
    }
}
