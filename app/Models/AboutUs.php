<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AboutU
 * 
 * @property int $id
 * @property string $text
 * @property string|null $image
 *
 * @package App\Models
 */
class AboutUs extends Model
{
	protected $table = 'about_us';
	public $timestamps = false;

	static $rules = [
		'text' => 'required',
    ];

    protected $perPage = 20;
	
	protected $fillable = [
		'text',
		'image'
	];
}
