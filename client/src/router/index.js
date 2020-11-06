import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from "@/views/Dashboard";
import AdminManagement from "@/views/AdminManagement";
import EventManagement from "@/views/EventManagement";
import JudgeSchedule from "@/views/JudgeSchedule";
import FinalScores from "@/views/FinalScores";
import UploadCSV from '@/views/UploadCSV';

Vue.use(VueRouter)

const routes = [
  { path: '/', name: 'dashboard', component: Dashboard },
  { path: '/admin-management', name: 'admin-management', component: AdminManagement },
  { path: '/event-management', name: 'event-management', component: EventManagement },
  { path: '/judge-schedule', name: 'judge-schedule', component: JudgeSchedule },
  { path: '/final-scores', name: 'final-scores', component: FinalScores },
  { path: '/upload-csv', name: 'upload-csv', component: UploadCSV },
]

const router = new VueRouter({
  base: '/hsef/',
  routes,
  mode: 'history'
})

export default router
