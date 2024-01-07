<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $category_name
 * @property string|null $category_icon
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Category extends Model
{
	use SoftDeletes;
	protected $table = 'categories';

	static $rules = [
		'category_name' => 'required',
    ];

    protected $perPage = 20;
	
	protected $fillable = [
		'category_name',
		'category_icon'
	];
}
