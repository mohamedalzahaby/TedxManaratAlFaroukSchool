@foreach ($data as $value)
    @php
        dd($data);
        $user = $value['user'];
        $questions = $value['questions'];
        $answers = $value['values'];
    @endphp
    <form>
        <div>
            <b><label>first Name :</label></b>
            <p>{{$user->fname}}</p>
        </div>
        <div>
            <b><label>Last Name :</label></b>
            <p>{{$user->lname}}</p>
        </div>
        <div>
            <b><label>Email :</label></b>
            <p>{{$user->email}}</p>
        </div>
        <div>
            <b><label>Gender :</label></b>
            <p>{{$user->ismale = ($user->ismale)? 'Male': 'Female'}}</p>
        </div>
        <div>
            <b><label>Birth Date :</label></b>
            <p>{{$user->birthDate}}</p>
        </div>
        @foreach ($questions as $key => $question)
            <div>
                <b><label>{{$question->name}} :</label></b>
                <p>{{$answers[$key]->value}}</p>
            </div>
        @endforeach
    </form>
@endforeach

