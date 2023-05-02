<template>
 <q-page padding>
    <div class="q-pa-md" style="max-width: 300px">
      <div class="q-gutter-md">
        <select class="custom-select select-selected" v-model="selectedUser" @change="loadUser($event)">
            <option selected></option>
            <option v-for="user in users" :value="user.id" :key="user.id">{{user.username}}</option>
      </select>
      </div>
    </div>
    <q-card class="my-card" style="padding:30px">
        <q-form
          class="row q-col-gutter-sm"
        >
            <q-input
              rounded
              outlined
              v-model="name"
              label="Nome"
              class ="col-lg-4 col-xs-12"
            />
            <q-input
              rounded
              outlined
              v-model="username"
              label="UserName"
              class ="col-lg-4 col-xs-12"
            />
            <q-input
              rounded
              outlined
              v-model="email"
              label="Email"
              class ="col-lg-4 col-xs-12"
            />
            <q-input
              rounded
              outlined
              v-model="phone"
              label="Telefone"
              class ="col-lg-4 col-xs-12"
              style="margin-top: 20px;"
            />
            <q-input
              rounded
              outlined
              v-model="address.street"
              label="Lougradouro"
              class ="col-lg-4 col-xs-12"
              style="margin-top: 20px;"
            />
            <q-input
              rounded
              outlined
              v-model="address.city"
              label="Cidade"
              class ="col-lg-4 col-xs-12"
              style="margin-top: 20px;"
            />
        </q-form>
    </q-card>
 </q-page>
</template>
<style>
    @import 'src/css/app.css';
</style>
<script>

import { api } from 'src/boot/axios'

export default ({
  name: 'UsersPage',
  data () {
    return {
      users: [],
      selectedUser: null,
      name: null,
      username: null,
      email: null,
      phone: null,
      address: {
        street: null,
        city: null
      }
    }
  },
  methods: {
    loadUser (event) {
      const user = this.users.filter(function (el) {
        return Number(el.id) === Number(event.target.value)
      })[0]
      this.name = user.name
      this.username = user.username
      this.email = user.email
      this.phone = user.phone
      this.address.street = user.address.street
      this.address.city = user.address.city
      console.log(user)
    }
  },
  mounted () {
    api.get('users').then(response => (this.users = response.data))
  }
})
</script>
