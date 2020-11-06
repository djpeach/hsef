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

Vue.use(VueRouter)

const publicOnlyRoutes = [
  'login',
];

const publicRoutes = [
  ...publicOnlyRoutes,
];

function authGuard(to, from, next) {
  if (!publicRoutes.includes(to.name) && !store.state.isAuthenticated) {
    next({ name: 'login' });
  } else if (publicOnlyRoutes.includes(to.name) && store.state.isAuthenticated) {
    console.log('go to dashboard')
    next({ name: 'dashboard' })
  } else {
    next();
  }
}

const routes = [
  { path: '/', name: 'dashboard', component: Dashboard },
  { path: '/admin-management', name: 'admin-management', component: AdminManagement },
  { path: '/event-management', name: 'event-management', component: EventManagement },
  { path: '/judge-schedule', name: 'judge-schedule', component: JudgeSchedule },
  { path: '/final-scores', name: 'final-scores', component: FinalScores },
  { path: '/upload-csv', name: 'upload-csv', component: UploadCSV },
  { path: '/login', name: 'login', component: LogIn },
  { path: '/temp-students', name: 'temp-students', component: TempStudents },
]

const router = new VueRouter({
  base: '/hsef/',
  routes,
  mode: 'history'
})

router.beforeEach(authGuard);

export default router
