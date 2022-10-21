<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notary extends Model {

    use HasFactory;

    protected $guarded = [];

    protected $casts = ['receipt_date' => 'datetime'];

    public static function recordsList(): array {
        return [
            'Доверенность',
            'Наследство',
            'Справка',
        ];
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
