<template>
  <div class="media" v-for="topic in topics">
    <div class="media-left">
      <a href="#"><img v-bind:src="topic.user.data.avatar"></a>
    </div>
    <div class="media-body">
      <h4 class="media-heading">
        <a v-link="{ name: 'topic', params: { topicId: topic.id } }">{{ topic.title }}</a>
      </h4>
      <p class="text-muted">Posted by {{ topic.user.data.username }} {{ topic.diffForHumans }}</p>
    </div>
  </div>
</template>

<script>
  import store from '../store'

  export default {
    data () {
      return {
        topics: []
      }
    },
    route: {
      data () {
        return store.getTopicsBySection(this.$route.params.sectionId).then(topics => ({
          topics
        }))
      }
    }
  }
</script>
