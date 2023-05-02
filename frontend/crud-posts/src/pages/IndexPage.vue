<template>
  <q-page padding>
    <div>
      <q-btn class="float-rigth load-button" label="Carregar" @click="loadData" />
    </div>
    <div class="q-pa-md" style="max-width: 300px">
      <div class="q-gutter-md">
        <select class="custom-select select-selected" v-model="selectedUser" @change="changeUser($event)" v-if="loaded">
            <option selected v-for="user in users" :value="user.id" :key="user.id">{{user.username}}</option>
        </select>
      </div>
    </div>
    <q-table
      title="Posts"
      :rows= "posts"
      :columns="columns"
      row-key="name"
    >
      <template v-slot:top>
        Posts
        <q-space />
        <q-btn class="load-button" label="Adicionar" @click="addPost" v-if="!this.selectedUser" disabled />
        <q-btn class="load-button" label="Adicionar" @click="addPost" v-else />
      </template>
      <template v-slot:body-cell-actions="props">
        <q-td :props="props">
          <q-btn icon="edit" color="blue" dense size="sm" @click="updatePost(props.row.id)" />
          <q-btn style="margin-left: 8px;" icon="delete" color="negative" dense size="sm" @click="removePost(props.row.id)" />
        </q-td>
      </template>
    </q-table>
  </q-page>
</template>

<style>
  @import '../css/app.css';
</style>

<script>

import { mapGetters, mapActions } from 'vuex'
import { api } from 'src/boot/axios'

export default ({
  name: 'IndexPage',
  data () {
    return {
      posts: [],
      users: [],
      selectedUser: null,
      loaded: false
    }
  },
  setup () {
    const columns = [
      { name: 'title', field: 'title', label: 'Título', sortable: true, align: 'left' },
      { name: 'actions', field: 'actions', label: 'Ações', align: 'right' }
    ]

    return {
      columns
    }
  },
  methods: {
    ...mapActions(['fethPosts']),
    removePost (id) {
      this.$store.commit('removePost', id)
      this.posts = this.posts.filter(el => {
        return Number(el.id) !== Number(id)
      })
    },
    loadData () {
      this.fethPosts()
      this.selectedUser = 0
      this.changeUser()
      this.loaded = true
    },
    changeUser () {
      this.posts = this.$store.state.posts.filter(el => {
        return Number(el.userId) === Number(this.selectedUser)
      })
      this.$store.state.selectedUser = this.selectedUser
    },
    addPost () {
      this.$router.push({ name: 'createEdit', params: { id: 0, userId: Number(this.selectedUser) } })
    },
    updatePost (id) {
      this.$router.push({ name: 'createEdit', params: { id: Number(id), userId: this.selectedUser } })
    }
  },
  computed: {
    ...mapGetters(['getAllPosts'])
  },
  mounted () {
    api.get('users').then(response => (this.users = response.data))
    this.selectedUser = this.$store.state.selectedUser
    this.changeUser()
    this.loaded = this.$store.state.posts.length > 0
  }
})
</script>
