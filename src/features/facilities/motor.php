
    <section class="header">
         <nav>
            <a href="/arsys/home"><img src="./../../../public/assets/logo.png"></a>
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
            <h1>RESERVE NOW <br></h1>
           <a href="#" class="hero-btn"> RESERVE FACILITIES</a>
           <a href="#" class="hero-btn"> RESERVE A VEHICLE</a>
        </div>
    </section>




    <!-------javascript for toggle menu------>
<script>
    var navLinks=document.getElementById("navLinks")

    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }

</script>
    
    
