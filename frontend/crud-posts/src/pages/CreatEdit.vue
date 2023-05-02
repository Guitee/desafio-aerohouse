<template>
<q-page padding>
  <q-card class="my-card" style="padding:30px">
    <q-form
      class="row q-col-gutter-sm"
      @submit="onSubmit"
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
        userId: Number(this.$route.params.userId),
        id: this.$route.params.id,
        title: null,
        body: null
      }
    }
  },
  methods: {
    ...mapActions(['createPost', 'updatePost']),
    onSubmit (event) {
      if (Number(this.post.id) === 0) {
        this.createPost(this.post)
      } else {
        this.updatePost(this.post)
      }
      this.$router.back()
    },
    loadPost (id) {
      this.post = this.$store.state.posts.filter(el => {
        return Number(el.id) === Number(id)
      })[0]
    }
  },
  mounted () {
    if (Number(this.post.id) !== 0) {
      this.loadPost(this.post.id)
    }
  }
})
</script>
