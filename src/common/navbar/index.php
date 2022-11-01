

    <section class="header">
        <nav>
            <a href="/arsys/home"><img src="./../public/assets/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa-solid fa-rectangle-xmark" onclick="hideMenu()"></i>
            <ul>
                <li> <a href="/arsys/home"> HOME </a></li>
                <li> <a href="/arsys/resources"> RESOURCES </a></li>
                <li> <a href="/arsys/process"> PROCESS </a></li>
                <li> <a href="/arsys/about"> ABOUT </a></li>
                <li> <a href="/arsys/contact-us"> CONTACT US </a></li>
            </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>PHYSICAL PLANT AND SITE <br>DEVELOPMENT OFFICE <br></h1>
            <p> The Physical Plant and Site Development Office is an office of Aurora State College of Technology under the supervision of the Office of the Vice President for Planning and Finance.<br> Under PPSDO, students and faculty can use ASCOT resources such as vehicles and facilities.</p>
            <a href="/arsys/facilities" class="hero-btn"> RESERVE NOW</a>
        </div>
    </section>
    
    <!-------javascript for toggle menu------>
<script>
    var navLinks=document.getElementById("navLinks");

    function showMenu(){
        // navLinks.style.right = "0";
         navLinks.classList.add('show-nav');
    }
    function hideMenu(){
        navLinks.classList.add('hide-nav');
    }
    
    // function showMenu(){
    //     navLinks.classList.add('show-nav');
    // }
    // function hideMenu(){
    //     navLinks.classList.remove('show-nav');
    //     navLinks.classList.add('hide-nav')''
    // }
</script>