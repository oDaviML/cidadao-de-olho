import { defineStore } from "pinia"
import { ref } from "vue"

export const useDeputadoStore = defineStore("deputados", () => {
  const deputados = ref<Deputado[]>([])
  const isLoading = ref(false)
  const error = ref<string | null>(null)

  async function fetchDeputados() {
    isLoading.value = true
    error.value = null

    try {
      const response = await fetch("http://127.0.0.1:8000/api/deputados")
      if (!response.ok) {
        throw new Error(`Erro na requisição: ${response.status}`)
      }
      const data = await response.json()

      deputados.value = data.map((deputado: Deputado) => {
        return {
          id: deputado.id,
          nome: deputado.nome,
          partido: deputado.partido,
          tag_localizacao: deputado.tag_localizacao,
        }
      })
    } catch (err) {
      error.value = err instanceof Error ? err.message : String(err)
      console.error(err)
    } finally {
      isLoading.value = false
    }
  }

  return {
    deputados,
    isLoading,
    error,
    fetchDeputados,
  }
})

interface Deputado {
  id: number
  nome: string
  partido: string
  tag_localizacao: string
}
