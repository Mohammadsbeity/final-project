<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductSold
 * 
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $final_price
 * @property string $payment_method
 * @property Carbon $purshase_date
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
class ProductSold extends Model
{
	use SoftDeletes;
	protected $table = 'product_solds';

	static $rules = [
		'product_id' => 'required',
		'user_id' => 'required',
		'final_price' => 'required',
		'payment_method' => 'required',
		'purshase_date' => 'required',
    ];

    protected $perPage = 20;

	protected $casts = [
		'product_id' => 'int',
		'user_id' => 'int',
		'purshase_date' => 'datetime'
	];

	protected $fillable = [
		'product_id',
		'user_id',
		'final_price',
		'payment_method',
		'purshase_date'
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
