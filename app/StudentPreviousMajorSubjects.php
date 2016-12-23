<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class StudentPreviousMajorSubjects extends Model {
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    //protected $fillable = array('weight', 'bear_id');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'students_previous_major_subjects';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function bear() {
        return $this->belongsTo('App\Bear');
    }

}
