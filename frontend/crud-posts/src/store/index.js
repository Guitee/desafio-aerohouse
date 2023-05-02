import { api } from 'src/boot/axios'
import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'

const store = createStore({
  state () {
    return {
      posts: [],
      selectedUser: null
    }
  },
  getters: {
    getAllPosts (state) {
      return state.posts
    }
  },
  actions: {
    async fethPosts ({ commit }) {
      const response = await api.get('posts')
      commit('setPosts', response.data)
    },
    async deletePost ({ commit }, id) {
      await api.delete(`posts/${id}`)
      commit('removePost', id)
    },
    createPost ({ commit }, post) {
      api.post('posts', post)
      commit('savePost', post)
    },
    async updatePost ({ commit }, post) {
      await api.put(`posts/${post.id}`, post)
      commit('editPost', post)
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
      const sortedArray = state.posts.sort(function (a, b) {
        return a.id - b.id
      })
      const lastId = sortedArray[sortedArray.length - 1].id + 1
      post.id = lastId
      state.posts.unshift(post)
    },
    editPost (state, postUpdate) {
      const index = state.posts.findIndex(post => Number(post.id) === Number(postUpdate.id))

      if (index !== -1) {
        state.posts.slice(index, 1, postUpdate)
      }
    }
  },
  plugins: [createPersistedState()]
})

export default store
