@extends('layouts.master')

@section('title')
    About
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 id = "heading">About me</h1>
            <p><a class="btn btn-primary btn-lg" href="/" role="button" id = "learn">Back to index &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">
                <h2>Sean Lim</h2>
                <p>Now this is a story all about how
                My life got flipped-turned upside down
                And I'd like to take a minute
                Just sit right there
                I'll tell you how I became the prince of a town called Bel-Air

                In west Philadelphia born and raised
                On the playground was where I spent most of my days
                Chillin' out maxin' relaxin' all cool
                And all shooting some b-ball outside of the school
                When a couple of guys who were up to no good
                Started making trouble in my neighborhood
                I got in one little fight and my mom got scared
                She said, "You're movin' with your auntie and uncle in Bel-Air."

                I begged and pleaded with her day after day
                But she packed my suitcase and sent me on my way
                She gave me a kiss and then she gave me my ticket.
                I put my Walkman on and said, "I might as well kick it."

                First class, yo, this is bad
                Drinking orange juice out of a champagne glass.
                Is this what the people of Bel-Air living like?
                Hmm, this might be alright.</p>

                <p>But wait I hear they're prissy, bourgeois, all that
                Is this the type of place that they just send this cool cat?
                I don't think so
                I'll see when I get there
                I hope they're prepared for the prince of Bel-Air

                Well, the plane landed and when I came out
                There was a dude who looked like a cop standing there with my name out
                I ain't trying to get arrested yet
                I just got here
                I sprang with the quickness like lightning, disappearedI whistled for a cab and when it came near
                The license plate said "Fresh" and it had dice in the mirror
                If anything I could say that this cab was rare
                But I thought, "Nah, forget it."
                – "Yo, home to Bel-Air."

                I pulled up to the house about 7 or 8
                And I yelled to the cabbie, "Yo home smell ya later."
                I looked at my kingdom
                I was finally there
                To sit on my throne as the Prince of Bel-Air</p>
            </div>
            <div class="col-md-4">
                <p><img id = "avatar" alt = "Photo of Sean Lim" src = "/images/me.jpg" class="img-responsive"/></p>
            </div>
        </div>
    </div>
@stop