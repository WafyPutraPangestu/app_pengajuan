<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';  
    protected $fillable = ['name', 'image', 'created_by', 'updated_by', 'deleted_by'];
    
    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function createdBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy() : BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
   
}
