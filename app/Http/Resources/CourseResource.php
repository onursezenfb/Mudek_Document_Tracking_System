<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'course_code' => $this->course_code,
            'course_name' => $this->course_name,
            'program_code' => $this->program_code,
            'exam_count' => $this->exam_count,
            'term' => $this->term,
            'crn' => $this->crn,
            'section_code' => $this->section_code
        ];
    }
}
