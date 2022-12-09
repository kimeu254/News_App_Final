import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'

/* Guest Component */
const Home = () => import('@/components/public/Home.vue')
const SouthEastern = () => import('@/components/public/news/southEastern/SouthEastern.vue')
const ViewSouthEastern = () => import('@/components/public/news/southEastern/View.vue')
const National = () => import('@/components/public/news/national/National.vue')
const ViewNational = () => import('@/components/public/news/national/View.vue')
const International = () => import('@/components/public/news/international/International.vue')
const ViewInternational = () => import('@/components/public/news/international/View.vue')
const BusinessCategory = () => import('@/components/public/categories/business/Business.vue')
const ViewBusiness = () => import('@/components/public/categories/business/View.vue')
const PoliticsCategory = () => import('@/components/public/categories/politics/Politics.vue')
const ViewPolitics = () => import('@/components/public/categories/politics/View.vue')
const LifestyleCategory = () => import('@/components/public/categories/lifestyle/Lifestyle.vue')
const ViewLifestyle = () => import('@/components/public/categories/lifestyle/View.vue')
const SportsCategory = () => import('@/components/public/categories/sports/Sports.vue')
const ViewSports = () => import('@/components/public/categories/sports/View.vue')
const Author = () => import('@/components/public/author/View.vue')
const News = () => import('@/components/public/news/List.vue')
const ViewNews = () => import('@/components/public/news/View.vue')

const Login = () => import('@/components/admin/auth/Login.vue')
const Register = () => import('@/components/admin/auth/Register.vue')
/* Guest Component */

/* Layouts */
const DahboardLayout = () => import('@/components/admin/layouts/Default.vue')
const HomeLayout = () => import('@/components/public/layouts/Default.vue')
/* Layouts */

/* Authenticated Component */
const Dashboard = () => import('@/components/admin/Dashboard.vue')

//SouthEasternNews
const SouthEasternNews = () => import('@/components/admin/news/southEastern/SouthEasternNews.vue')
const PostSouthEasternNews = () => import('@/components/admin/news/southEastern/Post.vue')
const EditSouthEasternNews = () => import('@/components/admin/news/southEastern/Edit.vue')
const ViewSouthEasternNews = () => import('@/components/admin/news/southEastern/View.vue')

//NationalNews
const NationalNews = () => import('@/components/admin/news/national/NationalNews.vue')
const PostNationalNews = () => import('@/components/admin/news/national/Post.vue')
const EditNationalNews = () => import('@/components/admin/news/national/Edit.vue')
const ViewNationalNews = () => import('@/components/admin/news/national/View.vue')

//InternationalNews
const InternationalNews = () => import('@/components/admin/news/international/InternationalNews.vue')
const PostInternationalNews = () => import('@/components/admin/news/international/Post.vue')
const EditInternationalNews = () => import('@/components/admin/news/international/Edit.vue')
const ViewInternationalNews = () => import('@/components/admin/news/international/View.vue')

//Business
const Business = () => import('@/components/admin/categories/business/Business.vue')
const PostBusinessCatergory = () => import('@/components/admin/categories/business/Post.vue')
const EditBusinessCatergory = () => import('@/components/admin/categories/business/Edit.vue')
const ViewBusinessCatergory = () => import('@/components/admin/categories/business/View.vue')

//Lifestyle
const Lifestyle = () => import('@/components/admin/categories/lifestyle/Lifestyle.vue')
const PostLifestyleCatergory = () => import('@/components/admin/categories/lifestyle/Post.vue')
const EditLifestyleCatergory = () => import('@/components/admin/categories/lifestyle/Edit.vue')
const ViewLifestyleCatergory = () => import('@/components/admin/categories/lifestyle/View.vue')

//Politics
const Politics = () => import('@/components/admin/categories/politics/Politics.vue')
const PostPoliticsCatergory = () => import('@/components/admin/categories/politics/Post.vue')
const EditPoliticsCatergory = () => import('@/components/admin/categories/politics/Edit.vue')
const ViewPoliticsCatergory = () => import('@/components/admin/categories/politics/View.vue')

//Sports
const Sports = () => import('@/components/admin/categories/sports/Sports.vue')
const PostSportsCatergory = () => import('@/components/admin/categories/sports/Post.vue')
const EditSportsCatergory = () => import('@/components/admin/categories/sports/Edit.vue')
const ViewSportsCatergory = () => import('@/components/admin/categories/sports/View.vue')

//Profile
const Profile = () => import('@/components/admin/profile/View.vue')
const EditProfile = () => import('@/components/admin/profile/Edit.vue')

/* Authenticated Component */


