{{$stt = 1}}
@foreach($lessons->questions as $question)
<tr>
    <td>{{$stt++}}</td>
    <td>{{$question->question}}</td>
    <td>{{$question->category->name}}</td>
    <td>{{$question->vocabulary->name}}</td>
    <td>{{$question->a}}</td>
    <td>{{$question->b}}</td>
    <td>{{$question->c}}</td>
    <td>{{$question->d}}</td>
    <td>{{$question->answer}}</td>
</tr>
@endforeach
