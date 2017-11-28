@extends('layouts.layout')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection
@section('content')
    <section class="mt-3 mx-auto" id="calendar-modal">
        <div id="calendar">
            <div class="month">
                <h1>October</h1>
                <h3>2017</h3>
            </div>

            <ul class="weekdays">
                <li>Mo</li>
                <li>Tu</li>
                <li>We</li>
                <li>Th</li>
                <li>Fr</li>
                <li>Sa</li>
                <li>Su</li>
            </ul>

            <ul class="days">
                <li><span class="daynumber">1</span></li>
                <li><span class="daynumber">2</span></li>
                <li><span class="daynumber">3</span></li>
                <li><span class="daynumber">4</span></li>
                <li><span class="daynumber">5</span></li>
                <li><span class="daynumber">6</span></li>
                <li><span class="daynumber">7</span></li>
                <li><span class="daynumber">8</span></li>
                <li><span class="daynumber">9</span></li>
                <li class="recipeday">
                    <a href="/recipe/2">
                        <span class="daynumber">10</span>
                        <img alt="Meatballs recipe" src="{{ asset('images/recipe/pancake.jpg') }}">
                    </a>
                </li>
                <li><span class="daynumber">11</span></li>
                <li><span class="daynumber">12</span></li>
                <li><span class="daynumber">13</span></li>
                <li><span class="daynumber">14</span></li>
                <li><span class="daynumber">15</span></li>
                <li><span class="daynumber">16</span></li>
                <li><span class="daynumber">17</span></li>
                <li><span class="daynumber">18</span></li>
                <li><span class="daynumber">19</span></li>
                <li><span class="daynumber">20</span></li>
                <li><span class="daynumber">21</span></li>
                <li><span class="daynumber">22</span></li>
                <li class="recipeday">
                    <a href="/recipe/2">
                        <span class="daynumber">23</span>
                        <img alt="Pancakes recipe" src="images/recipe/meatballs.jpg">
                    </a>
                </li>
                <li><span class="daynumber">24</span></li>
                <li><span class="daynumber">25</span></li>
                <li><span class="daynumber">26</span></li>
                <li><span class="daynumber">27</span></li>
                <li><span class="daynumber">28</span></li>
                <li><span class="daynumber">29</span></li>
                <li><span class="daynumber">30</span></li>
                <li><span class="daynumber">31</span></li>
            </ul>
        </div>
    </section>
@endsection