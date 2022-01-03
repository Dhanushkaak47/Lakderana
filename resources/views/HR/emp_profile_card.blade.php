<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Poiret+One|Open+Sans);
html,
body {
  width: 100%;
  margin: 0;
  padding: 0;
  background-color: #fffff0;
}

aside {
  position: relative;
  display: block;
  height: 66vh;
  overflow: hidden;
  margin: auto;
  margin-top: 10vh;
  text-align: center;
  padding: 5em;
  box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
  -webkit-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
  -moz-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
  -o-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
  -webkit-animation: shadow 1s linear forwards;
  -moz-animation: shadow 1s linear forwards;
  animation: shadow 1s linear forwards;
  -webkit-animation-delay: .5s;
  -moz-animation-delay: .5s;
  animation-delay: .5s;
}

@-moz-keyframes shadow {
  from {
    box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -webkit-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -moz-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -o-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    max-width: 0em;
  }
  to {
    box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -webkit-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -moz-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -o-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    max-width: 30em;
  }
}

@keyframes shadow {
  from {
    box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -webkit-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -moz-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -o-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    max-width: 0em;
  }
  to {
    box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -webkit-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -moz-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -o-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    max-width: 30em;
  }
}

@-webkit-keyframes shadow {
  from {
    box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -webkit-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -moz-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    -o-box-shadow: 0 0 6em -6em #000000, 0 0 6em -6em #000000;
    max-width: 0em;
  }
  to {
    box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -webkit-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -moz-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    -o-box-shadow: -4em 0 6em -6em #000000, 4em 0 6em -6em #000000;
    max-width: 30em;
  }
}

header img {
  width: 10em;
  opacity: 0;
  border-radius: 50%;
  box-shadow: .25em .25em .75em 0 #999;
  -webkit-box-shadow: .25em .25em .75em 0 #999;
  -moz-box-shadow: .25em .25em .75em 0 #999;
  -o-box-shadow: .25em .25em .75em 0 #999;
  -webkit-animation: circle .5s linear forwards;
  -moz-animation: circle .5s linear forwards;
  animation: circle .5s linear forwards;
  -webkit-animation-delay: 2s;
  -moz-animation-delay: 2s;
  animation-delay: 2s;
  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -ms-transition: all .5s ease;
  -kthtml-transition: all .5s ease;
  transition: all .5s ease;
}

@-webkit-keyframes circle {
  from {
    opacity: 0;
  }
  to {
    opacity: 100;
  }
}

@-moz-keyframes circle {
  from {
    opacity: 0;
  }
  to {
    opacity: 100;
  }
}

@keyframes circle {
  from {
    opacity: 0;
  }
  to {
    opacity: 100;
  }
}

header img:hover {
  box-shadow: -.25em .25em .75em 0 #999;
  -webkit-box-shadow: 0em 0em 1em 0 #999;
  -moz-box-shadow: -.25em .25em .75em 0 #999;
  -o-box-shadow: -.25em .25em .75em 0 #999;
  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -ms-transition: all .5s ease;
  -kthtml-transition: all .5s ease;
  transition: all .5s ease;
}

header {
  font: 1.25em/1em poiret one, sans-serif;
  letter-spacing: .5em;
  text-transform: uppercase;
}

header h2 {
  font-size: .75em;
}

.profile-bio {
  font: 1.3em/1.25em open sans, sans-serif;
  font-variant: small-caps;
  letter-spacing: .025em;
  margin-top: 2em;
}

ul {
  padding: 0;
  margin: 0 auto;
}

ul li {
  list-style: none;
  display: inline-block;
  margin-top: 1em;
}

ul li svg {
  width: 2em;
  margin: 0 3.5em;
  -webkit-transition: all .15s ease;
  -o-transition: all .15s ease;
  -moz-transition: all .15s ease;
  -ms-transition: all .15s ease;
  -kthtml-transition: all .15s ease;
  transition: all .15s ease;
}

ul li svg:hover {
  width: 2.5em;
  margin: 0 3.25em;
  -webkit-transition: all .15s ease;
  -o-transition: all .15s ease;
  -moz-transition: all .15s ease;
  -ms-transition: all .15s ease;
  -kthtml-transition: all .15s ease;
  transition: all .15s ease;
}

#twitter:hover path {
  fill: #55ACEE;
}

#envato:hover path {
  fill: #82B541;
}

#codepen:hover path {
  fill: #000000;
}

header h1,
header h2,
div,
ul {
  opacity: 0;
  -webkit-animation: fade 1s linear forwards;
  -moz-animation: fade 1s linear forwards;
  animation: fade 1s linear forwards;
  -webkit-animation-delay: 2s;
  -moz-animation-delay: 2s;
  animation-delay: 2s;
}

