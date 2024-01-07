<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductComment
 * 
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $comment
 * @property bool $is_reply
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Product $product
 * @property User $user
 *
 * @package App\Models
 */
class ProductComment extends Model
{
	use SoftDeletes;
	protected $table = 'product_comments';

	static $rules = [
		'product_id' => 'required',
		'user_id' => 'required',
		'comment' => 'required',
		'is_reply' => 'required',
    ];

    protected $perPage = 20;
	
	protected $casts = [
		'product_id' => 'int',
		'user_id' => 'int',
		'is_reply' => 'bool'
	];

	protected $fillable = [
		'product_id',
		'user_id',
		'comment',
		'is_reply'
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
