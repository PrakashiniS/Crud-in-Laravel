<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Data
 * 
 * @property int $id
 * @property string $name
 * @property string $dept
 *
 * @package App\Models
 */
class Data extends Model
{
	protected $table = 'datas';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'dept'
	];
}
