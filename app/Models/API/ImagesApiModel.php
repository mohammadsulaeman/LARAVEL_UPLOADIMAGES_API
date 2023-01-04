<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesApiModel extends Model
{
    use HasFactory;
    public $table = "tbl_images";
    public $primaryKey = "id_images";
    public $fillable = ['cover','title'];
}
