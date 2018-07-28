<!DOCTYPE html>

<html>

<head>

    <title>MukolweCRM Automail</title>

</head>

<body>

<h1>New Lead Assigned</h1>

<p>{{session()->get('email') }} has made a new deal....</p>

<p>Lead Details...</p>
<ul>
    <li>{{$client_details->name}}</li>
    <li>
        @foreach($client_details['investment'] as $inv)
            {{$inv->investment}}&nbsp;millions.<hr/>
        @endforeach

    </li>
    <li>
        @foreach($client_details['investment'] as $inv)
            {{$inv->project}}<hr/>
        @endforeach
    </li>
</ul>

<br/>
<p>Thank you, from <a href="https://mukolwecrm.ga">mukolwecms</a></p>

</body>

</html>
