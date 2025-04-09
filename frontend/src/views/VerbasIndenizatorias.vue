<script setup lang="ts">
import { useVerbasStore } from "@/stores/verbas"
import { onMounted, computed } from "vue"
import LoadingSpinner from "@/components/LoadingSpinner.vue"
import Chart from "primevue/chart"
import { useRoute } from "vue-router"
const verbasStore = useVerbasStore()

const route = useRoute()
const mes = route.params.mes as string

onMounted(() => {
  const mesNumero = mes ? Number.parseInt(mes) : null
  verbasStore.fetchVerbasMes(mesNumero ?? 1)
})

const chartData = computed(() => {
  return {
    labels: verbasStore.verbas.map((verba) => verba.nome),
    datasets: [
      {
        label: "Nome",
        data: verbasStore.verbas.map((verba) => verba.total),

        hoverOffset: 4,
      },
    ],
  }
})

const chartOptions = {
  responsive: true,
  plugins: {
    legend: {
      position: "top",
    },
    title: {
      display: true,
      text: "Verbas Indenizatórias",
    },
  },
}

interface Mes {
  nome: string
  valor: number
}

const meses = [
  { nome: "Janeiro", valor: 1 },
  { nome: "Fevereiro", valor: 2 },
  { nome: "Março", valor: 3 },
  { nome: "Abril", valor: 4 },
  { nome: "Maio", valor: 5 },
  { nome: "Junho", valor: 6 },
  { nome: "Julho", valor: 7 },
  { nome: "Agosto", valor: 8 },
  { nome: "Setembro", valor: 9 },
  { nome: "Outubro", valor: 10 },
  { nome: "Novembro", valor: 11 },
  { nome: "Dezembro", valor: 12 },
] as Mes[]
</script>

<template>
  <main class="p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">
      Maiores verbas indenizatorias do mês
      {{ mes ? meses.find((m) => m.valor === Number(mes))?.nome : "atual" }}
    </h1>
    <div v-if="verbasStore.isLoading">
      <LoadingSpinner />
    </div>
    <div v-else-if="verbasStore.error" class="text-red-500 text-center">
      <p>Erro ao carregar as redes sociais: {{ verbasStore.error }}</p>
    </div>
    <div v-else-if="verbasStore.verbas.length === 0" class="text-center text-gray-600">
      <p>Nenhuma rede social encontrada.</p>
    </div>
    <div class="p-6 flex justify-center items-center" v-else>
      <Chart type="pie" :data="chartData" :options="chartOptions" class="w-full md:w-96" />
    </div>
  </main>
</template>

<style scoped></style>
