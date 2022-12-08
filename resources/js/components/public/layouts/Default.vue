<template>
    <div>
      <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
        <header style="background: white;" class="d-none d-lg-block">
          <div class="container-fluid">
              <div class="d-flex justify-content-between">
                  <div class="brand m-3">
                    <img class="img-fluid" src="../../../../../public/img/Dark Blue Red White Generic News General News Logo (2)cropped1.png" alt="" height="100">
                  </div>
                  <div class="m-5">
                    <h3>Daily News</h3>
                    <h6>{{currentDate().toLocaleString()}}</h6>
                  </div>
              </div>
          </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow" id="navbar">
          <div class="container-fluid">
            <img class="navbar-brand d-lg-none img-fluid" src="../../../../../public/img/Dark Blue Red White Generic News General News Logo (4)cropped1.png" width="200">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                <li class="nav-item">
                  <router-link :to="{name:'home'}" class="nav-link" aria-current="page">Home</router-link>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    News
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><router-link :to="{name:'southEastern'}" class="dropdown-item">South Eastern</router-link></li>
                    <li><router-link :to="{name:'national'}" class="dropdown-item">National</router-link></li>
                    <li><router-link :to="{name:'international'}" class="dropdown-item">International</router-link></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <router-link :to="{name:'politicsCategory'}" class="nav-link">Politics</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name:'businessCategory'}" class="nav-link">Business</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name:'sportsCategory'}" class="nav-link">Sports</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name:'lifestyleCategory'}" class="nav-link">Lifestyle</router-link>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <main class="content">
            <router-view></router-view>
        </main>
        <footer>
          <div
        class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
        data-wow-delay="0.1s"
      >
        <div class="container py-5">
          <div class="row g-5">
            <div class="col-lg-3 col-md-6">
              <h1 class="text-white mb-4">
                <img
                  class="img-fluid me-3"
                  src="../../../../../public/img/Dark Blue Red White Generic News General News Logo (2)cropped1.png"
                  alt=""
                />
              </h1>
              <p>
                Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
                ipsum et lorem et sit, sed stet lorem sit clita
              </p>
              <div class="d-flex pt-2">
                <a class="btn btn-square me-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-square me-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-square me-1" href=""
                  ><i class="fab fa-youtube"></i
                ></a>
                <a class="btn btn-square me-0" href=""
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <h5 class="text-light mb-4">Address</h5>
              <p>
                <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
              </p>
              <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
              <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
              <h5 class="text-light mb-4">Quick Links</h5>
              <a class="btn btn-link" href="">About Us</a>
              <a class="btn btn-link" href="">Contact Us</a>
              <a class="btn btn-link" href="">Our Services</a>
              <a class="btn btn-link" href="">Terms & Condition</a>
              <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
              <h5 class="text-light mb-4">Newsletter</h5>
              <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
              <div class="position-relative mx-auto" style="max-width: 400px">
                <input
                  class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                  type="text"
                  placeholder="Your email"
                />
                <button
                  type="button"
                  class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2"
                >
                  SignUp
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid copyright">
          <div class="container">
              <div class="text-center text-md-start mb-3 mb-md-0">
                Copyright &copy; {{new Date().getFullYear()}} <a>SouthEastern Brief</a>.
              </div>
          </div>
        </div>
      </div>
        </footer>
    </div>
  </template>
  
<script>
import $ from "jquery"

