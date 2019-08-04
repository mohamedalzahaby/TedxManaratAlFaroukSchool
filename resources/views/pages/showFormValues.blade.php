<ul style="list-style-type:circle">
    <li><label> {{'registrationFormName'}}</label><br></li>
    @foreach ($All_Users_QandA as $value)
        <li><label>First name</label></li>
        @php
            $user = $value['user'];
            $questions = $value['questions'];
            $values = $value['values'];
        @endphp
        <li><p> {{$user->fname}}</p></li>
        <li><label>Last name</label></li>
        <li><p> {{$user->lname}}</p></li>
        <li><label>Email</label></li>
        <li><p> {{$user->email}}</p></li>
        <li><label>Birth Date</label></li>
        <li><p> {{$user->birthDate}}</p></li>
        <li><label>Gender</label></li>
        <li><p> {{$user->ismale = ($user->ismale)? 'Male': 'Female'}}</p></li>
        <li><label>User Type</label></li>
        <li><p> {{$user->userTypeId}}</p></li>
        @for ($i = 0; $i < sizeof($values); $i++)
            <li><label> {{$questions[$i]->name}}</label></li>
            <li><p> {{$values[$i]->value}}</p></li>
        @endfor
    @endforeach

</ul>
<a href="../testt"><button>test</button></a>
