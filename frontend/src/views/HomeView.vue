<script setup lang="ts">
import Card from "primevue/card"
</script>

<template>
  <main class="p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Cidadão de Olho</h1>
    <div class="flex flex-col md:flex-row p-4 gap-4">
      <RouterLink to="/deputados" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <template #title>Deputados</template>
          <template #content>Listagem de todos os deputados</template>
        </Card>
      </RouterLink>

      <RouterLink to="/deputados" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <template #title>Verbas Indenizatórias</template>
          <template #content
            >Listar os deputados com maiores com verbas indenizatórias por mês</template
          >
        </Card>
      </RouterLink>

      <RouterLink to="/deputados" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <template #title> Verbas Indenizatórias - ANO </template>
          <template #content
            >Listar os deputados com maiores com verbas indenizatórias no ano</template
          >
        </Card>
      </RouterLink>

      <RouterLink to="/redes-sociais" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <template #title>TOP 5 Redes sociais</template>
          <template #content>Exibir as 5 redes sociais mais utilizadas pelos deputados</template>
        </Card>
      </RouterLink>
    </div>
  </main>
</template>
