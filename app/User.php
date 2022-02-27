<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function threads()
    {
    	return $this->hasMany(Thread::class);
    }

    public function isAdmin()
    {
        // dd($this->role());
        // if (!$this->role("role")->exists()) {
        //     // dd('sim');
        //     flash('É Preciso cadastrar algum papel para ter aceso aos tópicos!')->warning();
        //     return redirect()->route('threads.index');
        // }

        // deixar valor padrão de ROLE do usuario ao criar para evitar erro!

    	return $this->role->role == 'ROLE_ADMIN';

    }

    public function role()
    {
    	return $this->belongsTo(Role::class);
    }
}
