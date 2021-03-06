<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $timestamps = false; 
    protected $fillable = [
    	'material_name','material_desc','material_status'
    ];
    protected $primaryKey = 'material_id';
 	protected $table = 'tbl_material';
}
