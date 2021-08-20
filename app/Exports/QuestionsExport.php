<?php

namespace App\Exports;

use App\Models\category;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class QuestionsExport implements
    FromCollection,
    WithMapping,
    WithHeadings,
    ShouldAutoSize,
    WithMultipleSheets,
    WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Question::with('category', 'vocabulary')->get();
    }

    public function map($question): array
    {
        return [
            $question->id,
            $question->category->name,
            $question->vocabulary->name,
            $question->question,
            $question->a,
            $question->b,
            $question->c,
            $question->d,
            $question->answer
        ];
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        $categories = category::all();

        foreach ($categories as $category) {
            $sheets[] = new MultiplechoiceQuestionSheet($category);
        }

        return $sheets;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Category',
            'Vocabulary',
            'Question',
            'A',
            'B',
            'C',
            'D',
            'Answer'

        ];
    }
}