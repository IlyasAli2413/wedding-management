<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingVenueMapping extends Model
{
    protected $table = 'wedding_venue_mapping';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['Wedding_ID', 'Venue_ID'];

    protected $primaryKey = ['Wedding_ID', 'Venue_ID'];
    protected $keyType = 'int';

    // Required for composite key
    public function getKey()
    {
        return [$this->Wedding_ID, $this->Venue_ID];
    }

    public function wedding()
    {
        return $this->belongsTo(Wedding::class, 'Wedding_ID', 'Wedding_ID');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'Venue_ID', 'Venue_ID');
    }
}
