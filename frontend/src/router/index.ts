import { createRouter, createWebHistory } from "vue-router"
import HomeView from "../views/HomeView.vue"
import Deputados from "@/views/Deputados.vue"

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/deputados",
      name: "deputados",
      component: () => Deputados,
    },
  ],
})

export default router
