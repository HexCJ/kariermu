<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nilai';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nisn',
        'semester',
        'mata_pelajaran',
        'nilai',
        'status',
        'pesan',
    ];

    /**
     * Get the user that owns the report.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'nisn', 'nisn');
    }

    /**
     * Get the semester for the score.
     */
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester', 'id_semester');
    }

    /**
     * Get the subject for the score.
     */
    public function subject()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran', 'id_mata_pelajaran');
    }
}
