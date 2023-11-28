<?php

namespace App\Models;

use App\Models\FoundItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoundItemDescription extends Model
{
    use HasFactory;

    protected $fillable = ['category','dateFound','color','model','found_item_id'];

    public function foundItem(){
        return $this->belongsTo(FoundItem::class);
    }
}
