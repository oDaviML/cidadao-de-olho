import { defineStore } from "pinia"
import { ref } from "vue"

export const useVerbasStore = defineStore("verbas", () => {
  const verbas = ref<Verba[]>([])
  const isLoading = ref(false)
  const error = ref<string | null>(null)

  async function fetchVerbasMes(mes: number) {
    isLoading.value = true
    error.value = null
    try {
      const response = await fetch(`http://127.0.0.1:8000/api/verbas/ranking/top5/${mes}`)
      if (!response.ok) {
        throw new Error(`Erro na requisição: ${response.status}`)
      }
      const data = await response.json()
      verbas.value = data.map((verba: Verba) => {
        return {
          nome: verba.nome,
          total: verba.total,
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
    verbas,
    isLoading,
    error,
    fetchVerbasMes,
  }
})

interface Verba {
  nome: string
  total: number
}