@-webkit-keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 100;
  }
}

@-moz-keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 100;
  }
}

@keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 100;
  }
}
    </style>
</head>
<body>
    <!-- this is the markup. you can change the details (your own name, your own avatar etc.) but don’t change the basic structure! -->
@foreach ($employee as $employee)

<aside class="profile-card">

    <header>

        <!-- here’s the avatar -->
        <a href="https://tutsplus.com">
            <img src="https://pbs.twimg.com/profile_images/619517630538510336/A7enqSs__400x400.jpg">
        </a>

        <!-- the username -->
        <h1>Stijn Meersschaert</h1>

        <!-- and role or location -->
        <h2>Student - Belgium</h2>

    </header>

    <!-- bit of a bio; who are you? -->
    <div class="profile-bio">

        <p>I’m a 22 year old guy from Belgium.
            <br>Currently studying multimedia production in the great city of Ghent.
            <br>Being in school gives me a lot of opportunities to learn and to be creative, but in my spare time I continue this path and do a lot of research.</p>

    </div>

    <!-- some social links to show off -->
    <ul class="profile-social-links">

        <!-- twitter - el clásico  -->
        <li>
            <a href="https://twitter.com/StijnMrsschrt">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="twitter" x="0px" y="0px" width="100px" height="100px" viewBox="-249 151 100 100" enable-background="new -249 151 100 100" xml:space="preserve">
                    <path fill="#888888" d="M-160.5,177.1c-2.8,1.3-5.9,2.1-9.1,2.5c3.3-2,5.8-5.1,6.9-8.7c-3.1,1.8-6.4,3.1-10,3.8c-2.9-3.1-7-5-11.5-5  c-8.7,0-15.8,7.1-15.8,15.8c0,1.2,0.1,2.4,0.4,3.6c-13.1-0.7-24.8-6.9-32.6-16.5c-1.4,2.3-2.1,5-2.1,7.9c0,5.5,2.8,10.3,7,13.1  c-2.6-0.1-5-0.8-7.2-2c0,0.1,0,0.1,0,0.2c0,7.7,5.4,14,12.7,15.5c-1.3,0.4-2.7,0.6-4.2,0.6c-1,0-2-0.1-3-0.3c2,6.3,7.8,10.8,14.8,11  c-5.4,4.2-12.2,6.8-19.6,6.8c-1.3,0-2.5-0.1-3.8-0.2c7,4.5,15.3,7.1,24.2,7.1c29.1,0,44.9-24.1,44.9-44.9c0-0.7,0-1.4,0-2  C-165.3,183.1-162.6,180.3-160.5,177.1z"
                    />
                </svg>
            </a>
        </li>

        <!-- envato – use this one to link to your marketplace profile -->
        <li>
            <a href="http://themeforest.net/user/StinoM?_ga=1.65968043.405288275.1434903636">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="envato" x="0px" y="0px" width="100px" height="100px" viewBox="-249 151 100 100" enable-background="new -249 151 100 100" xml:space="preserve">
                    <g>
                        <path fill="#888888" d="M-173.7,159.7c-2.4-1.3-9.2-0.5-17.4,2c-14.4,9.8-26.5,24.3-27.4,47.6c-0.2,0.6-1.6-0.1-1.9-0.2   c-3.9-7.4-5.4-15.3-2.2-26.6c0.6-1-1.4-2.2-1.7-1.9c-0.7,0.7-3.7,3.9-5.7,7.3c-9.8,16.9-3.4,38.7,13.7,48.2   c17.1,9.5,38.7,3.4,48.2-13.7C-157,202.6-167.2,163.3-173.7,159.7z"
                        />
                    </g>
                </svg>
            </a>
        </li>

        <!-- codepen - your codepen profile-->
        <li>
            <a href="https://codepen.io/StinoM/">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="codepen" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                    <g>
                        <path fill="#888888" d="M249.5,15C120,15,15,120,15,249.5s105,234.5,234.5,234.5c129.5,0,234.5-105,234.5-234.5S379.1,15,249.5,15z M249.5,445.6   c-108.1,0-196-87.9-196-196s87.9-196,196-196c108.1,0,196,87.9,196,196S357.6,445.6,249.5,445.6z" />
                        <path fill="#888888" d="M394.5,203.7c0-0.2-0.1-0.4-0.1-0.5c-0.1-0.4-0.1-0.7-0.2-1c-0.1-0.2-0.1-0.4-0.2-0.6c-0.1-0.3-0.2-0.6-0.3-0.9   c-0.1-0.2-0.2-0.4-0.3-0.6c-0.1-0.3-0.3-0.6-0.4-0.8c-0.1-0.2-0.2-0.4-0.4-0.6c-0.2-0.3-0.3-0.5-0.5-0.8c-0.1-0.2-0.3-0.4-0.4-0.5   c-0.2-0.2-0.4-0.5-0.6-0.7c-0.2-0.2-0.3-0.3-0.5-0.5c-0.2-0.2-0.5-0.4-0.7-0.6c-0.2-0.1-0.4-0.3-0.6-0.4c-0.1,0-0.1-0.1-0.2-0.2   l-132.6-88.4c-4.2-2.8-9.6-2.8-13.8,0L110.1,195c-0.1,0-0.1,0.1-0.2,0.2c-0.2,0.1-0.4,0.3-0.6,0.4c-0.2,0.2-0.5,0.4-0.7,0.6   c-0.2,0.2-0.3,0.3-0.5,0.5c-0.2,0.2-0.4,0.4-0.6,0.7c-0.1,0.2-0.3,0.4-0.4,0.5c-0.2,0.2-0.4,0.5-0.5,0.8c-0.1,0.2-0.2,0.4-0.4,0.6   c-0.2,0.3-0.3,0.5-0.4,0.8c-0.1,0.2-0.2,0.4-0.3,0.6c-0.1,0.3-0.2,0.6-0.3,0.9c-0.1,0.2-0.1,0.4-0.2,0.6c-0.1,0.3-0.2,0.7-0.2,1   c0,0.2-0.1,0.4-0.1,0.5c-0.1,0.5-0.1,1.1-0.1,1.6v88.4c0,0.5,0,1.1,0.1,1.6c0,0.2,0.1,0.4,0.1,0.5c0.1,0.4,0.1,0.7,0.2,1   c0.1,0.2,0.1,0.4,0.2,0.6c0.1,0.3,0.2,0.6,0.3,0.9c0.1,0.2,0.2,0.4,0.3,0.6c0.1,0.3,0.3,0.6,0.4,0.8c0.1,0.2,0.2,0.4,0.4,0.6   c0.2,0.3,0.3,0.5,0.5,0.8c0.1,0.2,0.3,0.4,0.4,0.5c0.2,0.2,0.4,0.5,0.6,0.7c0.2,0.2,0.3,0.3,0.5,0.5c0.2,0.2,0.5,0.4,0.7,0.6   c0.2,0.1,0.4,0.3,0.6,0.4c0.1,0,0.1,0.1,0.2,0.2l132.6,88.4c2.1,1.4,4.5,2.1,6.9,2.1c2.4,0,4.8-0.7,6.9-2.1L389,304.1   c0.1,0,0.1-0.1,0.2-0.2c0.2-0.1,0.4-0.3,0.6-0.4c0.2-0.2,0.5-0.4,0.7-0.6c0.2-0.2,0.3-0.3,0.5-0.5c0.2-0.2,0.4-0.4,0.6-0.7   c0.1-0.2,0.3-0.4,0.4-0.5c0.2-0.2,0.4-0.5,0.5-0.8c0.1-0.2,0.2-0.4,0.4-0.6c0.2-0.3,0.3-0.5,0.4-0.8c0.1-0.2,0.2-0.4,0.3-0.6   c0.1-0.3,0.2-0.6,0.3-0.9c0.1-0.2,0.1-0.4,0.2-0.6c0.1-0.3,0.2-0.7,0.2-1c0-0.2,0.1-0.4,0.1-0.5c0.1-0.5,0.1-1.1,0.1-1.6v-88.4   C394.6,204.8,394.5,204.3,394.5,203.7z M262,140.3l97.7,65.1L316,234.6l-54-36.1V140.3z M237.1,140.3v58.1l-54,36.1l-43.6-29.2   L237.1,140.3z M129.5,228.7l31.2,20.9l-31.2,20.9V228.7z M237.1,358.8l-97.7-65.1l43.6-29.2l54,36.1V358.8z M249.5,279l-44.1-29.5   l44.1-29.5l44.1,29.5L249.5,279z M262,358.8v-58.1l54-36.1l43.6,29.2L262,358.8z M369.6,270.4l-31.2-20.9l31.2-20.9V270.4z"
                        />
                    </g>
                </svg>
            </a>
        </li>

        <!-- add or remove social profiles as you see fit -->
    </ul>

</aside>
@endforeach
<!-- that’s all folks! -->
</body>
</html>