const routes = [
    {
        path: "/",
        component: HomeLayout,
        meta: {
          requiresAuth: false,
        },
        children: [
            {
                name: "home",
                path: '/',
                component: Home,
                meta: {
                    title: `Home`
                }
            },
            {
                name: "southEastern",
                path: '/News/SouthEastern',
                component: SouthEastern,
                meta: {
                    title: `SouthEastern`
                }
            },
            {
                name: "viewsouthEastern",
                path: '/News/SouthEastern/:headline',
                component: ViewSouthEastern,
                params: true,
                meta: {
                    title: `ViewSouthEastern`
                }
            },
            {
                name: "national",
                path: '/News/National',
                component: National,
                meta: {
                    title: `National`
                }
            },
            {
                name: "viewNational",
                path: '/News/National/:headline',
                component: ViewNational,
                params: true,
                meta: {
                    title: `ViewNational`
                }
            },
            {
                name: "international",
                path: '/News/International',
                component: International,
                meta: {
                    title: `International`
                }
            },
            {
                name: "viewinternational",
                path: '/News/International/:headline',
                component: ViewInternational,
                params: true,
                meta: {
                    title: `ViewInternational`
                }
            },
            {
                name: "businessCategory",
                path: '/Categories/Business',
                component: BusinessCategory,
                meta: {
                    title: `BusinessCategory`
                }
            },
            {
                name: "viewBusiness",
                path: '/Category/Business/:headline',
                component: ViewBusiness,
                params: true,
                meta: {
                    title: `ViewBusiness`
                }
            },
            {
                name: "politicsCategory",
                path: '/Categories/Politics',
                component: PoliticsCategory,
                meta: {
                    title: `PoliticsCategory`
                }
            },
            {
                name: "viewPolitics",
                path: '/Category/Politics/:headline',
                component: ViewPolitics,
                params: true,
                meta: {
                    title: `ViewPolitics`
                }
            },
            {
                name: "sportsCategory",
                path: '/Categories/Sports',
                component: SportsCategory,
                meta: {
                    title: `SportsCategory`
                }
            },
            {
                name: "viewSports",
                path: '/Category/Sports/:headline',
                component: ViewSports,
                params: true,
                meta: {
                    title: `ViewSports`
                }
            },
            {
                name: "lifestyleCategory",
                path: '/Categories/Lifestyle',
                component: LifestyleCategory,
                meta: {
                    title: `LifestyleCategory`
                }
            },
            {
                name: "viewLifestyle",
                path: '/Category/Lifestyle/:headline',
                component: ViewLifestyle,
                params: true,
                meta: {
                    title: `ViewLifestyle`
                }
            },
            {
                name: "author",
                path: '/Author/:first_name',
                component: Author,
                params: true,
                meta: {
                    title: `Author`
                }
            },
            {
                name: "news",
                path: '/News',
                component: News,
                meta: {
                    title: `News`
                }
            },
            {
                name: "viewNews",
                path: '/News/:headline',
                component: ViewNews,
                params: true,
                meta: {
                    title: `ViewNews`
                }
            },
        ]
    },
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            requiresAuth: false,
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            requiresAuth: false,
        }
    },
    {
        path: "/Admin",
        component: DahboardLayout,
        meta: {
            requiresAuth: true,
        },
        children: [
            /* Dashboard */
            {
                name: "dashboard",
                path: '/Admin',
                component: Dashboard,
                meta: {
                    title: `Dashboard`
                }
            },

            /* Dashboard */

            {
                name: "profile",
                path: '/Admin/Profile',
                component: Profile,
                meta: {
                    title: `Profile`
                }
            },

            {
                name: "editProfile",
                path: '/Admin/Profile/Edit',
                component: EditProfile,
                meta: {
                    title: `EditProfile`
                }
            },
            
            /* News */

            //SouthEasternNews
            {
                name: "postSouthEasternNews",
                path: '/Admin/News/SouthEastern/Post',
                component: PostSouthEasternNews,
                meta: {
                    title: `PostSouthEasternNews`
                }
            },
            {
                name: "editSouthEasternNews",
                path: '/Admin/News/SouthEastern/Edit/:id',
                params: true,
                component: EditSouthEasternNews,
                meta: {
                    title: `EditSouthEasternNews`
                }
            },
            {
                name: "viewSouthEasternNews",
                path: '/Admin/News/SouthEastern/View/:id',
                params: true,
                component: ViewSouthEasternNews,
                meta: {
                    title: `ViewSouthEasternNews`
                }
            },
            {
                name: "southEasternNews",
                path: '/Admin/News/SouthEastern',
                component: SouthEasternNews,
                meta: {
                    title: `SouthEasternNews`
                }
            },

            //National news
            {
                name: "postNationalNews",
                path: '/Admin/News/National/Post',
                component: PostNationalNews,
                meta: {
                    title: `PostNationalNews`
                }
            },
            {
                name: "editNationalNews",
                path: '/Admin/News/National/Edit/:id',
                params: true,
                component: EditNationalNews,
                meta: {
                    title: `EditNationalNews`
                }
            },
            {
                name: "viewNationalNews",
                path: '/Admin/News/National/View/:id',
                params: true,
                component: ViewNationalNews,
                meta: {
                    title: `ViewNationalNews`
                }
            },
            {
                name: "nationalNews",
                path: '/Admin/News/National',
                component: NationalNews,
                meta: {
                    title: `NationalNews`
                }
            },

            //International news
            {
                name: "postInternationalNews",
                path: '/Admin/News/International/Post',
                component: PostInternationalNews,
                meta: {
                    title: `PostInternationalNews`
                }
            },
            {
                name: "editInternationalNews",
                path: '/Admin/News/International/Edit/:id',
                params: true,
                component: EditInternationalNews,
                meta: {
                    title: `EditInternationalNews`
                }
            },
            {
                name: "viewInternationalNews",
                path: '/Admin/News/International/View/:id',
                params: true,
                component: ViewInternationalNews,
                meta: {
                    title: `ViewInternationalNews`
                }
            },
            {
                name: "internationalNews",
                path: '/Admin/News/International',
                component: InternationalNews,
                meta: {
                    title: `InternationalNews`
                }
            },

            /* News */


            /* Categories */

            //Business
            {
                name: "postBusinessCategory",
                path: '/Admin/Categories/Business/Post',
                component: PostBusinessCatergory,
                meta: {
                    title: `PostBusinessCatergory`
                }
            },
            {
                name: "editBusinessCatergory",
                path: '/Admin/Categories/Business/Edit/:id',
                params: true,
                component: EditBusinessCatergory,
                meta: {
                    title: `EditBusinessCatergory`
                }
            },
            {
                name: "viewBusinessCatergory",
                path: '/Admin/Categories/Business/View/:id',
                params: true,
                component: ViewBusinessCatergory,
                meta: {
                    title: `ViewBusinessCatergory`
                }
            },
            {
                name: "business",
                path: '/Admin/Categories/Business',
                component: Business,
                meta: {
                    title: `Business`
                }
            },

            //Lifestyle
            {
                name: "postLifestyleCategory",
                path: '/Admin/Categories/Lifestyle/Post',
                component: PostLifestyleCatergory,
                meta: {
                    title: `PostLifestyleCatergory`
                }
            },
            {
                name: "editLifestyleCatergory",
                path: '/Admin/Categories/Lifestyle/Edit/:id',
                params: true,
                component: EditLifestyleCatergory,
                meta: {
                    title: `EditLifestyleCatergory`
                }
            },
            {
                name: "viewLifestyleCatergory",
                path: '/Admin/Categories/Lifestyle/View/:id',
                params: true,
                component: ViewLifestyleCatergory,
                meta: {
                    title: `ViewLifestyleCatergory`
                }
            },
            {
                name: "lifestyle",
                path: '/Admin/Categories/Lifestyle',
                component: Lifestyle,
                meta: {
                    title: `Lifestyle`
                }
            },

            //Politics
            {
                name: "postPoliticsCategory",
                path: '/Admin/Categories/Politics/Post',
                component: PostPoliticsCatergory,
                meta: {
                    title: `PostPoliticsCatergory`
                }
            },
            {
                name: "editPoliticsCatergory",
                path: '/Admin/Categories/Politics/Edit/:id',
                params: true,
                component: EditPoliticsCatergory,
                meta: {
                    title: `EditPoliticsCatergory`
                }
            },
            {
                name: "viewPoliticsCatergory",
                path: '/Admin/Categories/Politics/View/:id',
                params: true,
                component: ViewPoliticsCatergory,
                meta: {
                    title: `ViewPoliticsCatergory`
                }
            },
            {
                name: "politics",
                path: '/Admin/Categories/Politics',
                component: Politics,
                meta: {
                    title: `Politics`
                }
            },

            //Sports
            {
                name: "postSportsCategory",
                path: '/Admin/Categories/Sports/Post',
                component: PostSportsCatergory,
                meta: {
                    title: `PostSportsCatergory`
                }
            },
            {
                name: "editSportsCatergory",
                path: '/Admin/Categories/Sports/Edit/:id',
                params: true,
                component: EditSportsCatergory,
                meta: {
                    title: `EditSportsCatergory`
                }
            },
            {
                name: "viewSportsCatergory",
                path: '/Admin/Categories/Sports/View/:id',
                params: true,
                component: ViewSportsCatergory,
                meta: {
                    title: `ViewSportsCatergory`
                }
            },
            {
                name: "sports",
                path: '/Admin/Categories/Sports',
                component: Sports,
                meta: {
                    title: `Sports`
                }
            },

            /* Categories */
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else{
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                  resolve({ 
                    left: 0, 
                    top: 0,  
                    behavior: 'smooth', 
                })
              }, 500)
            })
        }
    },
})

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
      if (store.state.auth.authenticated) {
        next();
      } else {
        alert('Auth required!')
        next("/login");
      }
    } else {
      next();
    }
});

// router.beforeEach((to, from, next) => {
//     document.title = to.meta.title
//     if (to.meta.middleware == "guest") {
//         if (store.state.auth.authenticated) {
//             next({ name: "dashboard" })
//         }
//         next()
//     } else {
//         if (store.state.auth.authenticated) {
//             next()
//         } else {
//             next({ name: "login" })
//         }
//     }
// })

export default router