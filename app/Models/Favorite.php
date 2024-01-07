<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Favorite
 * 
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
class Favorite extends Model
{
	protected $table = 'favorites';
	public $timestamps = false;

	static $rules = [
		'user_id' => 'required',
		'product_id' => 'required',
    ];

    protected $perPage = 20;
	
	protected $casts = [
		'user_id' => 'int',
		'product_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'product_id'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
