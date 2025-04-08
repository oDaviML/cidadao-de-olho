import { defineStore } from "pinia"

export const useDeputadoStore = defineStore("deputados", {
  state: () => {
    return {
      deputados: [] as Deputado[],
      loading: false,
      error: null as string | null,
    }
  },

  actions: {
    async fetchDeputados() {
      this.loading = true
      this.error = null

      try {
        const response = await fetch("http://127.0.0.1:8000/api/deputados")
        if (!response.ok) {
          throw new Error(`Erro na requisição: ${response.status}`)
        }
        const data = await response.json()

        this.deputados = data.map((deputado: Deputado) => {
          return {
            id: deputado.id,
            nome: deputado.nome,
            partido: deputado.partido,
            tag_localizacao: deputado.tag_localizacao,
          }
        })

        // Adiciona 5 segundos de delay
        await new Promise((resolve) => setTimeout(resolve, 5000))
      } catch (err) {
        this.error = err instanceof Error ? err.message : String(err)
        console.error(err)
      } finally {
        this.loading = false
      }
    },
  },
})

interface Deputado {
  id: number
  nome: string
  partido: string
  tag_localizacao: string
}
