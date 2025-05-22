<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail'];


    public function getFullname(){
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getGenderTextAttribute()
    {
        switch ($this->gender) {
            case 1: return '男性';
            case 2: return '女性';
            case 3: return 'その他';
        }

    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $created_at)
    {
        if (!empty($created_at)) {
            $query->where('created_at', $created_at);
        }
    }

    

}
