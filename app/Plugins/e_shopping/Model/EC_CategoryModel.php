<?php
/**
 * Created by PhpStorm.
 * User: Mortenaho
 * Date: 7/12/2021
 * Time: 9:53 PM
 */

namespace App\Plugins\e_shopping\Model;


use Illuminate\Database\Eloquent\Model;

class EC_CategoryModel extends Model
{
    protected $table="ec_category";
    protected $fillable = [
        'title',
        'parent',
        'has_child',
        'icon'

     ];
    public $timestamps=false;
}