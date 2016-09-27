<template>
  <div class="media" v-if="topic">
    <div class="media-left">
      <a href="#">
        <img v-bind:src="topic.user.data.avatar" class="media-object">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading">
        {{ topic.title }}
      </h4>
      <p>Posted by {{ topic.user.data.username }} {{ topic.diffForHumans }}</p>
      <p v-html="topic.body | marked"></p>

      <div class="media" v-for="post in topic.posts.data">
        <div class="media-left">
          <a href="#">
            <img v-bind:src="post.user.data.avatar" class="media-object">
          </a>
        </div>
        <div class="media-body">
          <p>Posted by {{ post.user.data.username }} {{ post.diffForHumans }}</p>
          <p v-html="post.body | marked"></p>
        </div>
      </div>

      <div class="well" v-if="!auth.user.authenticated">
        Sign up or sign in to reply
      </div>

      <hr>

      <form v-on:submit="reply" v-if="auth.user.authenticated">
        <div class="form-group">
          <textarea rows="6" placeholder="Reply" class="form-control" v-model="body" required></textarea>
        </div>
        <button type="submit" class="btn btn-default">Reply</button>
      </form>
    </div>
  </div>
</template>

<script>
  import store from '../store'
  import marked from 'marked'
  import auth from '../auth'

  export default {
    data () {
      return {
        auth: auth,
        topic: null,
        body: ''
      }
    },
    methods: {
      reply (e) {
        e.preventDefault()

        store.replyToTopicById(this.topic.id, this.body).then(post => {
          this.topic.posts.data.push(post)
          this.body = ''
        })
      }
    },
    route: {
      data () {
        return store.getTopicById(this.$route.params.topicId).then(topic => ({
          topic
        }))
      }
    },
    filters: {
      marked: marked
    }
  }
</script>
