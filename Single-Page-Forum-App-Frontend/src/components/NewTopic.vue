<template>
  <p v-if="!auth.user.authenticated">Please sign in before posting a topic</p>
  <form v-if="auth.user.authenticated" v-on:submit="create">

    <div class="form-group">
      <label for="section">Section</label>
      <select id="section" class="form-control" v-model="section">
        <option v-for="section in sections" v-bind:value="section.id">{{ section.title }}</option>
      </select>
    </div>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" id="title" class="form-control" v-model="title" required>
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea id="body" rows="8" class="form-control" v-model="body" required></textarea>
    </div>

    <button type="submit" class="btn btn-default">Create topic</button>

  </form>
</template>

<script>
  import auth from '../auth'
  import store from '../store'
  import {router} from '../main'

  export default {
    data () {
      return {
        auth: auth,
        sections: [],
        section: null,
        title: null,
        body: null,
      }
    },
    methods: {
      create (e) {
        e.preventDefault();

        store.createTopic(this.section, this.title, this.body).then(topic => {
          router.go({
            name: 'topic',
            params: {
              topicId: topic.id
            }
          })
        })
      }
    },
    ready () {
      store.getSections().then(sections => {
        this.sections = sections
        this.section = sections[0].id
      })
    }
  }
</script>
