<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function Fact($n, $c)
    {
        // for ($i = 1; $i <= $n; $i++) {
        // echo "</br>" . $i;

        // }
        // echo $c = $i * $j;
        $b = $n % $c;
        echo $b;
    }
    public function categoryWhere()
    {
    }
}
