<template>
    <div>
      <a class="scrollToTop"><i class="mdi mdi-arrow-up-bold"></i></a>
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
            <div class="d-lg-none input-group-sm ms-auto px-3">
                <button type="submit" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-search"></i>
                </button>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                <li class="nav-item">
                  <router-link :to="{name:'home'}" class="nav-link" aria-current="page" :class="{active: $route.name==='home'}">Home</router-link>
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
                  <router-link :to="{name:'politicsCategory'}" class="nav-link" :class="{active: $route.name==='politicsCategory'}">Politics</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name:'businessCategory'}" class="nav-link" :class="{active: $route.name==='businessCategory'}">Business</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name:'sportsCategory'}" class="nav-link" :class="{active: $route.name==='sportsCategory'}">Sports</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name:'lifestyleCategory'}" class="nav-link" :class="{active: $route.name==='lifestyleCategory'}">Lifestyle</router-link>
                </li>
              </ul>
              <div class="d-none d-lg-block input-group-sm" style="margin-right: 20px;">
                <button type="submit" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </div>
          </div>
        </nav>
        <main class="content">
          <!-- Modal -->
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <div>
                      <form action="">
                        <input v-model="search" type="search" class="form-control" placeholder="Search..." aria-label="Search">
                      </form>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row g-0" style="padding-bottom: 20px;" v-for="r of resultQuery" :key="r.id">
                      <div class="col-xs-4">
                        <div class="con">
                          <img :src="'/storage/posts/' + r.image" alt="" class="img-fluid w-100" style="height: 100px;">
                        </div>
                      </div>
                      <div class="col-xs-8" style="">
                        <div class="p-3">
                          <router-link :to="{name:'viewNews', params:{headline:r.headline}}" class="headline" style="text-decoration: none;">
                            {{r.headline}}
                          </router-link>    
                        </div>
                      </div>
                    </div>
                    <div class="item error" v-if="search&&!resultQuery.length">
                      <p>No results found!</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <router-view></router-view>
        </main>
        <footer>
          <div
        class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
        data-wow-delay="0.1s"
      >
        <div class="container py-5">
          <div class="text-center">
            <img
                  class="img-fluid me-3"
                  src="../../../../../public/img/Dark Blue Red White Generic News General News Logo (2)cropped1.png"
                  alt=""
            />
            <div class="pt-3">
                    <h6 style="font-weight: bold;">Social Links:</h6>
                    <div class="">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-whatsapp"></a>
                    </div>
                </div>
          </div>
        </div>
        <div class="container-fluid copyright">
          <div class="container">
              <div class="text-center mb-3 mb-md-0">
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
import { mapGetters } from "vuex";

export default {
    data() {
      return{
        search: null
      }
    },
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
    computed: {
      ...mapGetters(["news"]),
      resultQuery() {
          if (this.search) {
            return this.news.filter(item => {
              return this.search
                .toLowerCase()
                .split(" ")
                .every(v => item.headline.toLowerCase().includes(v) || item.story.toLowerCase().includes(v) );
            });
          } 
        }
    },
    methods: {
        currentDate() {
          const current = new Date();
          const date = `${current.getDate()}/${current.getMonth()+1}/${current.getFullYear()}`;
          return date;
      },
    }
}
</script>
  
  <style>
  .content {
    padding: 16px;
  }

  .con {
    overflow: hidden;
  }

  .con img {
    object-fit: cover;
    display: block;
    transition: transform .4s;
  }

  .con img:hover {
      transform: scale(1.3);
      transform-origin: 50% 50%;
  }

  .headline{
    font-weight:700;
    color: black;
    text-decoration: none;
  }

  .headline:hover{
      color: #ff2942;
  }
  
  .sticky {
    position: fixed;
    top: 0;
    width: 100%;
  }
  
  .sticky + .content {
    padding-top: 60px;
  }
  
  input[type=search]:focus {
    outline: none;
    box-shadow: none;
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
  
  .footer .copyright {
      padding: 25px 0;
      font-size: 15px;
      border-top: 1px solid rgba(256, 256, 256, .1);
  }
  
  .footer .copyright a {
      color: var(--secondary);
  }
  
  .footer .copyright a:hover {
      color: #ff2942;
  }

  .fa {
  padding: 10px;
  font-size: 30px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-instagram {
  background: #E1306C;
  color: white;
}

.fa-whatsapp {
    background: #25D366;
    color: white;
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
    background-color:#fff; color:#ff2942; border-color:1px solid#ff2942; cursor: pointer;
  }
  </style>