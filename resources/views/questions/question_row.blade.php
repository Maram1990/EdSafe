<tr>
    <td>{{ $question->id }}</td>
    <td>{{ $question->questiontext }}</td>
    <td>{{ $question->questioncategory->name }}</td>
    <td><img src="/images/{{ $question->imgpath }}" width="80px"></td>
    <td>
        <!-- Your action buttons here -->
    </td>
</tr>
