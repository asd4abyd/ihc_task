<?php
/**
* A auto generate Controller for Laravel 5, to serve <textbooks> table
* Generated for Laravel 5.5.49 on 2020-07-04.
*
* @author   Abdelqader Osama Al Dweik <asd.abyd@gmail.com>
* @see      https://github.com/asd4abyd/crud-generator
* @see      http://abyd.net
*
*/

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
* Class Textbook* @package App*
* @mixin \Eloquent
*/
class Textbook extends Model
{

    

    protected $fillable =
        ['school_id', 'material_id', 'class_id', 'title_en', 'title_ar', 'created_at', 'updated_at'];

}
