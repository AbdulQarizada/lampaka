<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FirstName',
        'LastName',
        'FullName',
        'Job',
        'Gender_ID',
        'Tazkira_ID',
        'PrimaryNumber',
        'SecondaryNumber',
        'Province_ID',
        'District_ID',
        'Village',
        'email',
        'password',
        'DOB',
        'Profile',
        'IsEmployee',
        'IsActive',
        'IsSuperAdmin',
        'IsOrphanSponsor',
        'IsOrphanRelief',
        'IsAidAndRelief',
        'IsWash',
        'IsEducation',
        'IsInitiative',
        'IsMedicalSector',
        'IsFoodAppeal',
        'IsQamarCareCard',
        'IsAppealsDistributions',
        'IsDonorsAndDonorBoxes',
        'IsVolunteer',
        'IsRepresentative',
        'IsGeneralManager',
        'IsManager',
        'Status',
        'Created_By',
        'Owner',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



}
