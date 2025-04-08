<script setup lang="ts">
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card"
</script>

<template>
  <main class="p-6">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Cidadão de Olho</h1>
    <div class="flex flex-col md:flex-row p-4 gap-4">
      <RouterLink to="/deputados" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <CardHeader>
            <CardTitle>Deputados</CardTitle>
          </CardHeader>
          <CardContent>
            <p>Listagem de todos os deputados</p>
          </CardContent>
        </Card>
      </RouterLink>

      <RouterLink to="/deputados" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <CardHeader>
            <CardTitle>Verbas Indenizatórias</CardTitle>
          </CardHeader>
          <CardContent>
            <p>Listar os deputados com maiores com verbas indenizatórias por mês</p>
          </CardContent>
        </Card>
      </RouterLink>

      <RouterLink to="/deputados" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <CardHeader>
            <CardTitle>Verbas Indenizatórias - ANO</CardTitle>
          </CardHeader>
          <CardContent>
            <p>Listar os deputados com maiores com verbas indenizatórias no ano</p>
          </CardContent>
        </Card>
      </RouterLink>

      <RouterLink to="/deputados" class="md:w-1/4">
        <Card class="hover:scale-105 transition-transform duration-300 shadow-lg h-full">
          <CardHeader>
            <CardTitle>TOP 5 Redes sociais</CardTitle>
          </CardHeader>
          <CardContent>
            <p>Exibir as 5 redes sociais mais utilizadas pelos deputados</p>
          </CardContent>
        </Card>
      </RouterLink>
    </div>
  </main>
</template>
