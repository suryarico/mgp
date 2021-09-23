<?php

  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryMaster extends Model
{
	use HasFactory;
    protected $table = 'category_masters';
	
	
    protected $fillable = [
        'category_name','slug', 'created_by','updated_at'
    ];
	
	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'category_name'
            ]
        ];
    }
}
