<script setup lang="ts">
import { useRedesSociaisStore } from "../stores/redes-sociais"
import { onMounted, computed } from "vue"
import LoadingSpinner from "../components/LoadingSpinner.vue"
import Chart from "primevue/chart"

const redesSociaisStore = useRedesSociaisStore()

onMounted(() => {
  redesSociaisStore.fetchRedesSociais()
})

const chartData = computed(() => {
  return {
    labels: redesSociaisStore.redesSociais.map((rede) => rede.nome),
    datasets: [
      {
        label: "Redes Sociais",
        data: redesSociaisStore.redesSociais.map((rede) => rede.total),

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
      text: "Redes Sociais",
    },
  },
}
</script>

<template>
  <main class="p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Redes Sociais</h1>
    <div v-if="redesSociaisStore.isLoading">
      <LoadingSpinner />
    </div>
    <div v-else-if="redesSociaisStore.error" class="text-red-500 text-center">
      <p>Erro ao carregar as redes sociais: {{ redesSociaisStore.error }}</p>
    </div>
    <div v-else-if="redesSociaisStore.redesSociais.length === 0" class="text-center text-gray-600">
      <p>Nenhuma rede social encontrada.</p>
    </div>
    <div class="p-6 flex justify-center items-center" v-else>
      <Chart type="pie" :data="chartData" :options="chartOptions" class="w-full md:w-96" />
    </div>
  </main>
</template>

<style scoped></style>
