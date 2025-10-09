<?php

namespace App\Models\Commons;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED_AT = 'registration_date';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commons_profiles';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['email', 'primary_address', 'secondary_address', 'primary_phone', 'secondary_phone'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'email_address_id',
        'primary_address_id',
        'secondary_address_id',
        'primary_phone_id',
        'secondary_phone_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'email_address_id',
        'primary_address_id',
        'secondary_address_id',
        'primary_phone_id',
        'secondary_phone_id',
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
            'birthdate' => 'datetime',
            'registration_date' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name', 'initials'];

    /**
     * Accessor / mutator for the full_name field.
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn(
            ) => Str::rtrim(Str::title(Str::lower($this->last_name)).', '.Str::title(Str::lower($this->first_name)).' '.Str::title(Str::lower($this->middle_name))),
        );
    }

    /**
     * Accessor  for the abbreviated rendering doctor.
     */
    protected function initials(): Attribute
    {
        return Attribute::make(
            get: fn() => Str::ucfirst(Str::substr($this->last_name, 0,
                    1)).Str::ucfirst(Str::substr($this->first_name, 0, 1)).Str::ucfirst(Str::substr($this->middle_name, 0, 1)),
        );
    }

    /**
     * Accessor / mutator for the birthdate field.
     */
    protected function birthdate(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Carbon::parse($value)->format('M d, Y'),
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d')
                : $value,
        );
    }

    /**
     * Accessor / mutator for the created_at field.
     */
    protected function registrationDate(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => Carbon::parse($value)->format('M d, Y H:i'),
            set: static fn($value) => is_string($value)
                ? Carbon::parse($value)->format('Y-m-d H:i:s')
                : $value,
        );
    }

    /**
     * Get the email relationship
     *
     * @return HasOne
     */
    public function email(): hasOne
    {
        return $this->hasOne(Email::class, 'id', 'email_address_id')
            ->withDefault();
    }

    /**
     * Get the main address relationship
     *
     * @return HasOne
     */
    public function primary_address(): hasOne
    {
        return $this->hasOne(Address::class, 'id', 'primary_address_id')
            ->withDefault();
    }

    /**
     * Get the address relationship
     *
     * @return HasOne
     */
    public function secondary_address(): hasOne
    {
        return $this->hasOne(Address::class, 'id', 'secondary_address_id')
            ->withDefault();
    }

    /**
     * Get the main phone relationship
     *
     * @return HasOne
     */
    public function primary_phone(): hasOne
    {
        return $this->hasOne(Phone::class, 'id', 'primary_phone_id')
            ->whereIsPrimary(true)
            ->withDefault();
    }

    /**
     * Get the phone relationship
     *
     * @return HasOne
     */
    public function secondary_phone(): hasOne
    {
        return $this->hasOne(Phone::class, 'id', 'secondary_phone_id')
            ->whereIsPrimary(false)
            ->withDefault();
    }
}
