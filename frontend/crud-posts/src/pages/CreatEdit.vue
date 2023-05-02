<template>
<q-page padding>
  <q-card class="my-card" style="padding:30px">
    <q-form
      class="row q-col-gutter-sm"
      @submit="save"
    >
     <q-input
        rounded
        outlined
        v-model="post.title"
        label="Título"
        class ="col-lg-8 col-xs-8"
     />
    <div class="col-lg-12 col-xs-12">
       <q-editor
        v-model="post.body"
        filled
      />
    </div>
    <div class="col-12">
      <q-btn class="float-left"  label="Salvar" type="submit" color="primary"/>
    </div>
    </q-form>
  </q-card>
</q-page>
</template>

<script>

import { mapActions } from 'vuex'

export default ({
  name: 'CreatEdit',
  data () {
    return {
      post: {
        id: this.$route.params.id,
        title: null,
        body: null
      }
    }
  },
  methods: {
    ...mapActions(['savePosts']),
    onSubmit () {
      this.savePosts(this.post)
    }
  },
  mounted () {
  }
})
</script>
