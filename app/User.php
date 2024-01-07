<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Favorite[] $favorites
 * @property ProductComment[] $productComments
 * @property ProductRate[] $productRates
 * @property ProductSold[] $productSolds
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    static $rules = [
		'name' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany('App\Favorite', 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productComments()
    {
        return $this->hasMany('App\ProductComment', 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productRates()
    {
        return $this->hasMany('App\ProductRate', 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSolds()
    {
        return $this->hasMany('App\ProductSold', 'user_id', 'id');
    }
    

}
