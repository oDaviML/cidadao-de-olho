<script setup lang="ts">
import Card from "primevue/card"
import Dialog from "primevue/dialog"
import { ref } from "vue"

const isVisible = ref(false)

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

const mesSelecionado = ref<Mes | null>(null)

const selecionarMes = (mes: Mes) => {
  mesSelecionado.value = mes
}
</script>

<template>
  <main class="p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Cidadão de Olho</h1>
    <div class="flex flex-col md:flex-row justify-center items-center p-4 gap-4">
      <div class="w-full md:w-96">
        <RouterLink to="/deputados" class="block h-full">
          <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
            <template #title>Deputados</template>
            <template #content>
              <div class="min-h-24">Listagem de todos os deputados</div>
            </template>
          </Card>
        </RouterLink>
      </div>

      <div class="w-full md:w-96">
        <Card
          @click="isVisible = true"
          class="hover:scale-105 transition-transform duration-300 shadow-lg h-full cursor-pointer"
        >
          <template #title>Verbas Indenizatórias</template>
          <template #content>
            <div class="min-h-24">
              Listar os deputados com maiores com verbas indenizatórias por mês
            </div>
          </template>
        </Card>

        <Dialog
          v-model:visible="isVisible"
          :modal="true"
          :draggable="false"
          :closable="true"
          header="Selecione o mês"
          class="w-full md:max-w-lg"
        >
          <div class="p-4">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
              <div v-for="mes in meses" :key="mes.valor" class="cursor-pointer">
                <div
                  class="p-4 border rounded-lg text-center transition-colors duration-200 hover:bg-gray-200"
                  :class="{
                    'bg-gray-700 text-white hover:bg-gray-500': mesSelecionado?.valor === mes.valor,
                  }"
                  @click="selecionarMes(mes)"
                >
                  {{ mes.nome }}
                </div>
              </div>
            </div>

            <div class="flex justify-center mt-4">
              <RouterLink
                :to="
                  mesSelecionado
                    ? `/verbas-indenizatorias/${mesSelecionado.valor}`
                    : '/verbas-indenizatorias'
                "
              >
                <button
                  type="button"
                  class="px-6 py-3 bg-gray-700 text-white rounded-lg hover:bg-gray-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                  @click="isVisible = false"
                  :disabled="!mesSelecionado"
                >
                  Ver Relatório
                </button>
              </RouterLink>
            </div>
          </div>
        </Dialog>
      </div>

      <div class="w-full md:w-96">
        <RouterLink to="/redes-sociais" class="block h-full">
          <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
            <template #title>TOP Redes sociais</template>
            <template #content>
              <div class="min-h-24">Exibir as redes sociais mais utilizadas pelos deputados</div>
            </template>
          </Card>
        </RouterLink>
      </div>
    </div>
  </main>
</template>
