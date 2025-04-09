<script setup lang="ts">
defineOptions({
  name: "DeputadosList",
})

import { onMounted } from "vue"
import { useDeputadoStore } from "@/stores/deputados"
import LoadingSpinner from "@/components/LoadingSpinner.vue"
import DataTable from "primevue/datatable"
import Column from "primevue/column"

const deputadoStore = useDeputadoStore()

onMounted(() => {
  deputadoStore.fetchDeputados()
})
</script>

<template>
  <main class="p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">
      Lista dos deputados da ALMG
    </h1>
    <div>
      <div v-if="deputadoStore.isLoading">
        <LoadingSpinner />
      </div>
      <div v-else-if="deputadoStore.error" class="text-red-500 text-center">
        <p>Erro ao carregar os deputados: {{ deputadoStore.error }}</p>
      </div>
      <div class="p-6" v-else>
        <DataTable
          :value="deputadoStore.deputados"
          paginator
          :rows="5"
          :rowsPerPageOptions="[5, 10, 20, 50]"
          tableStyle="min-width: 50rem"
        >
          <Column field="nome" header="Nome"></Column>
          <Column field="partido" header="Partido"></Column>
        </DataTable>
      </div>
    </div>
  </main>
</template>
