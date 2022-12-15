<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="header-container">
        <ul>
            <a href="#" class="active"><li>HOME</li></a>
            <a href="#" class="menu-btn"><li>ABOUT</li></a>
            <a href="#" class="menu-btn"><li>ANNOUNCEMENTS</li></a>
            <a href="#" class="menu-btn"><li>BAC SCHEDULES</li></a>
            <a href="/app" class="menu-btn"><li>LOGIN</li></a>
            <a href="/register" class="menu-btn"><li>REGISTER</li></a>
        </ul>
    </div>

    <div class="landing-image"></div>

    <div class="announcement-container">
        <h1>Announcements</h1>
        @foreach (\App\Models\Announcement::latest()->take(5)->get() as $item)
        <center>
            <a href="#">
                <div class="announcement-1" style="background: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(117, 26, 19, 0.73)),
                url(/storage/{{$item->image}}) center/cover no-repeat;">
                    <div class="tag"><span>Announcement</span></div>
                    <!-- <img src="img/announcement1.jpg" width="70%" height="400" alt=""> -->
                    <div class="announcement-content">
                        <div class="date-posted">
                            <i class="fa-solid fa-calendar-days"></i> {{$item->created_at->format('M d, Y')}}
                        </div>
                        <div class="announcement-title">
                            <h2>{{$item->title}}</h2>
                        </div>
                    </div>
                </div>
            </a>
        </center>
        @endforeach

        <center>
            <div class="load-more-announcement">
                <a href="#"><i class="fa-solid fa-angles-down"></i> See more...</a>
            </div>
        </center>
    </div>

    <div class="upcoming-schedule">
        <div class="schedule-header">
            <h1>UPCOMING SCHEDULE</h1>
            {{-- <a href="#"><i class="fa-regular fa-calendar-days"></i> View Calendar</a> --}}
        </div>
        <div class="upcoming-schedule-content">
           @foreach (\App\Models\Event::whereDate('datetime', '>=',  now())->orderBy('datetime', 'ASC')->latest()->take(10)->get() as $item)
            <div class="upcoming-container">
                <div class="calendar-card">
                    <div class="upcoming-card-header">
                        {{$item->datetime->format('d')}}
                    </div>
                    <div class="upcoming-card-body">
                        {{ $item->datetime->format('M Y') }}
                    </div>
                </div>
                <div class="upcoming-title">
                    <h3>{{$item->name}}</h3>
                    <h5>Event</h5>
                </div>
            </div>
           @endforeach

        </div>
    </div>

    <div class="background background-filter">
        <h1 class="u-non-blurred">About Us</h1>
        <p class="p-non-blurred">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique soluta magni, commodi deserunt tempora suscipit laudantium provident sunt nobis modi consequuntur ea laborum aspernatur dignissimos, corrupti beatae? Beatae tenetur, ex culpa aut expedita reprehenderit magnam aliquid inventore deserunt repellendus doloribus incidunt assumenda animi mollitia nesciunt ratione. In harum accusamus pariatur!
        </p>
        <div class="p-non-blurred div">
            <a href="#">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>


    <div class="footer">
        <div class="footer-section">
            <h4>CNSC Bids and Awards Committee</h4>
            <span><i class="fa-solid fa-house"></i> Complete Address Here</span>
            <span><i class="fa-solid fa-phone"></i> +63 912 345 6789</span>
            <span><i class="fa-solid fa-envelope"></i> emailaddress@email.com</span>
        </div>
        <div class="footer-section">
            <h4>Resources</h4>
            <span><li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li></span>
            <span><li>Lorem ipsum dolor sit amet consectetur.</li></span>
            <span><li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li></span>
        </div>
        <div class="footer-section">
            <h4>Social Media</h4>
            <span><a href="#" class="fb"><i class="fa-brands fa-facebook"></i> Facebook Here</a></span>
            <span><a href="#" class="tw"><i class="fa-brands fa-twitter"></i> Twitter Here</a></span>
            <span><a href="#" class="ig"><i class="fa-brands fa-instagram"></i> Instagram Here</a></span>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
