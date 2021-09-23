<?php

  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubcategoryMaster extends Model
{
    protected $table = 'sub_category_master';
	
	
    protected $fillable = [
       'category_id','slug', 'sub_category_name', 'sub_category_text', 'created_by','updated_at'
    ];
}
