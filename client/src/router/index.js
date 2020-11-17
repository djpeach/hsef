import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from "@/views/Dashboard";
import AdminManagement from "@/views/AdminManagement";
import EventManagement from "@/views/EventManagement";
import JudgeSchedule from "@/views/JudgeSchedule";
import FinalScores from "@/views/FinalScores";
import UploadCSV from "@/views/UploadCSV";
import store from '../store';
import LogIn from "@/views/LogIn";
import TempStudents from "@/views/TempStudents";
import Students from "@/views/Students";
import Projects from "@/views/Projects";
import Schools from "@/views/Schools";
import Categories from "@/views/Categories";
import Scores from "@/views/Scores";
import Booths from "@/views/Booths";
import Counties from "@/views/Counties";
import GradeLevels from "@/views/GradeLevels";
import Judges from "@/views/Judges";
import JudgeRegistration from "@/views/JudgeRegistration";
import PasswordReset from "@/views/PasswordReset";


Vue.use(VueRouter)

const publicOnlyRoutes = [
  'login',
  'judge-registration',
  'password-reset',
];

const publicRoutes = [
  ...publicOnlyRoutes,
];

function authGuard(to, from, next) {
  if (to.query.page === 'password-reset') {
    next({ name: 'password-reset', query: { k: to.query.k }})
  } else if (!publicRoutes.includes(to.name) && !store.state.isAuthenticated) {
    next({name: 'login'});
  } else if (publicOnlyRoutes.includes(to.name) && store.state.isAuthenticated) {
    console.log('go to dashboard')
    next({name: 'dashboard'})
  } else {
    next();
  }
}

const routes = [
  {path: '/', name: 'dashboard', component: Dashboard},
  {path: '/admin-management', name: 'admin-management', component: AdminManagement},
  {path: '/event-management', name: 'event-management', component: EventManagement},
  {path: '/judges', name: 'judges', component: Judges},
  {path: '/students', name: 'students', component: Students},
  {path: '/projects', name: 'projects', component: Projects},
  {path: '/schools', name: 'schools', component: Schools},
  {path: '/categories', name: 'categories', component: Categories},
  {path: '/scores', name: 'scores', component: Scores},
  {path: '/booths', name: 'booths', component: Booths},
  {path: '/counties', name: 'counties', component: Counties},
  {path: '/grade-levels', name: 'grade-levels', component: GradeLevels},
  {path: '/judge-schedule', name: 'judge-schedule', component: JudgeSchedule},
  {path: '/final-scores', name: 'final-scores', component: FinalScores},
  {path: '/upload-csv', name: 'upload-csv', component: UploadCSV},
  {path: '/login', name: 'login', component: LogIn},
  {path: '/temp-students', name: 'temp-students', component: TempStudents},
  {path: '/judge-registration', name: 'judge-registration', component: JudgeRegistration},
  {path: '/pwdReset', name: 'password-reset', component: PasswordReset},
]

const router = new VueRouter({
  base: '/hsef/',
  routes,
  mode: 'history'
})

router.beforeEach(authGuard);

export default router
