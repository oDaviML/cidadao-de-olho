import { createRouter, createWebHistory } from "vue-router"
import HomeView from "../views/HomeView.vue"
import Deputados from "@/views/Deputados.vue"
import RedesSociais from "@/views/RedesSociais.vue"
import VerbasIndenizatorias from "@/views/VerbasIndenizatorias.vue"

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
      component: Deputados,
    },
    {
      path: "/redes-sociais",
      name: "redes-sociais",
      component: RedesSociais,
    },
    {
      path: "/verbas-indenizatorias/:mes",
      name: "verbas-indenizatorias",
      component: VerbasIndenizatorias,
    },
  ],
})

export default router
