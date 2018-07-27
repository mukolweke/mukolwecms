<!DOCTYPE html>

<html>

<head>

    <title>MukolweCRM Automail</title>

</head>

<body>

<h1>New Lead Assigned</h1>

<p>{{$data['advisor_details']-> name }} has been assigned a new lead....</p>

<p>Lead Details...</p>
<ul>
    <li>{{$data['lead_details']->name}}</li>
    <li>{{$data['lead_details']->source}}</li>
    <li>{{$data['lead_details']->description}}</li>
    <li>{{$data['lead_details']->name}}</li>
</ul>

<br/>
<p>Thank you, from <a href="https://mukolwecrm.ga">mukolwecms</a></p>

</body>

</html>
