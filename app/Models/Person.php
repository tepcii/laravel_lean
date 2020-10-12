<?php

namespace App\Models;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Board;

class Person extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150',
    );

    public function boards()
    {
        return $this->hasMany(Board::class);
    }

    // use HasFactory;
    public function getData()
    {
        return $this->id . ': ' . $this->name . ' （' . $this->age . '）';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }

    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope(new ScopePerson());
    }
}
