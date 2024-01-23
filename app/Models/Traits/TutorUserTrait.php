<?php
namespace App\Models\Traits;

use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait TutorUserTrait
{

    /**
     * The curses that belong to the Tutor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_tutor');
    }

   



}