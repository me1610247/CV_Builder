@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>CV Builder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        h1 {
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
        ul {
            list-style: disc;
            padding-left: 15px;
        }
        li {
            margin-bottom: 5px;
        }
        .contact-info {
            margin-bottom: 20px;
        }
        .btn-download {
            display: block;
            text-align: right;
            margin-bottom: 20px;
        }
        .link{
            text-decoration: none;
        }
        .contact-info {
    display: flex;
    flex-direction: column; /* Make sure the heading stays above the contact details */
}

.contact-details {
    display: flex;
    flex-wrap: wrap; /* Allows items to wrap to the next line if needed */
    gap: 20px; /* Space between items */
    justify-content: center;
    align-items: center
}

.contact-details p {
    margin: 0; /* Remove default margin for paragraphs */
}

    </style>
</head>
<body>
    <div class="btn-download">
        <a class="btn btn-danger" href="{{ route('downloadCV') }}">
            <i class="fas fa-file"></i>
        </a>
    </div>
    <h1>
        <span style="display: block;">{{ ucwords(Auth::user()->name) }}</span>
        <span style="display: block;">{{ ucwords(Auth::user()->role) }}</span>
    </h1>
    <div class="contact-info section">
        <h2>Contact Information</h2>
        <div class="contact-details">
            <p><strong>Email:</strong> <a class="link" href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>
            <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
            <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
            <p><a class="link" href="{{ Auth::user()->github }}">GitHub</a></p>
            <p><a class="link" href="{{ Auth::user()->linkedin }}">LinkedIn</a></p>
        </div>
    </div>
    
    
    <div class="professional-summary section">
        <h2>Professional Summary</h2>
        <p>{{ Auth::user()->brief }}</p>
    </div>
    <div class="education section">
        <h2>Education</h2>
        @foreach (Auth::user()->education as $education)
               <p> <strong>{{ $education->university }}</strong></p>
               <p> <strong>{{ $education->field }}</strong></p>
              <p>({{ Carbon::parse($education->start_date)->format('F Y') }} - {{ Carbon::parse($education->end_date)->format('F Y') }})</p>

              @endforeach
    </div>
    <div class="projects section">
        <h2>Projects</h2>
        <ul>
            @foreach (Auth::user()->projects as $project)
                <li><strong>{{ $project->title }}</strong></li>
                <p>{{$project->description}}</p>
                <p>Link: <a class="link" href="{{$project->link}}">GitHub</a></p>
                @endforeach
        </ul>
    </div>
    <div class="work-experience section">
        <h2>Work Experience</h2>
        <ul>
            @foreach (Auth::user()->experience as $job)
                    <li><p><strong>{{ $job->title }}</strong></p></li>
                    <p>{{$job->company}}</p>
                    <p>({{ Carbon::parse($job->start_date)->format('F Y') }} - {{ Carbon::parse($job->end_date)->format('F Y') }})</p>
                        <p>{{ $job->description }}</p>
            @endforeach
        </ul>
    </div>
    <div class="skills section">
        <h2>Skills</h2>
        <h3>Hard Skills</h3>
        <ul> 
            @foreach (Auth::user()->skills as $skill)
                <li>{{ $skill->skill }}</li>
            @endforeach
        </ul>
        <h3>Soft Skills</h3>
        <ul>
            @foreach (Auth::user()->skills as $skill)
                <li>{{ $skill->soft_skill }}</li>
            @endforeach
        </ul>
    </div>
    
    <div class="certificates section">
        <h2>Certificates</h2>
        <ul>
            @foreach (Auth::user()->certificate as $certificate)
                <li><strong>{{ $certificate->title }}</strong></li>
                <p>{{ $certificate->description }}</p>
            @endforeach
        </ul>
    </div>
</body>
</html>
