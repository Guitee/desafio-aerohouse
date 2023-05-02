import { api } from 'src/boot/axios'
import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'

const store = createStore({
  state () {
    return {
      posts: []
    }
  },
  getters: {
    getAllPosts (state) {
      return state.posts
    }
  },
  actions: {
    async fethPosts ({ commit }, userId) {
      const response = await api.get(`posts?userId=${userId}`)
      commit('setPosts', response.data)
    },
    async deletePost ({ commit }, id) {
      await api.delete(`posts/${id}`)
      commit('removePost', id)
    },
    async createPost ({ commit }, post) {
      await api.post('posts')
      commit('savePost', post)
    },
    async updatePost ({ commit }, id) {
      await api.post(`posts/${id}`)
      commit('editPost', id)
    }
  },
  mutations: {
    setPosts (state, posts) {
      state.posts = posts
    },
    removePost (state, id) {
      state.posts = state.posts.filter(el => {
        return Number(el.id) !== Number(id)
      })
    },
    savePost (state, post) {
      state.posts.push(post)
    }
  },
  plugins: [createPersistedState()]
})

export default store
