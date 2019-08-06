@php
    $user = $data['user'];
    $questions = $data['questions'];
    $answers = $data['values'];
@endphp
<form>
    <div>
        <label><b>first Name :</b></label>
        <p>{{$user->fname}}</p>
    </div>
    <div>
        <label><b>Last Name :</b></label>
        <p>{{$user->lname}}</p>
    </div>
    <div>
        <label><b>Email :</b></label>
        <p>{{$user->email}}</p>
    </div>
    <div>
        <label><b>Gender :</b></label>
        <p>{{$user->ismale = ($user->ismale)? 'Male': 'Female'}}</p>
    </div>
    <div>
        <label><b>Birth Date :</b></label>
        <p>{{$user->birthDate}}</p>
    </div>
    @foreach ($questions as $key => $question)
        <div>
            <label><b>{{$question->name}} :</b></label>
            <p>{{$answers[$key]->value}}</p>
        </div>
    @endforeach
</form>


