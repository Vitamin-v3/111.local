<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int $int)
 * @method static withTrashed(int $int)
 * @method static find(int $int)
 * @method static create(string[] $array)
 */
class Post extends Model
{
        use HasFactory;
        use SoftDeletes;            // добавляем использование "мягкого удаления"

    protected $table = 'posts';     // желательно явно прописывать название таблицы (хотя оно и создалось вместе с миграцией)

    protected $guarded = [];        // разрешаем изменение/сохранение всех атрибутов в базе данных (т.е. ничего защищать не нужно)
//    protected $guarded = false;     // или вот так

    //protected $fillable = ['title', 'content']; // разрешаем именение каких-то конкретных полей в базе данных

}
