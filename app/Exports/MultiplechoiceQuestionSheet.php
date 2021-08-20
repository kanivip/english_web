<?php

namespace App\Exports;

use App\Models\category;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\question;

class MultiplechoiceQuestionSheet implements
    FromCollection,
    WithMapping,
    WithHeadings,
    ShouldAutoSize,
    WithTitle,
    WithStyles
{
    private $category;

    public function __construct(category $category)
    {
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Question::with('category', 'vocabulary')->where('category_id', $this->category->id)->get();
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

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->category->name;
    }
}