export default {
    mounted() {
      console.log('Component mounted.')

      $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
      });
      //Click event to scroll to top
      $('.scrollToTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
      });
      
      window.onscroll = function() {myFunction()};
      var navbar = document.getElementById("navbar");
      var sticky = navbar.offsetTop;

      function myFunction() {
        if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
        } else {
          navbar.classList.remove("sticky");
        }
      }
      
    },
    methods: {
        currentDate() {
        const current = new Date();
        const date = `${current.getDate()}/${current.getMonth()+1}/${current.getFullYear()}`;
        return date;
      }
    }
}
</script>
  
  <style>
  .content {
    padding: 16px;
  }
  
  .sticky {
    position: fixed;
    top: 0;
    width: 100%;
  }
  
  .sticky + .content {
    padding-top: 60px;
  }
  
  
  /*---------------------------------------
    NAVIGATION              
  -----------------------------------------*/
  .navbar {
    background: #ff2942;
    z-index: 9;
    padding-top: 0;
    padding-bottom: 0;
  }
  
  .navbar-expand-lg .navbar-nav .nav-link {
    margin-right: 0;
    margin-left: 0;
    padding: 20px;
  }
  
  .navbar-nav .nav-link {
    display: inline-block;
    color: #ffffff;
    font-size: 16px;
    font-weight:inherit;
    position: relative;
    padding-top: 15px;
    padding-bottom: 15px;
  }
  
  .navbar-nav .nav-link.active, 
  .navbar-nav .nav-link:hover {
    background:brown;
  }
  
  .dropdown-menu {
    background: brown;
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
    border: 0;
    max-width: 50px;
    padding: 0;
    margin-top: 20px;
  }
  
  .dropdown-item {
    display: inline-block;
    color: #ffffff;
    font-size: var(--menu-font-size);
    font-weight: var(--font-weight-medium);
    position: relative;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  
  .dropdown-item.active, 
  .dropdown-item:active,
  .dropdown-item:focus, 
  .dropdown-item:hover {
    background: transparent;
    color: #ff2942;
  }
  
  .dropdown-toggle::after {
    content: "\f282";
    display: inline-block;
    font-family: bootstrap-icons !important;
    font-size: 14px;
    font-style: normal;
    font-weight: normal !important;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    vertical-align: -.125em;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    position: relative;
    left: 2px;
    border: 0;
  }
  
  @media screen and (min-width: 992px) {
    .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
    }
  }
  
  .navbar-toggler {
    border: 0;
    padding: 0;
    cursor: pointer;
    margin: 0;
    width: 30px;
    height: 35px;
    outline: none;
  }
  
  .navbar-toggler:focus {
    outline: none;
    box-shadow: none;
  }
  
  .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
    background: transparent;
  }
  
  .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:before,
  .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:after {
    transition: top 300ms 50ms ease, -webkit-transform 300ms 350ms ease;
    transition: top 300ms 50ms ease, transform 300ms 350ms ease;
    transition: top 300ms 50ms ease, transform 300ms 350ms ease, -webkit-transform 300ms 350ms ease;
    top: 0;
  }
  
  .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:before {
    transform: rotate(45deg);
  }
  
  .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:after {
    transform: rotate(-45deg);
  }
  
  .navbar-toggler .navbar-toggler-icon {
    background: #ffffff;
    transition: background 10ms 300ms ease;
    display: block;
    width: 30px;
    height: 2px;
    position: relative;
  }
  
  .navbar-toggler .navbar-toggler-icon:before,
  .navbar-toggler .navbar-toggler-icon:after {
    transition: top 300ms 350ms ease, -webkit-transform 300ms 50ms ease;
    transition: top 300ms 350ms ease, transform 300ms 50ms ease;
    transition: top 300ms 350ms ease, transform 300ms 50ms ease, -webkit-transform 300ms 50ms ease;
    position: absolute;
    right: 0;
    left: 0;
    background: #ffffff;
    width: 30px;
    height: 2px;
    content: '';
  }
  
  .navbar-toggler .navbar-toggler-icon::before {
    top: -8px;
  }
  
  .navbar-toggler .navbar-toggler-icon::after {
    top: 8px;
  }
  
  /*** Footer ***/
  .footer {
      color: #A7A8B4;
  }
  
  .footer .btn.btn-link {
      display: block;
      margin-bottom: 5px;
      padding: 0;
      text-align: left;
      color: #A7A8B4;
      font-weight: normal;
      text-transform: capitalize;
      transition: .3s;
  }
  
  .footer .btn.btn-link::before {
      position: relative;
      content: "\f105";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      color: #A7A8B4;
      margin-right: 10px;
  }
  
  .footer .btn.btn-link:hover {
      color: var(--light);
      letter-spacing: 1px;
      box-shadow: none;
  }
  
  .footer .btn.btn-square {
      color: #A7A8B4;
      border: 1px solid#A7A8B4;
  }
  
  .footer .btn.btn-square:hover {
      color: var(--secondary);
      border-color: var(--light);
  }
  
  .footer .copyright {
      padding: 25px 0;
      font-size: 15px;
      border-top: 1px solid rgba(256, 256, 256, .1);
  }
  
  .footer .copyright a {
      color: var(--secondary);
  }
  
  .footer .copyright a:hover {
      color: #FFFFFF;
  }
  
.scrollToTop{
  bottom:105px; display:none; font-size:32px; font-weight:bold; height:50px; position:fixed; right:75px; text-align:center; text-decoration:none; width:50px; z-index:9; border:1px solid; -webkit-transition:all 0.5s; -moz-transition:all 0.5s; -ms-transition:all 0.5s; -o-transition:all 0.5s; transition:all 0.5s
}
.scrollToTop:hover, .scrollToTop:focus{
  text-decoration:none; outline:none
}
.scrollToTop{
  background-color:#ff2942; color:#fff
}
.scrollToTop:hover, .scrollToTop:focus{
  background-color:#fff; color:#ff2942; border-color:1px solid#ff2942
}
  </style>