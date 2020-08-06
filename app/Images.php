<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Images extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'id', 'language', 'title', 'link', 'order', 'botton_text', 'text_color', 'botton_color', 'botton_text_color', 'animation_title', 'animation_description', 'animation_button', 'desktop_image', 'mobile_image', 'is_active', 'is_deleted', 'created_at', 'updated_at']
    ;
}