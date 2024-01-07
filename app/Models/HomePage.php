<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HomePage
 * 
 * @property int $id
 * @property string $image
 * @property bool $is_active
 *
 * @package App\Models
 */
class HomePage extends Model
{
	protected $table = 'home_page';
	public $timestamps = false;

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'image',
		'is_active'
	];
}
