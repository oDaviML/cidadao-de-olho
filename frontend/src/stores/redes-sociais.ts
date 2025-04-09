import { defineStore } from "pinia"
import { ref } from "vue"

export const useRedesSociaisStore = defineStore("redes-sociais", () => {
  const redesSociais = ref<RedesSociais[]>([])
  const isLoading = ref(false)
  const error = ref<string | null>(null)

  async function fetchRedesSociais() {
    isLoading.value = true
    error.value = null

    try {
      const response = await fetch("http://127.0.0.1:8000/api/rede-social/ranking/top5")
      if (!response.ok) {
        throw new Error("Erro ao buscar dados")
      }
      const data = await response.json()
      redesSociais.value = data
    } catch (err) {
      error.value = (err as Error).message
    } finally {
      isLoading.value = false
    }
  }

  return {
    redesSociais,
    isLoading,
    error,
    fetchRedesSociais,
  }
})

interface RedesSociais {
  nome: string
  total: number
}
