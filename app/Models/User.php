<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;


    protected $fillable = [
        'user_id',
        'user_nama',
        'user_alamat',
        'user_username',
        'user_password',
        'user_email',
        'user_notelp',
        'user_level',
    ];

    protected static function register ($data)
    {
        return self::create($data);
    }

    protected static function upload_profile ($id, $data)
{
    $user = self::find($id);

    if ($user->user_pict_url) {
        Storage::delete($user->user_pict_url);
    }

    if ($data) {
        $path = $data->store('public/profile_pictures');
        $user->user_pict_url = $path;
    }

    $user->save();
}


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'string',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }




}
