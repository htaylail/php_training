<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select("name", "grade","major_id")->get();
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["name", "grade", "major_id"];
    }
}
