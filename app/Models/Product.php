<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * 
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $product_name
 * @property string $product_price
 * @property string $details
 * @property bool $is_sold
 * @property bool $admin_approved
 * @property Carbon $approval_date
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Favorite[] $favorites
 * @property Collection|ProductComment[] $product_comments
 * @property Collection|ProductImage[] $product_images
 * @property Collection|ProductRate[] $product_rates
 * @property Collection|ProductSold[] $product_solds
 *
 * @package App\Models
 */
class Product extends Model
{
	use SoftDeletes;
	protected $table = 'products';

	static $rules = [
		'category_id' => 'required',
		'user_id' => 'required',
		'product_name' => 'required',
		'product_price' => 'required',
		'details' => 'required',
		'is_sold' => 'required',
		'approval_date' => 'required',
    ];

    protected $perPage = 20;
	
	protected $casts = [
		'category_id' => 'int',
		'user_id' => 'int',
		'is_sold' => 'bool',
		'admin_approved' => 'bool',
		'approval_date' => 'datetime'
	];

	protected $fillable = [
		'category_id',
		'user_id',
		'product_name',
		'product_price',
		'details',
		'is_sold',
		'admin_approved',
		'approval_date'
	];

	public function favorites()
	{
		return $this->hasMany(Favorite::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function product_comments()
	{
		return $this->hasMany(ProductComment::class);
	}

	public function product_images()
	{
		return $this->hasMany(ProductImage::class);
	}

	public function product_rates()
	{
		return $this->hasMany(ProductRate::class);
	}

	public function product_solds()
	{
		return $this->hasMany(ProductSold::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
