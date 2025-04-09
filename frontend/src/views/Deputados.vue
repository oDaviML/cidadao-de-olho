<script setup lang="ts">
import { onMounted } from "vue"
import { storeToRefs } from "pinia"
import { useDeputadoStore } from "../stores/deputados"
import LoadingSpinner from "../components/LoadingSpinner.vue"
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "../components/ui/table"

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
        <Table>
          <TableHeader>
            <TableRow>
              <TableHead>Nome</TableHead>
              <TableHead>Partido</TableHead>
            </TableRow>
          </TableHeader>
          <TableBody>
            <TableRow v-for="deputado in deputadoStore.deputados" :key="deputado.id">
              <TableCell>{{ deputado.nome }}</TableCell>
              <TableCell>{{ deputado.partido }}</TableCell>
            </TableRow>
          </TableBody>
        </Table>
      </div>
    </div>
  </main>
</template>
