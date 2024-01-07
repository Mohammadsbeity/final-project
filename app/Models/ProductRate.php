<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductRate
 * 
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $rate_starts
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
class ProductRate extends Model
{
	use SoftDeletes;
	protected $table = 'product_rates';

	static $rules = [
		'product_id' => 'required',
		'user_id' => 'required',
		'rate_starts' => 'required',
    ];

    protected $perPage = 20;
	
	protected $casts = [
		'product_id' => 'int',
		'user_id' => 'int',
		'rate_starts' => 'int'
	];

	protected $fillable = [
		'product_id',
		'user_id',
		'rate_starts'
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
