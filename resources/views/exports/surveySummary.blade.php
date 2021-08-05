<table>
    <thead>
        <tr>
            <th rowspan="2">Encuesta</th>
            @foreach($sections as $section)
                @php($auxcol=count($section['questions']))
                <th colspan="{{ $auxcol }}">{{ $section["name"] }}</th>    
            @endforeach
        </tr>
        <tr>
            @foreach($sections as $section)
                @foreach($section['questions'] as $question)
                    <th>{{ $question["name"] }}</th>    
                @endforeach
            @endforeach
        </tr>
    </thead>


    <tbody>
    @foreach($participants as $participant)
    <tr>
        <td>{{ $participant["dt_finish"] }}</td>
        @foreach($sections as $section)
            @foreach($section['questions'] as $question)
                @php($aux_respuesta = "")
                @foreach($participant['survey_details'] as $part_answers)
                    @if($question["id"]==$part_answers["question_id"])
                        @php($aux_respuesta = ($part_answers["detail"]!="") ? $part_answers["detail"] : @$part_answers["answer"]["name"] ." - ".@$part_answers["answer"]["value"] )
                    @endif    
                @endforeach
                <td>{{ $aux_respuesta }}</td>
            @endforeach
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>